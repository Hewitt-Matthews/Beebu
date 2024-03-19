<?php

require 'includes/hm-core-functions.php';

//Define theme version number so we can force use updated scripts/styles
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

/******************************************************************************************
 * Enqueue CSS & JS
 ******************************************************************************************/
function add_theme_scripts() {
  wp_enqueue_style( 'dani-styles', get_stylesheet_directory_uri() . '/assets/css/dani-styles.css', false, '1.0', 'all' );
  wp_enqueue_style( 'main-styles', get_stylesheet_directory_uri() . '/assets/css/main.css', false, '1.0', 'all' );
  wp_deregister_script('jquery'); // remove original WordPress jQuery
  wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, false);
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'picturefill', 'https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.2/picturefill.min.js', array(), null, true );
  wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick-min.js', array ( 'jquery' ), '1.8.0', true);
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main-min.js', array ( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/******************************************************************************************
 * Theme Settings
 ******************************************************************************************/
add_theme_support( 'menus' );
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 1568, 9999 );
add_theme_support( 'title-tag' );

/******************************************************************************************
 * Adds html5 support
 ******************************************************************************************/
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

/******************************************************************************************
 * Initiate Options page for ACF plugin
 ******************************************************************************************/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/******************************************************************************************
 * Numbered Pagination
 ******************************************************************************************/
if ( !function_exists( 'custom_pagination' ) ) {

    function custom_pagination() {

        $prev_arrow = is_rtl() ? '→' : '←';
        $next_arrow = is_rtl() ? '←' : '→';

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if( $total > 1 )  {
            if( !$current_page = get_query_var('paged') )
                $current_page = 1;
            if( get_option('permalink_structure') ) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo paginate_links(array(
                'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'		=> $format,
                'current'		=> max( 1, get_query_var('paged') ),
                'total' 		=> $total,
                'mid_size'		=> 3,
                'type' 			=> 'list',
                'prev_text'		=> $prev_arrow,
                'next_text'		=> $next_arrow,
            ) );
        }
    }

}

/******************************************************************************************
 * Excerpt Limit
 ******************************************************************************************/
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

/******************************************************************************************
 * Add category nicenames in body and post class
 ******************************************************************************************/
function so20621481_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes[] = $category->category_nicename;
    return $classes;
}
add_filter('post_class', 'so20621481_category_id_class');

/******************************************************************************************
 * Upload limits
 ******************************************************************************************/
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/******************************************************************************************
 * Menu locations
 ******************************************************************************************/
function register_my_menus() {
    register_nav_menus(
      array(
        'main-navigation' => __( 'Main Navigation' ),
        'footer-left' => __( 'Footer Left Column' ),
        'footer-centre' => __( 'Footer Centre Column' ),
        'footer-right' => __( 'Footer Right Column' )
      )
    );
}
add_action( 'init', 'register_my_menus' );

/******************************************************************************************
 * Posts - Filter Articles
 ******************************************************************************************/
function filter_articles_by_category() {

  $category = $_POST['category'];

  $args = array(
    'post_type'      => 'post',
    'category_name'  => $category,
    'tax_query'     => array(
      array(
        'taxonomy' => 'post-type',
        'field'    => 'slug',
        'terms'    => 'articles'
      )
    ),
    'posts_per_page' => 4,
  );

  $post_query = new WP_Query($args);

  if ($post_query->have_posts()) {

    echo '<ul>';

    while ($post_query->have_posts()) : $post_query->the_post(); ?>

      <li>

        <a href="<?php the_permalink(); ?>">
          <div class="article-card__tag button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="article-card__image">
          <h3 class="article-card__title"><?php the_title(); ?></h3>
          <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
        </a>

      </li>

    <?php endwhile; wp_reset_postdata();

    echo '</ul>';

    echo paginate_links(array(
      'base' => '/articles/%_%',
      'current' => max(1, get_query_var('paged')),
      'total' => $post_query->max_num_pages
    ));

  } else {
    echo '<p>No posts found.</p>';
  }

  wp_die();
}
add_action('wp_ajax_filter_articles_by_category', 'filter_articles_by_category');
add_action('wp_ajax_nopriv_filter_articles_by_category', 'filter_articles_by_category');

/******************************************************************************************
 * Posts - Filter Guides
 ******************************************************************************************/
function filter_guides_by_category() {

  $category = $_POST['category'];

  $args = array(
    'post_type'      => 'post',
    'category_name'  => $category,
    'tax_query'     => array(
      array(
        'taxonomy' => 'post-type',
        'field'    => 'slug',
        'terms'    => 'guides'
      )
    ),
    'posts_per_page' => 4,
  );

  $post_query = new WP_Query($args);

  if ($post_query->have_posts()) {

    echo '<ul>';

    while ($post_query->have_posts()) : $post_query->the_post(); ?>

      <li>

        <a href="<?php the_permalink(); ?>">
          <div class="article-card__tag button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="article-card__image">
          <h3 class="article-card__title"><?php the_title(); ?></h3>
          <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
        </a>

      </li>

    <?php endwhile; wp_reset_postdata();

    echo '</ul>';

    echo paginate_links(array(
      'base' => '/guides/%_%',
      'current' => max(1, get_query_var('paged')),
      'total' => $post_query->max_num_pages
    ));

  } else {
    echo '<p>No posts found.</p>';
  }

  wp_die();
}
add_action('wp_ajax_filter_guides_by_category', 'filter_guides_by_category');
add_action('wp_ajax_nopriv_filter_guides_by_category', 'filter_guides_by_category'); 

/******************************************************************************************
 * Form Options - ACF Gravity Form Select
 ******************************************************************************************/
function acf_load_form_select_choices( $field ) {
    
  // Reset choices
  $field['choices'] = array();

  // Make sure Gravity Forms is active
  if (class_exists('GFForms')) {

    // Get a list of forms
    $forms = GFAPI::get_forms();

    // Check if there are forms available
    if (!empty($forms)) {

      if( is_array($forms) ) {
      
        foreach( $forms as $form ) {

          // Exclude forms with IDs 4, 5, and 6
          if ($form['id'] !== 4 && $form['id'] !== 5 && $form['id'] !== 6) {
            $field['choices'][ $form['id'] ] = $form['title'];
          }
            
        }
        
      }
    } else {
      echo 'No forms found.';
    }

  } else {
    echo 'Gravity Forms is not active.';
  }

  // Return the field
  return $field;
  
}
add_filter('acf/load_field/name=form', 'acf_load_form_select_choices'); ?>