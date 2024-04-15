<?php get_header(); 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$category = get_query_var( 'category' ) ? get_query_var( 'category' ) : '' ;

$blogPosts = new WP_Query( array (
  'posts_per_page' => 4,
  'post_type'      => 'post',
  'paged'          => $paged,
  'tax_query'     => array(
    array(
      'taxonomy' => 'post-type',
      'field'    => 'slug',
      'terms'    => 'articles'
    )
  ),
  'category_name' => $category
)); ?>

<div class="all-articles">

  <?php /******************************************************************************************
   * Featured Article
   ******************************************************************************************/
  get_template_part('/template-parts/featured-article'); ?>

  <div class="wrapper">
  
    <h1>Articles</h1>

    <?php /******************************************************************************************
     * Resource Categories
     ******************************************************************************************/
    get_template_part('/template-parts/filter-articles'); ?>

    <div id="posts-container">

      <ul>

        <?php while ( $blogPosts->have_posts() ) : $blogPosts->the_post(); ?>

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

      <div class="pagination">
        <?php echo paginate_links(array(
          'current' => max(1, get_query_var('paged')),
          'total' => $blogPosts->max_num_pages
        )); ?>
      </div>

    </div>

  </div>

  <?php include('flexible-content.php'); ?>

</div>

<?php get_footer(); ?>