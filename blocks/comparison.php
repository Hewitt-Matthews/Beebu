<?php 

$use_options_page_comparison_table_data = get_sub_field('use_options_page_comparison_table_data');
if ( $use_options_page_comparison_table_data === true ) :
  $title = get_field('comparison_table_title', 'options');
  $table = get_field('comparison_table_table', 'options');
  $button = get_field('comparison_table_button', 'options');
  $section_options_background_colour = get_sub_field('section_options_background_colour');
  $section_options_curved_section = get_sub_field('section_options_curved_section');
  $section_padding = get_sub_field('section_padding');
else :
  $title = get_sub_field('title');
  $table = get_sub_field('table');
  $button = get_sub_field('button');
  $section_options_background_colour = get_sub_field('section_options_background_colour');
  $section_options_curved_section = get_sub_field('section_options_curved_section');
  $section_padding = get_sub_field('section_padding');
endif; ?>

<div class="comparison hide-mobile section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="comparison__inner">
            <h2 class="comparison__title"><?=$title ?></h2>
            <div class="comparison__grid">
                <?php
                if ( ! empty ( $table ) ) {

                    echo '<table cellspacing="0" border="0">';
                
                        if ( ! empty( $table['caption'] ) ) {
                
                            echo '<caption>' . $table['caption'] . '</caption>';
                        }
                
                        if ( ! empty( $table['header'] ) ) {
                
                            echo '<thead>';
                
                                echo '<tr>';
                
                                    foreach ( $table['header'] as $th ) {
                
                                        echo '<th>';
                                            echo $th['c'];
                                        echo '</th>';
                                    }
                
                                echo '</tr>';
                
                            echo '</thead>';
                        }
                
                        echo '<tbody>';
                
                            foreach ( $table['body'] as $tr ) {
                
                                echo '<tr>';
                
                                    foreach ( $tr as $td ) {
                
                                        echo '<td>';
                                            echo $td['c'];
                                        echo '</td>';
                                    }
                
                                echo '</tr>';
                            }

                            echo '<tr><td></td><td>';
                            echo '<a href="'.$button['url'].'" class="button button--black">'.$button['title'].'</a>';
                            echo '</td></tr>';
                
                        echo '</tbody>';
                
                    echo '</table>';
                }
                ?>
            </div>
        </div>
    </div>
</div>



<!-- Mobile Version -->
<div class="comparison hide-desktop section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="comparison__inner">
            <h2 class="comparison__title"><?=$title ?></h2>
            <div class="comparison__grid">
                <?php
                if ( ! empty ( $table ) ) {

                    if ( ! empty( $table['header'] ) ) {
                
                        foreach ( $table['header'] as $key => $th ) {

                            if ($key != 0) {

                                echo '<div class="comparison__grid-mob js-comparison-grid-mob">';

                                    echo '<h3>';

                                        echo $th['c'];

                                        echo '<span class="comparison__expand js-comparison__expand">&nbsp;</span>';

                                    echo '</h3>';

                                    echo '<ul>';

                                    $i = 0;

                                    while ($i < sizeof($table['header']) - 1) {

                                        echo '<li>';

                                            echo implode(" ", $table['body'][$i][$key]);

                                        echo '</li>';
                                        
                                        $i++;
                                    }

                                    echo'</ul>';

                                    // Only display button after first list
                                    if ($key == 1) {

                                        echo '<a href="'.$button['url'].'" class="button button--black">'.$button['title'].'</a>';

                                    }

                                echo '</div>';

                            }
                            
                        }
            
                    }
                    
                }
                ?>
            </div>
        </div>
    </div>
</div>