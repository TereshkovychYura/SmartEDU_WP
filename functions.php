<?php 

# Hooks
add_action("wp_enqueue_scripts", 'cr_enqueue');
function cr_enqueue()
{
    $url = get_template_directory_uri();
    $ver = time();
    wp_enqueue_style('bootstrap', $url . '/assets/css/bootstrap.min.css', [], $ver);
    wp_enqueue_style('timeline', $url . '/assets/css/timeline.min.css', [], $ver);
    wp_enqueue_style('bootstrap-slider', $url . '/assets/css/bootstrap-touch-slider.css', [], $ver);
    wp_enqueue_style('versions', $url . '/assets/css/versions.css', [], $ver);
    wp_enqueue_style('responsive', $url . '/assets/css/responsive.css', [], $ver);
    wp_enqueue_style('custom', $url . '/assets/css/custom.css', [], $ver);
    wp_enqueue_style('style', $url . '/style.css', [], $ver);
    wp_enqueue_style('animate', $url . '/assets/css/animate.css', [], $ver);
    wp_enqueue_style('animatemin', $url . '/assets/css/animate.min.css', [], $ver);
    wp_enqueue_style('owl-carousel', $url . '/assets/css/owl.carousel.css', [], $ver);
    wp_enqueue_style('flaticon', $url . '/assets/css/flaticon.css', [], $ver);
    wp_enqueue_style('prettyPhoto', $url . '/assets/css/prettyPhoto.css', [], $ver);
    wp_enqueue_style('font-awesome', $url . '/assets/css/font-awesome.min.css', [], $ver);

    
    wp_enqueue_script("all", $url . "/assets/js/all.js", [], $ver);
    wp_enqueue_script("custom", $url . "/assets/js/custom.js", [], $ver);
    wp_enqueue_script("timeline", $url . "/assets/js/timeline.min.js", [], $ver);
    wp_enqueue_script("modernizer", $url . "/assets/js/modernizer.js", [], $ver);
    wp_enqueue_script("mapsed", $url . "/assets/js/mapsed.js", [], $ver);

}

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

function add_classes_on_li($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass) {
  return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

function prefix_move_comment_field_to_bottom( $fields ) {
 
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;

}
add_filter( 'comment_form_fields',      'prefix_move_comment_field_to_bottom', 10, 1 );