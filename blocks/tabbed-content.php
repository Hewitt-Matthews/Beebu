<?php 

$content_tabs = get_sub_field('content_tabs');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="tabbed-content section 
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">

      <div class="tabbed-content__tabs">

        <div class="tab-container__left" id="vertical-tab">

          <ul aria-controls="vertical-tab" role="tablist">

            <?php $i = 1; foreach ( $content_tabs as $tab ) : 
              
              $tab_title = $tab['tab_title'];
              
            ?>

              <li class="tab-button" role="tab" aria-controls="tab-<?= $i ?>" tabindex="0" aria-selected="<?php if ( $i == 1 ) { echo "true"; } ?>">
                <h3><?= $tab_title; ?></h3>
              </li>

            <?php $i++; endforeach; ?>

          </ul>

        </div>

        <main id="main">

          <?php $x = 1; foreach ( $content_tabs as $tab ) : ?>

            <div id="tab-<?= $x ?>" role="tabpanel" aria-expanded="<?php if ($x == 1) { echo "true"; } ?>">

              <?= $tab['tab_content']; ?>

              <a href="#main" class="button button--black">Back to top</a>

            </div>

          <?php $x++; endforeach; ?>

        </main>

      </div>

    </div>

    <script>
      $(".tab-button").click(function(event) {
        var offset = this.offsetLeft;
        var parentWidth = $(this).parent().width();
        var width = $(this).outerWidth();
        $(this).parent().animate({
          scrollLeft: offset - ((parentWidth - width) / 2.0)
        }, 500)
      });
    </script>

</div>