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

        <div id="main" class="tab-container__right">

          <?php $x = 1; foreach ( $content_tabs as $tab ) : ?>

            <div id="tab-<?= $x ?>" role="tabpanel" aria-expanded="<?php if ($x == 1) { echo "true"; } ?>">

              <?= $tab['tab_content']; ?>

              <a href="#main" class="button button--black">Back to top</a>

            </div>

          <?php $x++; endforeach; ?>

        </div>

      </div>

    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Get all tab buttons
        const tabButtons = document.querySelectorAll('.tab-button');

        // Add click event listeners to each tab button
        tabButtons.forEach(function(tabButton) {
          tabButton.addEventListener('click', function() {
            // Get the tab ID associated with the clicked button
            const tabId = tabButton.getAttribute('aria-controls');

            // Hide all tab panels
            const tabPanels = document.querySelectorAll('[role="tabpanel"]');
            tabPanels.forEach(function(tabPanel) {
              tabPanel.style.display = 'none';
            });

            // Show the selected tab panel
            const selectedTabPanel = document.getElementById(tabId);
            if (selectedTabPanel) {
              selectedTabPanel.style.display = 'block';
            }

            // Set the aria-selected attribute for tab buttons
            tabButtons.forEach(function(button) {
              button.setAttribute('aria-selected', 'false');
            });
            tabButton.setAttribute('aria-selected', 'true');
          });
        });
      });
    </script>

</div>