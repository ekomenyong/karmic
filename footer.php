<?php

/**
 * The template for displaying the footer
 *
 * Contains the <footer></footer> and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package karmic
 * @version 1.0.0
 */
?>
<footer>
  <section class="main-footer">
    <a class="footer-logo-link" href="#top">
      <img class="footer-logo" src="http://karmic.local/wp-content/themes/karmic/assets/img/karmic_h_logo.png" alt="">
    </a>
    <div class="footer-nav">
      <?php
      wp_nav_menu(
        array(
          'theme_location'    => 'footer',
          'menu'              => 'footer',
          'container'         => false,
          'items_wrap'        => '<nav class="footer-navbar-items" id="footer-navbar-items" role="navigation">%3$s</nav>'
        )
      );
      ?>
    </div>
  </section><!-- /.main-footer -->
  <section class="badges page-section">
      <span class="badge">
        <a href="">
        <?php echo do_shortcode('[matomo_privacy_badge size=128]'); ?>
        </a>
      </span>
      <span class="badge">
        <?php echo do_shortcode('[matomo_opt_out font_color=333333 font_size=16px font_family=Silka id=opt]'); ?>
      </span>
      
  </section><!-- /.badges -->
  <div class="copyright-bar">
    <div class="copyright">
      <p class="copyright-text bold">
        <a href="https://karmic.dev"> &copy; <?php echo date('Y'); ?></a>
        karmic<span class="highlight">.</span> <span class="copyright-right">&mdash; A Strategic Creative Agency</span>
      </p>
    </div><!-- /.copyright -->
    <div class="social-menu">
      <a class="social-icon" href="https://twitter.com/_karmicdev" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-twitter"></i>
      </a>
      <a class="social-icon" href="https://instagram.com/_karmicdev" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-instagram"></i>
      </a>
      <a class="social-icon" href="https://github.com/karmic-dev" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-github"></i>
      </a>
    </div><!-- /.social-menu -->
  </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>