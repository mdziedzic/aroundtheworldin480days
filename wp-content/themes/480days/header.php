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
			$category = get_the_category($post->ID);
			$category_link = get_category_link($category[0]->cat_ID);
			$catName = substr($category[0]->cat_name, 4);

			$categoryParent = get_category_parents($category[0], FALSE, '/', FALSE);
			$categoryParent = substr($categoryParent, 4);
			$chopPoint = strcspn($categoryParent, '/');
			$categoryParent = substr($categoryParent, 0, $chopPoint);
	?>
		<title><?php echo get_bloginfo('name') . " &raquo; " . $catName . ', ' . $categoryParent; ?></title>
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

	<script type="text/javascript">
		var mapWhereAmI = "<?php echo "5000"; ?>"; // default map postion when not on post or cateogry page
	</script>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>

	<!-- For iPhone 6 Plus with @3x Retina HD display: -->
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/touch/apple-touch-icon-180x180-precomposed.png" />
	<!-- For non-Retina iPhone, iPod Touch, and Android -->
	<link rel="<?php bloginfo('template_url'); ?>/images/touch/apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png" />

	<link href='https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy' rel='stylesheet' type='text/css' />
	<link href='https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic' rel='stylesheet' type='text/css' />
</head>

<body onunload="GUnload()">

<div><a id="top"></a></div>

<!-- ================================================= HEADER -->

	<div id="header">
		<div class="container">
			<a href="<?php bloginfo('template_url'); ?>/../../../"><img src="<?php bloginfo('template_url'); ?>/images/header/logo2x.png" width="500" height="36" alt="Around the World in 480 Days" /></a></div>
	</div>



<!-- ================================================= MAIN -->

	<div id="main">
		<div id="main-bg-burst">
			<div class="container">
				<div id="nav-content">
