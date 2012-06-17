<?php
/**
 * Twenty Eleven functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyeleven_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;	/* KM: This is truly useful for CSS overriding. */

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'twentyeleven_setup' );

if ( ! function_exists( 'twentyeleven_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyeleven_setup() in a child theme, add your own twentyeleven_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_setup() {

	/* Make Twenty Eleven available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'twentyeleven' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyeleven', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Grab Twenty Eleven's Ephemera widget.
	require( get_template_directory() . '/inc/widgets.php' ); //KM: Don't need it in Mangatalk.

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside' ) );
//	KM: Sorry, no use for now, thus disabled.

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// The next four constants set how Twenty Eleven supports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header.
	// Add a filter to twentyeleven_header_image_width and twentyeleven_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 1000 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 288 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	// set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Twenty Eleven's custom image sizes
	// KM: This is completely a waste. Get rid of it.
	// add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
	// add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist

	// Turn on random header image rotation by default.
	add_theme_support( 'custom-header', array( 'random-default' => true ) );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyeleven_admin_header_style(), below.
	add_custom_image_header( 'twentyeleven_header_style', 'twentyeleven_admin_header_style', 'twentyeleven_admin_header_image' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'wheel' => array(
			'url' => '%s/images/headers/wheel.jpg',
			'thumbnail_url' => '%s/images/headers/wheel-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Wheel', 'twentyeleven' )
		),
		'shore' => array(
			'url' => '%s/images/headers/shore.jpg',
			'thumbnail_url' => '%s/images/headers/shore-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Shore', 'twentyeleven' )
		),
		'trolley' => array(
			'url' => '%s/images/headers/trolley.jpg',
			'thumbnail_url' => '%s/images/headers/trolley-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Trolley', 'twentyeleven' )
		),
		'pine-cone' => array(
			'url' => '%s/images/headers/pine-cone.jpg',
			'thumbnail_url' => '%s/images/headers/pine-cone-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pine Cone', 'twentyeleven' )
		),
		'chessboard' => array(
			'url' => '%s/images/headers/chessboard.jpg',
			'thumbnail_url' => '%s/images/headers/chessboard-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Chessboard', 'twentyeleven' )
		),
		'lanterns' => array(
			'url' => '%s/images/headers/lanterns.jpg',
			'thumbnail_url' => '%s/images/headers/lanterns-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Lanterns', 'twentyeleven' )
		),
		'willow' => array(
			'url' => '%s/images/headers/willow.jpg',
			'thumbnail_url' => '%s/images/headers/willow-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Willow', 'twentyeleven' )
		),
		'hanoi' => array(
			'url' => '%s/images/headers/hanoi.jpg',
			'thumbnail_url' => '%s/images/headers/hanoi-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Hanoi Plant', 'twentyeleven' )
		)
	) );
}
endif; // twentyeleven_setup



/* KM: Exclude pages from search results. */
function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}	return $query;
}
add_filter('pre_get_posts','SearchFilter');
<<<<<<< HEAD
=======

/* KM: Snippet for redirecting to random article button.
Credit: http://www.wpbeginner.com/wp-tutorials/how-to-redirect-users-to-a-random-post-in-wordpress */
add_action('init','random_add_rewrite');
function random_add_rewrite() {
	global $wp;
	$wp->add_query_var('random');
	add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
add_action('template_redirect','random_template');
function random_template() {
   if (get_query_var('random') == 1) {
	   $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
	   foreach($posts as $post) {
			   $link = get_permalink($post);
	   }
	   wp_redirect($link,307);
	   exit;
   }
}



>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.


/* 
	KM: Hacking Dashboards.
*/

function contact_helper_dashboard_widget_function() {
	echo '<div id="admin-foreplay" style="font-size: 12px; line-height: 20px;">';
	echo '<p><a href="http://mangatalk.net">欢迎来到漫言！</a><br />
	站点现正处于 Beta 公开测试期间，如果您在使用中遇到 Bug、技术故障，或是有任何建议吐槽，请务必来信<a href="mailto:iamkaruto@gmail.com">联系技术人员</a>。</p><p>';
	echo '<a href="http://mangatalk.net/changelog/">Log #15527 - You can now browse MangaTalk via Android / iPhone.</a></p><p>';
	echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}
// Create the function use in the action hook
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('contact_helper_dashboard_widget', '感谢您登入漫言！', 'contact_helper_dashboard_widget_function');
}
// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');


