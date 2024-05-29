<?php get_header(); 

$tax_query = array();
$paged = ( get_query_var( 'post-page' ) ) ? get_query_var( 'post-page' ) : 1;
$category = get_query_var( 'category' ) ? get_query_var( 'category' ) : '' ;

$blogPosts = new WP_Query( array (
  'posts_per_page' => 3,
  'post_type'      => 'post',
  'paged'          => $paged,
  'tax_query'      => array(
    array(
      'taxonomy' => 'post-type',
      'field'    => 'slug',
      'terms'    => 'guides'
    ),
  ),
  'category_name' => $category
)); ?>

<div class="all-articles">
  <div class="wrapper articles__wrapper">
    <h1>Guides</h1>

    <?php /******************************************************************************************
     * Resource Categories
     ******************************************************************************************/
    get_template_part('/template-parts/filter-guides'); ?>

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
        <?php
        echo paginate_links(array(
          'current' => max(1, get_query_var('paged')),
          'total' => $blogPosts->max_num_pages
        )); ?>
      </div>

    </div>

  </div>
</div>
<?php include('flexible-content.php'); ?>

<?php get_footer(); ?>