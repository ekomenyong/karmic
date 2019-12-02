<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and
 * everything up until the closing </header> tag.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karmic
 * @version 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="top" class="karmic-header">
    <div class="header-container">
      <div class="navbar-brand">
        <a class="header-logo" href="<?php echo site_url(); ?>">
          <?php
          $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
          if (has_custom_logo()) : echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="custom-logo">';
          else : echo '<h2 class="logo-name">' . get_bloginfo('name') . '</h2>';
          endif;
          ?>
        </a>
        <div class="menu-icon" id="menu-icon" onclick="openNav()">
          <i class="fas fa-bars"></i>
        </div><!-- /.menu-icon -->
      </div><!-- /.navbar-brand -->

      <div class="navbar-menu" id="navbar-menu">
        <div class="overlay-header">
          <a class="header-logo-overlay" href="<?php echo site_url(); ?>">
            <?php karmic_white_logo(); ?>
          </a>

          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">
            <i class="fas fa-times"></i>
          </a>
        </div>

        <?php
        wp_nav_menu(
          array(
            'theme_location'    => 'primary',
            'menu'              => 'Primary',
            'container'         => false,
            'items_wrap'        => '<nav class="navbar-items" id="navbar-items" role="navigation">%3$s</nav>'
          )
        );
        ?>
      </div>
    </div>
  </header>