function guidelines_posting_widget_function() {
	echo '<div id="post-foreplay" style="font-size: 12px; line-height: 20px;">';
	echo '<p>亲爱的作者：在撰文之前，请您抽出几分钟，阅读<strong><a href="http://mangatalk.net/author-faq/" style="color:#ce5333;">『漫言发文答疑指南』</a></strong>，相信能解答您的大部分问题。</p><p>
	
	<a href="http://mangatalk.net">漫言</a>自诞生以来，便致力于为数以万计的读者们奉上最优雅的阅读体验。
	还望您也能稍尽一方之力、共同来维护这片净土。^ ^</p><p>';

	echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}
// Create the function use in the action hook
function example_add_dashboard_widgets() {
	wp_add_dashboard_widget('guidelines_posting_widget', '撰文时的注意事项', 'guidelines_posting_widget_function');
}
// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );


//	Adding custom helper while posting
add_action('load-post-new.php','custom_help_page');
add_action('load-page.php','custom_help_page');
add_action('load-post.php','custom_help_page');
function custom_help_page() {
  add_filter('contextual_help','custom_page_help_by_K');
}
function custom_page_help_by_K($help) {
	echo $help; // Uncomment if you just want to append your custom Help text to the default Help text
	echo '<style type="text/css">
		.update-nag { display:none !important; }
		#post-foreplay a { text-decoration: none; }
	</style>';
	
	echo '<div id="post-foreplay" style="margin-right: 25px; font-size: 12px; line-height: 18px; color: #555; border-bottom: 1px solid #e0e0e0;">';
	echo '<p>亲爱的作者：在撰文之前，请您抽出几分钟，阅读<strong><a href="http://mangatalk.net/author-faq/" style="color:#ce5333;">『漫言发文答疑指南』</a></strong>，相信能解答您的大部分问题。</p><p>
	
	<a href="http://mangatalk.net">漫言</a>自诞生以来，便致力于为数以万计的读者们奉上最优雅的阅读体验。
	还望您也能稍尽一方之力、共同来维护这片净土。^ ^</p><p>';

	echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}



//	Adding custom helper while user changing profile
add_action('load-profile.php','custom_help_profile');
function custom_help_profile() {
  add_filter('contextual_help','custom_profile_help_by_K');
}
function custom_profile_help_by_K($help) {
	echo $help; // Uncomment if you just want to append your custom Help text to the default Help text
	echo '<style type="text/css">
		.update-nag { display:none !important; }
		#post-foreplay a { text-decoration: none; }
	</style>';
	
	echo '<div id="post-foreplay" style="margin-right: 25px; font-size: 12px; line-height: 18px; color: #555; border-bottom: 1px solid #e0e0e0;">';
	echo '<p>亲，漫言后台使用<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>的外挂头像系统，它的原理是为每个 Email 地址进行匹配：</p><p>';
	echo '当你在<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>上传一张图片后，这张头像到任何网站都会自动显示——只要你输入的是同样的 Email。</p><p>';
	echo '<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>的使用过程非常简单，两三分钟即可完成上传，如果你还没有头像，不妨去<a href="http://cn.gravatar.com/" target=_BLANK>设置</a>一下吧？^v^</p>';
	echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}




// KM: REMOVE SHITS FROM ADMIN PANEL.
// Create the function to use in the action hook

// function example_remove_dashboard_widgets() {
	// remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	// remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
// } 

// Hoook into the 'wp_dashboard_setup' action to register our function

// add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );


