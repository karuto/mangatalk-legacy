<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="top3" class="primary clearfix">
<!--			<div class="columnbanner">资讯</div>
-->			
			<div class="column maincol">
				<div id="leftcol">
				<?php $my_query = new WP_Query('tag=featured&posts_per_page=2');
				while ($my_query->have_posts()) : 
					$my_query->the_post();
					$do_not_duplicate[] = $post->ID; ?>
					<!-- Do stuff... -->
					<?php get_template_part( 'columnpost'); ?>
				<?php endwhile; ?>
				</div><!-- #leftcol -->
			</div>
			
			<div class="column maincol">
				<div id="midcol">
				<?php $my_query = new WP_Query('tag=trans&posts_per_page=1');
				while ($my_query->have_posts()) : 
					$my_query->the_post();
					$do_not_duplicate[] = $post->ID; ?>
					<!-- Do stuff... -->
					<?php get_template_part( 'columnpost'); ?>
				<?php endwhile; ?>		
				</div><!-- #midcol -->
				
				<div id="centercol">
				<?php get_sidebar('center'); ?><!-- KM: Customize widgets for this column. -->
				Hello world.
				</div><!-- .centercol -->
				
			</div>
			
				
			<div class="column maincol">
				<div id="rightcol">			
				<?php $my_query = new WP_Query('tag=news&posts_per_page=2');
				while ($my_query->have_posts()) : 
					$my_query->the_post();
					$do_not_duplicate[] = $post->ID; ?>
					<!-- Do stuff... -->
					<?php get_template_part( 'columnpost'); ?>
				<?php endwhile; ?>	
				</div><!-- #rightcol -->
				
			</div>
			
		</div><!-- #top3 -->



		<div id="mainlist">
		<div class="mainlist-home floatparentfix">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); 
			if( in_array($post->ID, $do_not_duplicate) ) continue; ?>
				<?php get_template_part( 'mainlistpost'); ?>
		<?php endwhile; endif; ?>
		
		</div><!-- .mainlist-home -->
		<?php twentyeleven_content_nav( 'nav-below' ); /* KM: Modify this to a static shit later. */?>
		
		</div><!-- #mainlist -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>