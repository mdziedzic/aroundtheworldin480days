<?php
/**
 * @package WordPress
 * @subpackage 480Days
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_single()) { 
		$key="dayNumber"; 
		$dayNumber = get_post_meta($post->ID, $key, true);
		$title = get_bloginfo('name') . " &raquo; " . $dayNumber . ": " . get_the_title();
	?>
		<title><?php echo $title ?></title>
	<?php } else if (is_category()) { 
		$category = $wp_query->get_queried_object();
		$cat_name = $category->name;
		$cat_name = substr_replace($cat_name, ":", 3, 0);
		$cat_name =	get_bloginfo('name') . " &raquo; " . $cat_name;
	?>
		<title><?php echo $cat_name; ?></title>
	<?php } else { ?>
		<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;'); ?></title>		
	<?php } ?>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />	
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<?php if (is_page('About')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-about.css" type="text/css" />
	<?php } ?>
	
	<!--[if lte IE 8]>
    	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie-all.css" type="text/css" />
    <![endif]-->	
	<!--[if IE 7]>
    	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie7.css" type="text/css" />
	<![endif]-->				
	<!--[if lte IE 7]>
    	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie.css" type="text/css" />
	<![endif]-->			
	<!--[if lte IE 6]>
    	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie6.css" type="text/css" />
	<![endif]-->	

 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAABirsfoKq35Bh2fyEpxTGYxTMrxmENqKxPChPlSpAGCDWPT-A7hRLudVBOuQXaOaZ7zh5U7aqZn4MIA" type="text/javascript"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cookie.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/480days.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/map.js"></script>	
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>	
	
	
</head>

<body onunload="GUnload()">

<div><a id="top"></a></div>

<!-- ================================================= HEADER -->

	<div id="header">
		<div class="container">
			<a href="/aroundtheworldin480days/"><img src="<?php bloginfo('template_url'); ?>/images/header/logo.png" width="500" height="36" alt="Around the World in 480 Days" /></a></div>
	</div>



<!-- ================================================= MAIN -->

	<div id="main">
		<div id="main-bg-burst">
			<div class="container">
				<div id="nav-content">
				
