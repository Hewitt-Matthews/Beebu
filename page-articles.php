<?php get_header(); 

$tax_query = array();
$paged = ( get_query_var( 'post-page' ) ) ? get_query_var( 'post-page' ) : 1;

if ( isset($_GET['posts']) ) :
  $tax_query = array(
    array(
      'taxonomy' => 'post-type',
      'field'    => 'slug',
      'terms'    => $_GET['posts']
    ),
  );
endif; ?>

<div class="all-articles">

  <div class="wrapper">

    <?php /******************************************************************************************
     * Featured Article
     ******************************************************************************************/
    get_template_part('/template-parts/featured-article'); ?>
    
    <h1>Articles</h1>

    <ul>

      <?php $blogPosts = new WP_Query( array (
        'posts_per_page' => 12,
        'post_type'      => 'post',
        'paged'          => $paged,
        'tax_query'      => $tax_query
      )); 
      
      while ( $blogPosts->have_posts() ) :

        $blogPosts->the_post();

      ?>

        <li>
          <a href="<?php the_permalink(); ?>">
            <div class="article-card__tag button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="article-card__image">
            <h3 class="article-card__title"><?php the_title(); ?></h3>
            <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
          </a>
        </li>

      <?php endwhile; wp_reset_postdata(); ?>

    </ul>

    <?php echo paginate_links(array(
      //'base' => '/resources/' . $args_term . '/%_%',
      'format' => '?post-page=%#%',
      'current' => max(1, get_query_var('post-page')),
      'total' => $blogPosts->max_num_pages
    )); ?>

    <?php include('flexible-content.php'); ?>

  </div>

</div>

<?php get_footer(); ?>