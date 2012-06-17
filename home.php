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

<<<<<<< HEAD
<div id="top3" class="fullwidth clearfix">
<!--			<div class="columnbanner">资讯</div>
-->			
	<div class="floatl maincol">
=======
<div id="top3" class="primary clearfix">

	<div class="column maincol">
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
		<div id="leftcol">
		<?php $my_query = new WP_Query('tag=trans&posts_per_page=2');
		while ($my_query->have_posts()) : 
			$my_query->the_post();
			$do_not_duplicate[] = $post->ID; ?>
			<!-- Do stuff... -->
			<?php get_template_part('columnpost'); ?>
		<?php endwhile; ?>
		</div><!-- #leftcol -->
	</div>
	
	<div class="floatl maincol">
		<div id="midcol">
<<<<<<< HEAD
		<?php $my_query = new WP_Query('tag=news&posts_per_page=1');
=======
		<?php $my_query = new WP_Query('tag=love&posts_per_page=1');
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
		while ($my_query->have_posts()) : 
			$my_query->the_post();
			$do_not_duplicate[] = $post->ID; ?>
			<!-- Do stuff... -->
			<?php get_template_part('columnpost'); ?>
		<?php endwhile; ?>		
		</div><!-- #midcol -->
		
		<div id="centercol">
		<?php get_sidebar('center'); ?><!-- KM: Customize widgets for this column. -->
		</div><!-- .centercol -->
		
	</div>
	
		
	<div class="floatl maincol">
		<div id="rightcol">			
<<<<<<< HEAD
		<?php $my_query = new WP_Query('tag=love&posts_per_page=2');
=======
		<?php $my_query = new WP_Query('tag=trans&posts_per_page=2');
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
		while ($my_query->have_posts()) : 
			$my_query->the_post();
			$do_not_duplicate[] = $post->ID; ?>
			<!-- Do stuff... -->
			<?php get_template_part('columnpost'); ?>
		<?php endwhile; ?>	
		</div><!-- #rightcol -->
		
	</div>
	
</div><!-- #top3 -->

<<<<<<< HEAD
<div id="gallery" class="clearfix floatparentfix">
<div class="gallery-box">
	<div id="gallery-cont" class="gallery-content">
	<span id="gallery-left" class="left button"></span>
	<div id="gallery-list" class="gallery-imglist">
		<ul>
		
		<li><a href="http://site.douban.com/widget/photos/1951351/photo/1456042815/" target=_BLANK  class="img">
		<div class="image-window shadowbox rainbow3" style="height:150px; width:250px;">
			<img alt="atrl-" src="http://i.imgur.com/bPbK8.jpg" />
		</div><!-- .image-window --></a>
		<a href="#gallery" class="gallery-unit">篠原千絵『夢の雫、黄金の鳥籠』</a></li>
		
		<li><a href="http://site.douban.com/widget/photos/1951351/photo/1456231607/" target=_BLANK class="img">
		<div class="image-window shadowbox rainbow4" style="height:150px; width:250px;">
			<img alt="atrl-" src="http://i.imgur.com/sLWMG.jpg" />
		</div><!-- .image-window --></a>
		<a href="#gallery" class="gallery-unit">『子連れ狼 第6巻 愛蔵版』</a></li>
		
		<li><a href="http://site.douban.com/widget/photos/1951351/photo/1456082538/" target=_BLANK class="img">
		<div class="image-window shadowbox rainbow1" style="height:150px; width:250px;">
			<img alt="atrl-" src="http://i.imgur.com/ucsaL.jpg" />
		</div><!-- .image-window --></a>
		<a href="#gallery" class="gallery-unit">『マコちゃんのリップクリーム』</a></li>
		
		<li><a href="http://site.douban.com/widget/photos/1951351/photo/1456122758/" target=_BLANK  class="img">
		<div class="image-window shadowbox rainbow2" style="height:150px; width:250px;">
			<img alt="atrl-" src="http://i.imgur.com/c9eqj.jpg" />
		</div><!-- .image-window --></a>
		<a href="#gallery" class="gallery-unit">天野こずえ『蓝海少女』</a></li>
		
		<li><a href="http://site.douban.com/widget/photos/1951351/photo/1451946340/" target=_BLANK  class="img">
		<div class="image-window shadowbox rainbow2" style="height:150px; width:250px;">
			<img alt="atrl-" src="http://i.imgur.com/66uWX.jpgg" />
		</div><!-- .image-window --></a>
		<a href="#gallery" class="gallery-unit">『新·恐怖宠物店』最新卷</a></li>

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


<div class="mainlist floatl floatparentfix clearfix">
=======
<div id="midholder" class="floatparentfix clearfix" style="height: 70px; background-color: #eef0f2; background-repeat:repeat; background-image: url(http://i.imgur.com/FV2MV.png);">
	
</div>

<div id="mainlist" class="floatparentfix clearfix">
<div class="mainlist-home floatparentfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); 
	if( in_array($post->ID, $do_not_duplicate) ) continue; ?>
		<?php get_template_part( 'mainlistpost'); ?>
<?php endwhile; endif; ?>
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.

	<div class="mainlist-home floatparentfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		if( in_array($post->ID, $do_not_duplicate) ) continue; ?>
			<?php get_template_part( 'mainlistpost'); ?>
	<?php endwhile; endif; ?>
	</div><!-- .mainlist-home -->
	
	<a href="index.php?cat=1" class="button">
		<div class="mainlist-button more-button">阅读更多文章</div>
	</a>

</div><!-- #mainlist -->

<?php get_sidebar('home'); ?><!-- KM: Customize widgets for this column. -->
<?php get_footer(); ?>
