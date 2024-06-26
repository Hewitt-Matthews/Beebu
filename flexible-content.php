<?php // open the WordPress loop
if (have_posts()) : while (have_posts()) : the_post();

    // are there any rows within within our flexible content?
    if( have_rows('content_blocks') ):

        // loop through all the rows of flexible content
        while ( have_rows('content_blocks') ) : the_row();

            if( get_row_layout() == 'benefits' )
                get_template_part('blocks/benefits');

            if( get_row_layout() == 'careers_list' )
                get_template_part('blocks/careers-list');

            if( get_row_layout() == 'coloured_block_grid' )
                get_template_part('blocks/coloured-block-grid');

            if( get_row_layout() == 'comparison_table' )
                get_template_part('blocks/comparison');

            if( get_row_layout() == 'content_slider' )
                get_template_part('blocks/content-slider');

            if( get_row_layout() == 'call_to_action' )
                get_template_part('blocks/cta');

            if( get_row_layout() == 'employee_testimonial_slider' )
                get_template_part('blocks/employee-testimonial-slider');

            if( get_row_layout() == 'featured_articles' )
                get_template_part('blocks/featured-articles');

            if( get_row_layout() == 'form' )
                get_template_part('blocks/form');

            if( get_row_layout() == 'grid_content' )
                get_template_part('blocks/grid-content');

            if( get_row_layout() == 'guides_slider' )
                get_template_part('blocks/guides-slider');

            if( get_row_layout() == 'help_and_advice' )
                get_template_part('blocks/help');

            if( get_row_layout() == 'hero' )
                get_template_part('blocks/hero');

            if( get_row_layout() == 'image' )
                get_template_part('blocks/image');

            if( get_row_layout() == 'packages' )
                get_template_part('blocks/packages');

            if( get_row_layout() == 'reviews' )
                get_template_part('blocks/reviews');

            if( get_row_layout() == 'tabbed_content' )
                get_template_part('blocks/tabbed-content');

            if( get_row_layout() == 'team_slider' )
                get_template_part('blocks/team-slider');

            if( get_row_layout() == 'text_block' )
                get_template_part('blocks/text-block');

            if( get_row_layout() == 'text_-_image_block' )
                get_template_part('blocks/text-image-block');

            if( get_row_layout() == 'text_-_list_block' )
                get_template_part('blocks/text-list-block');

        endwhile; // close the loop of flexible content
    endif; // close flexible content conditional

endwhile; endif; ?>
