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
      <img class="footer-logo" src="http://karmic.site/wp-content/themes/karmic/assets/img/karmic_h_logo.png" alt="">
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
</footer>
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
    <a class="social-icon" href="http://" target="_blank" rel="noopener noreferrer">
      <i class="fab fa-facebook"></i>
    </a>
  </div><!-- /.social-menu -->
</div>

<?php wp_footer(); ?>
</body>

</html>