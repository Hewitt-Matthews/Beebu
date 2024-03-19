<?php

$form = get_sub_field('form');

$add_contact_block = get_sub_field('add_contact_block');
$email = get_field('email_address', 'option');
$telephone = get_field('telephone', 'option');
$contact_address = get_field('contact_address', 'option'); ?>

<div class="form section">
  <div class="wrapper">
    <div class="form__form">
      <?php echo do_shortcode('[gravityform id="' . $form . '" title="false" ajax="true"]'); ?>
    </div>
    <div class="form__contact-card">
      <?php if ( $add_contact_block ) : ?>

        <div class="contact-card">

          <?php if (  $contact_address ) : ?>
            <strong>Address</strong>
            <?php if ( $contact_address['address_line_1'] ) : ?>
              <p><?= $contact_address['address_line_1'] ?></p>
            <?php endif; ?>
            <?php if ( $contact_address['address_line_2'] ) : ?>
              <p><?= $contact_address['address_line_2'] ?></p>
            <?php endif; ?>
            <?php if ( $contact_address['address_line_3'] ) : ?>
              <p><?= $contact_address['address_line_3'] ?></p>
            <?php endif; ?>
            <?php if ( $contact_address['address_town'] ) : ?>
              <p><?= $contact_address['address_town'] ?></p>
            <?php endif; ?>
            <?php if ( $contact_address['address_county'] ) : ?>
              <p><?= $contact_address['address_county'] ?></p>
            <?php endif; ?>
            <?php if ( $contact_address['address_postcode'] ) : ?>
              <p><?= $contact_address['address_postcode'] ?></p>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ( $telephone ) : ?>
            <strong>Telephone</strong>
            <a class="" href="tel:<?= $telephone ?>"><?= $telephone ?></a>
          <?php endif; ?>

          <?php if ( $email ) : ?>
            <strong>Email</strong>
            <a class="" href="mailto:<?= $email ?>"><?= $email ?></a>
          <?php endif; ?>

        </div>

      <?php endif; ?>
    </div>
  </div>
</div>