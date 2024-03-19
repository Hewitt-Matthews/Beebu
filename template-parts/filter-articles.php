<?php

$current_category = get_query_var('category');

$categories = get_categories( array(
  'hide_empty' => 0,
) ); ?>

<style>
	.cat-list.services-list {
		padding: 1em;
		margin-left: auto;
		display: inline-block;
	}
	.cat-list.services-list:focus {
		border-color: rgb(var(--primary));
	}
</style>

<select name="category-dropdown" class="cat-list category-list">
  <option value="" data-slug="all" data-id=""><?php esc_attr_e( 'Category', 'textdomain' ); ?></option>
  <?php foreach ( $categories as $category ) : ?>
    <option class="cat-list_item category-button" value="<?= $category->slug ?>" <?php if ($category->slug == $current_category) : echo 'selected'; endif; ?>><?= $category->name ?></option>
  <?php endforeach; ?>
</select>

<script>
  // Wait for the document to be ready
  jQuery(document).ready(function($) {
    // Attach change event to category dropdown
    $('select[name="category-dropdown"]').change(function() {
      // Get the selected category
      var category = $(this).val();

      // AJAX request to fetch posts based on selected category
      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
          action: 'filter_articles_by_category',
          category: category,
        },
        success: function(response) {
          // Replace posts container with new posts
          $('#posts-container').html(response);
        }
      });
    });
  });
</script>