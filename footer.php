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
         <section class="footer-content container">
            <div class="social-menu">
               <?php if ( get_field( 'footer_logo', 'option' ) ) { ?>
               <img src="<?php the_field( 'footer_logo', 'option' ); ?>" class="footer-logo">
               <?php } ?>
               <p class="social-footer-text">We Make Cool Shit For Brands That Give a Damn.</p>
               <ul class="social-icons">
                  <?php dynamic_sidebar( 'social-footer' ); ?>
               </ul>
            </div><!-- /.social-menu -->
            <div class="footer-center"><?php dynamic_sidebar( 'footer-center' ); ?></div>
            <div class="footer-right"><?php dynamic_sidebar( 'footer-right' ); ?></div>
         </section><!-- /.footer-content -->

         <section class="copyright-section">
            <div class="copyright container">
                  <p class="copyright-text"><a href="https://karmic.dev">&copy; <?php echo date( 'Y' ); ?> Karmic Creative</a></p>
            </div><!-- /.copyright -->
         </section>
      </footer>

  <?php wp_footer(); ?>
  </body>
</html>