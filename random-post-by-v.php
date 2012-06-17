<?php
/*
Plugin Name: Random Post Widget by V
Plugin URI: http://mangatalk.net/
Description: Display a list of randomized articles, coded by Karuto. (BTW: do not set title manually.)
Author: Karuto
Version: 0.1
Author URI: http://karu.me/
*/
/*
Credit: http://www.makeuseof.com/tag/how-to-create-wordpress-widgets/
Caution: after finishing coding, you still have to activate it before it shows up in the widget menu.
*/
 
class RandomPostWidget extends WP_Widget
{
  function RandomPostWidget()
  {
    $widget_ops = array('classname' => 'RandomPostWidget', 'description' => 'Display a list of randomized articles, coded by Karuto. (BTW: do not set title manually.)' );
    $this->WP_Widget('RandomPostWidget', 'Random Articles', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>

<p><label for="<?php echo $this->get_field_id('title'); ?>">
Title: 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
</label></p>
	
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
	// WIDGET CODE GOES HERE	
	
	// KM: FIXING THE FUCKING IE COLLAPSE PROBLEM. 
	echo '<div class="floatparentfix clearfix">';
	echo '<div class="wtitle1">漫言推荐</div><div class="wtitle2 roboto">Recommended Reads</div>';
	echo '</div>';
	query_posts('');	
	if (have_posts()) : 
		// Modify $my_query to filter the desired result.
		$my_query = new WP_Query('orderby=rand&posts_per_page=3');
		echo '<div class="wsep clearfix"></div><ul class="flist">';
		
		while ($my_query->have_posts()) : 
			if( in_array($post->ID, $sidebar_posts) ) continue;	// KM: check sidebar_posts array to avoid duplication.
			$my_query->the_post();
			echo '<li class="funit clearfix floatparentfix"><div class="funit-thumb">';
			echo the_post_thumbnail( array(75,75) );
			echo '</div><div class="funit-title">';
			echo "<a href='".get_permalink()."'>".get_the_title()."</a>";
			echo '<h6 class="less-focus roboto">On ';
			echo get_the_date();
			echo ' By ';
			echo "<a href='". esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )."'>". get_the_author() ."</a>";
			echo '';
			echo '';
			echo '</h6>';
			echo '</div></li>';
		endwhile;
		echo "</ul>";
		
	echo '<a href="http://www.mangatalk.net/index.php?random=1" class="button"><div class="featuremore more-button">随机文章</div></a>';
		
	endif; 
	wp_reset_query();
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );?>