// KM: change external logo, adding styles to admin panel
function my_logo() {
	echo '<style type="text/css">
		body { background:url(http://i.imgur.com/FV2MV.png) repeat !important; }
		.login #nav a, .login #backtoblog a { text-decoration: none; color: #ce5333; }
		h1 a { background-image:url(http://i.imgur.com/rzsoh.png) !important; }
	</style>';
}
add_action('login_head', 'my_logo');


// KM: The following function automatically removes attachment links around images.
add_filter( 'the_content', 'attachment_image_link_remove_filter' );
function attachment_image_link_remove_filter( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}


// 1. Remove the Admin Bar
// WordPress 3.1 introduced a new Twitter-like admin menu bar.
// If you don’t like it, you can disable it by putting the following in functions.php:
add_filter( 'show_admin_bar', '__return_false' );


// 2. Specify the Auto-save Interval
// KM Update: these don't seem to work. Hmm.
define('AUTOSAVE_INTERVAL', 600); // 60 * 10, auto-saves every 10 minutes
define('WP_POST_REVISIONS', 3); // Maximum 5 revisions per post
// define('WP_POST_REVISIONS', false); // Disable revisions


// Remove the Visual Editor
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);


// Change the Contact Info Form
function new_contactmethods( $contactmethods ) {
  $contactmethods['douban'] = '豆瓣'; // Add Twitter
  $contactmethods['weibo'] = '微博'; // Add Facebook
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber
  return $contactmethods;
} add_filter('user_contactmethods','new_contactmethods',10,1);


// Disable the “please upgrade now” message
if ( !current_user_can( 'edit_users' ) ) {
  add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
  add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}



// Serve favicon
// add a favicon to your
function blog_favicon() {
echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

/*
	KM: Hacking RSS / Feed output.
*/
function mangatalk_rss($content) {
	global $wp_query;
	// $a = $wp_query->post->post_author->;
	$a = $GLOBALS['wp_query']->query_vars['author_name'];
	
	$rssmeta = '<br /><br />本文源自 <a href="http://mangatalk.net">'.$a.'漫言 | MangaTalk </a>。 All rights reserved.';
	if (is_feed()) {
		$content = $content.$rssmeta;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'mangatalk_rss');
add_filter('the_content', 'mangatalk_rss');








if ( ! function_exists( 'twentyeleven_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // twentyeleven_header_style

if ( ! function_exists( 'twentyeleven_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyeleven_setup().
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 1000px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // twentyeleven_admin_header_style

if ( ! function_exists( 'twentyeleven_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyeleven_setup().
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // twentyeleven_admin_header_image

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function twentyeleven_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function twentyeleven_continue_reading_link() {
<<<<<<< HEAD
	return ' <div class="readmore"><a class="readmore-link" href="'. esc_url( get_permalink() ) . '">' . __( '阅读全文 ｜ Read More', 'twentyeleven' ) . '</a></div>';
=======
	return ' <div class="readmore"><a href="'. esc_url( get_permalink() ) . '">' . __( '阅读全文 ｜ Read More', 'twentyeleven' ) . '</a></div>';
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function twentyeleven_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function twentyeleven_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyeleven_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function twentyeleven_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyeleven_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_widgets_init() {

/*	register_widget( 'Twenty_Eleven_Ephemera_Widget' );*/

	register_sidebar( array(
		'name' => __( 'Universal Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-main',
		'description' => __( 'General sidebar that will appear everywhere besides homepage', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

		register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-home',
		'description' => __( 'The sidebar merely for homepage (bottom right corner) due to different margin width', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'News Hub', 'twentyeleven' ),
		'id' => 'sidebar-center',
		'description' => __( 'The area for the homepage center column, display minimal amount of information', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// register_sidebar( array(
		// 'name' => __( 'Showcase Sidebar', 'twentyeleven' ),
		// 'id' => 'sidebar-2',
		// 'description' => __( 'The sidebar for the optional Showcase Template', 'twentyeleven' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget' => "</aside>",
		// 'before_title' => '<h3 class="widget-title">',
		// 'after_title' => '</h3>',
	// ) );

	register_sidebar( array(
		'name' => __( 'Footer 1', 'twentyeleven' ),
		'id' => 'footerbar-3',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 2', 'twentyeleven' ),
		'id' => 'footerbar-4',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 3', 'twentyeleven' ),
		'id' => 'footerbar-5',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyeleven_widgets_init' );

if ( ! function_exists( 'twentyeleven_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function twentyeleven_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous roboto"><?php next_posts_link( __( '<span class="meta-nav roboto">&larr;</span> 更旧的文章 | Older', 'twentyeleven' ) ); ?></div>
			<div class="nav-next roboto"><?php previous_posts_link( __( 'Newer | 更新的文章 <span class="meta-nav roboto">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // twentyeleven_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Twenty Eleven 1.0
 * @return string|bool URL or false when no link is present.
 */
function twentyeleven_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function twentyeleven_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()

if ( ! function_exists( 'twentyeleven_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'twentyeleven_body_classes' );


/* 
 * KM: To link all Post Thumbnails on the website to the Post Permalink.
 */
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;

}

// if ( function_exists( 'add_theme_support' ) ) {
	// add_theme_support( 'post-thumbnails' );
        // set_post_thumbnail_size( 300, 200 );
// }

// function get_the_thumb() {
	// global $post, $posts;
	// $first_img = '';
	// ob_start();
	// ob_end_clean();
 
	// //如果设置了特色图像，就把特色图像作为缩略图
	// if ( has_post_thumbnail($post->ID) ) {
		// $imgstr = explode('src="', get_the_post_thumbnail($post->ID));
		// $img = explode('"', $imgstr[1]);
		// $first_img = $img[0];
	// } 
	// else {//读取文章中的第一幅图片，作为缩略图
		// $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
		// $first_img = $matches[1][0];
		// if ($first_img=='') {//读取文章中的第一幅图片，作为缩略图
			// $tags=get_the_tags($post->ID);
			// if($tags) {
				// foreach($tags as $tag) {
					// $first_img =home_url().'/thumb/'.$tag->name.'.gif';
				// }
			// }
			// else
				// $first_img =home_url()."/blog/thumb/其他.gif";
		// }
	// }
	// return $first_img;
// }
