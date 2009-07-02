<?php

class Search_Post_Category extends Search_Module
{
	function gather_for_priority ($data)
	{
		return get_the_category_list (',', '', $data->ID);
	}

	function highlight ($post, $words, $content)
	{
		$highlight = new Highlighter (get_the_category_list (',', '', $post->ID), $words, true);

		if ($highlight->has_matches ())
		{
			$highlight->mark_words ();
			
			return '<p><strong>'.__ ('Category', 'search-unleashed').':</strong> '.$highlight->get ().'</p>';
		}
		
		return '';
	}
	
	function name () { return __ ('Post category', 'search-unleashed'); }
}

?>