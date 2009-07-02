<?php

class SearchUnleashed_Widget extends Widget_SU
{
	var $title  = '';
	
	function has_config () { return true; }
	
	function load ($config)
	{
		if (isset ($config['title']))
			$this->title = $config['title'];
	}
	
	function display ($args)
	{
		extract ($args);

		echo $before_widget;
	
		if ($this->title)
			echo $before_title.$this->title.$after_title;
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php _e ('Search', 'search-unleashed') ?>" />
	</div>
</form>
<?php
		echo $after_widget;
	}
	
	function config ($config, $pos)
	{
		?>
		<table>
			<tr>
				<th><?php _e ('Title', 'search-unleashed'); ?>:</th>
				<td><input type="text" name="<?php echo $this->config_name ('title', $pos) ?>" value="<?php echo htmlspecialchars ($config['title']) ?>"/></td>
			</tr>
		</table>
		<?php
	}
	
	function save ($data)
	{
		return array ('title' => $data['title']);
	}
}

?>