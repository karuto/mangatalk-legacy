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
	<style>
	.gallery-box{width:100%;margin:0;}
	.gallery-content {height: 160px;}
		.gallery-imglist{float:left;width:858px;height:100%;background-color: #fff; overflow:hidden;position:relative;}
		.gallery-imglist ul{position:absolute;width:2012px;overflow:hidden;margin:20px 0;}
		.gallery-imglist ul li{display:inline;float:left;margin:0px;width:250px;}
		.gallery-imglist a{display:block;float:none;line-height:16px;margin:0;text-align:center;width:250px;}
		.gallery-imglist .img{display:block;height:120px;width:250px;overflow:hidden;}
	.gallery-content .button{display:block;float:left;width:60px;height:100%;cursor:pointer;}
	.gallery-content .left{background:url(http://i.imgur.com/cQxxg.png);}
	.gallery-content .right{background:url(http://i.imgur.com/cQxxg.png);}
	</style>		

	<div class="gallery-box">
		<div id="gallery-cont" class="gallery-content">
		<span id="gallery-left" class="left button"></span>
			<div id="gallery-list" class="gallery-imglist">
			<ul>
			<li><a href="#1" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#">atrl-1</a></li>
			<li><a href="#2" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#">atrl-2</a></li>
			<li><a href="#3" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#">atrl-3</a></li>
			<li><a href="#4" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#">atrl-4</a></li>
			<li><a href="#5" class="img"><img alt="atrl-" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" /></a><a href="#">atrl-5</a></li>
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
		// KM: I don't get the purpose of this append. Doesn't actually matter.
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
		change= setInterval(function(){$("#gallery-right").click()} , 5000);
		}).trigger("mouseleave");
		})
		</script>
	</div>		

</div>

<div id="mainlist" class="floatparentfix clearfix">
<!--<div class="mainlist-widget" style="margin: 20px 15px 0px;">
<div class="wtitle1">社交网络</div><span class="wtitle2 roboto">Social Networks</span>
<div class="wsep clearfix"></div>
</div>
-->
<div class="mainlist-home floatparentfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); 
	if( in_array($post->ID, $do_not_duplicate) ) continue; ?>
		<?php get_template_part( 'mainlistpost'); ?>
<?php endwhile; endif; ?>

</div><!-- .mainlist-home -->
<div id="mainlist-more"><a href="#">阅读更多文章</a></div>

</div><!-- #mainlist -->



<?php get_sidebar('home'); ?><!-- KM: Customize widgets for this column. -->
<?php get_footer(); ?>