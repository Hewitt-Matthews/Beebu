<?php

/******************************************************************************************
 * Hero Type Specific Fields
 ******************************************************************************************/
$type = get_sub_field('type'); // Default value = backgroundImage

if ( $type == 'backgroundImage' ) :

  $background_image = get_sub_field('background_image');

elseif ( $type == '5050' ) :

  $hero_background_colour = get_sub_field('hero_background_colour');
  $hero_image = get_sub_field('hero_image');
  
endif;

/******************************************************************************************
 * Standard Fields
 ******************************************************************************************/
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$text_alignment = get_sub_field('text_alignment'); // Default value = left
$add_button = get_sub_field('add_button');

/******************************************************************************************
 * Optional Button Fields
 ******************************************************************************************/
if ( $add_button ) :

  $button = get_sub_field('button');
  $button_label = get_sub_field('button_label');
  $button_link = get_sub_field('button_link');

endif; ?>