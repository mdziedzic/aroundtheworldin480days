<?php

include (dirname (__FILE__).'/module.php');

class SearchSpider
{
	var $modules = array ();
	var $search_terms;
	var $exclude = array ();
	
	function SearchSpider ($options)
	{
		$available = SearchSpider::available ();

		foreach ($options['active'] AS $field)
		{
			$this->modules[$field] = new $field;
			if (isset ($options['modules'][$field]))
				$this->modules[$field]->load ($options['modules'][$field]);
		}
		
		$this->exclude = explode (',', $options['exclude']);
		$this->exclude = array_filter ($this->exclude);
		$this->exclude[] = 0;
		
		$this->include['pages'] = $options['pages'];
		$this->include['posts'] = $options['posts'];
	}
	
	function available ()
	{
		$available = get_declared_classes ();
		$files = glob (dirname (__FILE__).'/../modules/*.php');
		if (!empty ($files))
		{
			foreach ($files AS $file)
				include_once ($file);
		}

		$modules   = array ();
		$available = array_diff (get_declared_classes (), $available);
		
		if (count ($available) > 0)
		{
			foreach ($available AS $name)
			{
				$name = strtolower ($name);
				$module = new $name ();

				$modules[$name] = $module;
			}
		}
		
		return $modules;
	}
	
	function is_engine_running ($name)
	{
		if (isset ($this->modules[$name]))
			return true;
		return false;
	}
	
	function get_module ($name)
	{
		if (isset ($this->modules[$name]))
			return $this->modules[$name];
		
		$obj = new $name;
		$options = get_option ('search_unleashed');

		if (isset ($options['modules'][$name]))
			$obj->load ($options['modules'][$name]);
		return $obj;
	}
	
	// Run the post through all the engines
	function highlight_all ($post, $content)
	{
		$text = '';

		$ordered = array ();
		foreach ($this->modules AS $module)
		{
			if ($module->id () == strtolower ('Search_Post_Content'))
				array_unshift ($ordered, $module);
			else
				$ordered[] = $module;
		}
		
		foreach ($ordered AS $module)
			$text .= $module->highlight ($post, $this->search_terms, $content);
		
		return $text;
	}
	
	function index_posts ($offset, $count)
	{
		global $wpdb;
		
		// Empty index
		if ($offset == 0)
			$wpdb->query ("DELETE FROM {$wpdb->prefix}search WHERE comment_ID=0");
		
		$include = array ();
		if ($this->include['pages'])
			$include[] = "{$wpdb->posts}.post_type='page'";
		if ($this->include['posts'])
			$include[] = "{$wpdb->posts}.post_type='post'";
		
		$include = "(".implode (' OR ', $include).")";
		
		// Index posts
		$rows = $wpdb->get_results ("SELECT {$wpdb->posts}.*,{$wpdb->users}.user_login,{$wpdb->users}.user_nicename,{$wpdb->users}.display_name FROM {$wpdb->posts} LEFT JOIN {$wpdb->users} ON {$wpdb->posts}.post_author={$wpdb->users}.ID WHERE {$wpdb->posts}.ID NOT IN (".implode (', ', $this->exclude).") AND $include ORDER BY {$wpdb->posts}.ID LIMIT $offset,$count");
	
		if ($rows)
		{
			foreach ($rows AS $row)
				$this->post_to_search ($row);
		
			return count ($rows);
		}
		return 0;
	}

	function remove_comment ($id)
	{
		global $wpdb;
		
		$wpdb->query ("DELETE FROM {$wpdb->prefix}search WHERE comment_id='$id'");
	}
	
	function remove_post ($id)
	{
		global $wpdb;
		
		$wpdb->query ("DELETE FROM {$wpdb->prefix}search WHERE post_id='$id'");
	}
	
	function index_comments ($offset, $count)
	{
		global $wpdb;
		
		// Empty index
		if ($offset == 0)
			$wpdb->query ("DELETE FROM {$wpdb->prefix}search WHERE comment_id!=0");
			
		// Index comments
		$rows = $wpdb->get_results ("SELECT * FROM {$wpdb->comments} WHERE comment_type='' AND comment_approved='1' AND comment_post_ID NOT IN (".implode (', ', $this->exclude).") ORDER BY comment_ID LIMIT $offset,$count");
	
		if ($rows)
		{
			foreach ($rows AS $row)
				$this->comment_to_search ($row);
		
			return count ($rows);
		}
		
		return 0;
	}
	
