<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->


<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<!-- KM: For GR Subscribe as domain feature. -->
<link rel="alternate" type="application/rss+xml" title="订阅 漫言 MangaTalk (RSS 2.0)" href="http://feed.mangatalk.net/" />


<!--  KM: IE9 is fine, but give prompt for IE 8 and below.
	  KM: And also remember to place popup.js before script.js to prevent loading failure. -->
<!--[if IE 6]>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
<![endif]-->
<!--[if IE 7]>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
<![endif]-->
<!--[if IE 8]>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
<![endif]-->


<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="bodywrapper">
<!-- KM: This part was originally for "toggle" top panel, but is no longer used.

<div id="bannerwrapper" class="clearfix">
	<div id="toggle-panel"><div class="t-wrap framewrapper"><ul>
		<li>Item 1</li><li>Item 2</li><li>Item 3</li>
	</ul></div></div>
	<div class="framewrapper"><a class="toggle-anchor">Anchor here.</a></div>

	<header><hgroup id="topbar">
		<h1 id="site-title">
			<span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
		</h1><nav id="topmenu"></nav>
	</hgroup></header>
</div>
-->

<div id="logobox" class="floatparentfix clearfix">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span id="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/mg-logo.png"></img></span></a>
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

	<?php
	if ( is_user_logged_in() ) {
		$backend = home_url('/').'wp-admin';
		echo '<span style="margin: 30px 0 0 0; float: right; padding: 3px 10px; background-color: #444;">';
		echo '<a style="color:#fff" href="'.$backend.'">管理后台</a>';
		echo '</span>';
	} else {
		$backend = home_url('/').'wp-admin';
		echo '<span style="margin: 30px 0 0 0; float: right; padding: 3px 10px; background-color: #ce5333;">';
		echo '<a style="color:#fff" href="'.$backend.'">作者登入</a>';
		echo '</span>';
	}
	?>
<!--<![endif]-->	
</div>






<div id="page" class="hfeed clearfix floatparentfix">

<div id="topwrapper">

	<header id="branding" role="banner">
	
		<nav id="access" class="clearfix floatparentfix" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
			<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
			<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
			
			
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. 
			KM 20120214: Enhanced version of menu! 
			*/ ?>
			<?php wp_nav_menu(array( 'theme_location' => 'primary', 'sort_column' => 'menu_order', 'menu' => 'topmenu', 'container_id' => 'menubox') ); ?>
			
		</nav><!-- #access -->
		
		<?php wp_reset_query(); ?><!-- Reset query before invoking conditional tags. -->
		<?php if (is_home() || $_SERVER["REQUEST_URI"] == '/' || $_SERVER["REQUEST_URI"] == '/index.php') : ?>
			<?php get_template_part( 'hero'); ?>
		<?php endif; ?>
			
			
			
	</header><!-- #branding -->
</div><!-- #topwrapper -->

	<div id="main" class="clearfix">
