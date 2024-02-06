<?php 

$title = get_sub_field('title');
$table = get_sub_field('table');
$button = get_sub_field('button');

?>

<div class="comparison">
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