	function comment_to_search ($row, $update = false)
	{
		global $wpdb, $comment;

		foreach ($this->modules AS $module)
			$content[] = $module->gather_for_comment ($row);

		$content = array_filter ($content);
		if (!empty ($content))
		{
			$content = $wpdb->escape ($this->clean_for_search (implode ("\r\n\r\n", $content)));

			if ($update)
		 	{
				if ($wpdb->get_var ("SELECT COUNT(*) FROM {$wpdb->prefix}search WHERE post_id={$row->comment_post_ID} AND comment_id={$row->comment_ID}") > 0)
					$wpdb->query ("UPDATE {$wpdb->prefix}search SET content='$content' WHERE post_id={$row->comment_post_ID} AND comment_id={$row->comment_ID}");
				else
					$update = false;
			}
			
			if ($update === false)
				$wpdb->query ("INSERT INTO {$wpdb->prefix}search (comment_ID,post_id,content) VALUES ('{$row->comment_ID}','{$row->comment_post_ID}','$content')");
		}
	}
	
	function post_to_search ($row, $update = false)
	{
		global $post, $wpdb;

		$post = $row;

		foreach ($this->modules AS $module)
		{
			$content[]  = $module->gather_for_post ($row);
			$priority[] = $module->gather_for_priority ($row);
		}

		$content  = array_filter ($content);
		$priority = array_filter ($priority);

		if (!empty ($content) || !empty ($priority))
		{
			$content = $wpdb->escape ($this->clean_for_search (implode ("\r\n\r\n", $content)));

			if ($content)
				$content = "'".$content."'";
			else
				$content = 'NULL';

			$priority = $wpdb->escape ($this->clean_for_search (implode ("\r\n\r\n", $priority)));
			if ($priority)
				$priority = "'".$priority."'";
			else
				$priority = 'NULL';

			if ($update)
			{
					
				if ($wpdb->get_var ("SELECT post_id FROM {$wpdb->prefix}search WHERE post_id={$row->ID}") > 0)
					$val = $wpdb->query ("UPDATE {$wpdb->prefix}search SET content=$content, priority=$priority WHERE post_id={$row->ID} AND comment_id=0");
				else
					$update = false;
			}

			if (!$update)
				$wpdb->query ("INSERT INTO {$wpdb->prefix}search (post_id,content,priority) VALUES ('{$row->ID}',$content,$priority)");
		}
	}
	
	function total_posts_to_index ()
	{
		global $wpdb;
		
		$include = array ();
		if ($this->include['pages'])
			$include[] = "{$wpdb->posts}.post_type='page'";
		if ($this->include['posts'])
			$include[] = "{$wpdb->posts}.post_type='post'";
		
		$include = "(".implode (' OR ', $include).")";
		
		return $wpdb->get_var ("SELECT COUNT(ID) FROM {$wpdb->posts} WHERE ID NOT IN (".implode (', ', $this->exclude).") AND $include");
	}
	
	function total_comments_to_index ()
	{
		global $wpdb;
		
		return $wpdb->get_var ("SELECT COUNT(comment_ID) FROM {$wpdb->comments} WHERE comment_type='' AND comment_approved='1' AND comment_post_ID NOT IN (".implode (', ', $this->exclude).")");
	}
	
	function wp_filter_nohtml_kses($data)
	{
		return addslashes ( wp_kses(stripslashes( $data ), array()) );
	}

