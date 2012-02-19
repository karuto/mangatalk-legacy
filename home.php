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
		<?php $my_query = new WP_Query('tag=news&posts_per_page=2');
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
		</div><!-- .centercol -->
		
	</div>
	
		
	<div class="column maincol">
		<div id="rightcol">			
		<?php $my_query = new WP_Query('tag=featured&posts_per_page=2');
		while ($my_query->have_posts()) : 
			$my_query->the_post();
			$do_not_duplicate[] = $post->ID; ?>
			<!-- Do stuff... -->
			<?php get_template_part( 'columnpost'); ?>
		<?php endwhile; ?>	
		</div><!-- #rightcol -->
		
	</div>
	
</div><!-- #top3 -->

<div id="gallery" class="clearfix floatparentfix">
<div class="gallery-box">
	<div id="gallery-cont" class="gallery-content">
	<span id="gallery-left" class="left button"></span>
		<div id="gallery-list" class="gallery-imglist">
		<ul>
		<li><a href="#1" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#" class="gallery-unit">『新刊标题其之一』</a></li>
		<li><a href="#2" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#" class="gallery-unit">『新刊标题其之二』</a></li>
		<li><a href="#3" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#" class="gallery-unit">『新刊标题其之三』</a></li>
		<li><a href="#4" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#" class="gallery-unit">『新刊标题其之四』</a></li>
		<li><a href="#5" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#" class="gallery-unit">『新刊标题其之五』</a></li>
		</ul>
	</div>
	<span id="gallery-right" class="right button"></span>
	</div><!-- .gallery-content -->
		
	<script type="text/javascript">	// KM: JS for slideshow.
	$(function(){
	var obj=$("#gallery-list ul");
	var object=$("#gallery-list ul li");
	var num= 1;	// #num of pictures per scroll
	var time = Math.ceil($(object).length/num);
	var width= $(".gallery-imglist ul li").width();
	// alert(width);
	var n=0;
	// $(object).clone().appendTo(obj);
	// KM: I don't get the purpose of this append above. Doesn't actually do anything.
	$("#gallery-right").click(function(){
	if(!$(obj).is(":animated")){
	  if(n==time){n=0;$(obj).css({left:0});};
	  $(obj).animate({left: "-="+width}, "slow");
	  n++;
	}
	});
	$("#gallery-left").click(function(){
	if(!$(obj).is(":animated")){
	  if(n==0){n=time;$(obj).css({left:-time*width})};
	  $(obj).animate({left: "+="+width}, "slow");
	  n--;
	}
	});
	// This is for auto scrolling.
	$("#gallery-cont").hover(function(){
	clearInterval(change);
	},function(){
	// The following line is originally for #right click, but modified for better performance.
	change= setInterval(function(){$("#gallery-left").click()} , 5000);
	}).trigger("mouseleave");
	})
	</script>
</div><!-- .gallery-box -->		
</div><!-- #gallery -->


<div id="mainlist" class="floatparentfix clearfix">
<!--<div class="mainlist-widget" style="margin: 20px 15px 0px;">
<div class="wtitle1">社交网络</div><span class="wtitle2 roboto">Social Networks</span>
<div class="wsep clearfix"></div></div>-->
<div class="mainlist-home floatparentfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); 
	if( in_array($post->ID, $do_not_duplicate) ) continue; ?>
		<?php get_template_part( 'mainlistpost'); ?>
<?php endwhile; endif; ?>

</div><!-- .mainlist-home -->
<a href="index.php?cat=1" class="button"><div class="mainlist-button more-button">阅读更多文章</div></a>

</div><!-- #mainlist -->



<?php get_sidebar('home'); ?><!-- KM: Customize widgets for this column. -->
<?php get_footer(); ?>