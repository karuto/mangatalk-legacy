<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footerbar-3'  )
		&& ! is_active_sidebar( 'footerbar-4' )
		&& ! is_active_sidebar( 'footerbar-5'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php twentyeleven_footer_sidebar_class(); ?>>

	<?php if ( is_active_sidebar( 'footerbar-3' ) ) : ?>
	<div id="footer-w1" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-3' ); ?>
		</div>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footerbar-4' ) ) : ?>
	<div id="footer-w2" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-4' ); ?>
<<<<<<< HEAD
		</div>	</div><!-- #second .widget-area -->
=======
		</div>	
	</div><!-- #second .widget-area -->
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footerbar-5' ) ) : ?>
	<div id="footer-w3" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-5' ); ?>
		</div>  
	</div><!-- #third .widget-area -->
	<?php endif; ?>
	
	<h6 class="less-focus roboto floatr"><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.</h6>
	
</div><!-- #supplementary -->