	function clean_for_search ($text)
	{
		// Save HREF and ALT attributes
		preg_match_all ('/ href=["\'](.*?)["\']/iu', $text, $href);
		preg_match_all ('/ alt=["\'](.*?)["\']/iu', $text, $alt);
		preg_match_all ('/ title=["\'](.*?)["\']/iu', $text, $title);

		// Remove comments and JavaScript
		$text = preg_replace (preg_encoding ('/<script(.*?)<\/script>/s'), '', $text);
		$text = preg_replace (preg_encoding ('/<!--(.*?)-->/s'), '', $text);
				
		$text = str_replace ('<', ' <', $text);   // Insert a space before HTML so the strip will have seperate words
		
		$text = $this->wp_filter_nohtml_kses (strip_html ($text));
		
		$text = preg_replace (preg_encoding ('/&(\w*);/'), ' ', $text);                    // Removes entities
		$text = str_replace ("'", '', $text);
		$text = str_replace ('&shy;', '', $text);
		$text = preg_replace (preg_encoding ('/[\'!;#$%&\,_\+=\?\(\)\[\]\{\}\"<>`]/'), ' ', $text);

		if (count ($href) > 0)
			$text .= ' '.implode (' ', $href[1]);
		
		if (count ($alt) > 0)
			$text .= ' '.implode (' ', $alt[1]);
			
		if (count ($title) > 0)
			$text .= ' '.implode (' ', $title[1]);

		while (preg_match (preg_encoding ('/\s{2}/'), $text, $matches) > 0)
			$text = preg_replace (preg_encoding ('/\s{2}/'), ' ', $text);
		return stripslashes (trim ($text));
	}
	
	function total_indexed ()
	{
		global $wpdb;
		return $wpdb->get_var ("SELECT COUNT(*) FROM {$wpdb->prefix}search");
	}
	
	function get_search_sql ($request, $limits, $fields, $original, $options)
	{
		global $wpdb;

		// Parse the request
		$this->search_terms = new SearchParser ($request, $options['search_mode']);

		$_GET['s'] = $this->search_terms->get_search ();
		
		$terms = $this->search_terms->get_full_search ();
		$where = $this->search_terms->get_sql ();

		if ($terms == '' && $where == '')
			return "SELECT SQL_CALC_FOUND_ROWS * FROM {$wpdb->posts} WHERE 1=2";

		$sql  = "SELECT DISTINCT SQL_CALC_FOUND_ROWS $fields, ";
		if ($terms && $options['search_mode'] == 'fulltext')
		{
			$sql .= "((0.6 * MATCH(content) AGAINST ('".$wpdb->escape ($terms)."' IN BOOLEAN MODE)) + ";
			$sql .=  "(1.3 * MATCH(priority) AGAINST ('".$wpdb->escape ($terms)."' IN BOOLEAN MODE))) AS score, ";
		}
		else if ($options['search_mode'] == 'like')
		{
			$tmpsql = array ();
			$parts  = array_merge ($this->search_terms->small, $this->search_terms->full);
			foreach ($parts AS $part)
				$tmpsql[] = sprintf ("(content LIKE '%%%s%%' OR priority LIKE '%%%s%%')", $wpdb->escape ($part), $wpdb->escape ($part));
			
			$tmpsql[] = sprintf ("(content LIKE '%%%s%%' OR priority LIKE '%%%s%%')", $wpdb->escape ($this->search_terms->get_search ()), $wpdb->escape ($this->search_terms->get_search ()));
			$tmpsql = implode (" OR ", $tmpsql);
			$where = "(".$tmpsql.")";
		}
		
		$sql .= "COUNT(post_id) AS multiple,MAX({$wpdb->prefix}search.comment_id) AS comment_id ";
		$sql .= "FROM {$wpdb->prefix}search,{$wpdb->posts} ";
	
		$sql .= "WHERE (".$where.") AND ";
	
		$sql .= "{$wpdb->prefix}search.post_id={$wpdb->posts}.ID";
		
		if ($options['protected'] === false)
			$sql .= " AND post_password=''";
		
		$sql .= " AND ({$wpdb->posts}.post_status='publish'";
		if ($options['private'] === true)
			$sql .= " OR {$wpdb->posts}.post_status='private'";

		if ($options['draft'] === true)
			$sql .= " OR {$wpdb->posts}.post_status='draft'";
		
		$sql .= ') ';
		
//		if ($options['future'] == false)
//			$sql .= 'AND post_date < NOW() ';
			
		$sql .= 'GROUP BY ID ORDER BY ';

		if ($terms)
		{
			if ($options['search_mode'] == 'like')
				$sql .= '';
			else
				$sql .= 'score DESC,';
		}
		
		$sql .= "post_date DESC $limits";
		return $sql;
	}
}

?>