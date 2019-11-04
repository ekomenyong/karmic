<?php
/**
 * Custom template tags for this theme
 *
 * @package karmic
 * @version 1.0.0
 */


// [ POST THUMBNAIL ]
if( ! function_exists( 'karmic_post_thumbnail' ) ) : 
  /**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
  function karmic_post_thumbnail() {
    if( ! karmic_can_show_post_thumbnail( ) ) {
      return;
    }

    if( is_singular( ) ) : ?>
    <figure class="post-thumbnail">
      <?php get_the_post_thumbnail(); ?>
    </figure>

    <?php else : ?>

    <figure class="post-thumbnail">
      <a class="post-thumbnail-inner" src="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php get_the_post_thumbnail(); ?>
      </a>
    </figure>
  <?php endif; // End is_singular
  }

endif;

// [ WHITE LOGO ]

if( ! function_exists( 'karmic_white_logo' )) : 
  function karmic_white_logo() {
    echo '<img src="https://f000.backblazeb2.com/file/karmic/karmic_h_logo_white.png" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo">';
 }
endif;