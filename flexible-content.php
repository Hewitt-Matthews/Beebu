<?php // open the WordPress loop
if (have_posts()) : while (have_posts()) : the_post();

    // are there any rows within within our flexible content?
    if( have_rows('content_blocks') ):

        // loop through all the rows of flexible content
        while ( have_rows('content_blocks') ) : the_row();

            if( get_row_layout() == 'benefits' )
                get_template_part('blocks/benefits');

            if( get_row_layout() == 'comparison_table' )
                get_template_part('blocks/comparison');

            if( get_row_layout() == 'call_to_action' )
                get_template_part('blocks/cta');

            if( get_row_layout() == 'featured_articles' )
                get_template_part('blocks/featured-articles');

            if( get_row_layout() == 'help_and_advice' )
                get_template_part('blocks/help');

            if( get_row_layout() == 'hero' )
                get_template_part('blocks/hero');

            if( get_row_layout() == 'packages' )
                get_template_part('blocks/packages');

            if( get_row_layout() == 'reviews' )
                get_template_part('blocks/reviews');


        endwhile; // close the loop of flexible content
    endif; // close flexible content conditional

endwhile; endif; ?>
