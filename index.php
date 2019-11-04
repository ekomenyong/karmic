<?php
/**
 * The div template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package karmic
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main id="main" role="main" class="main-blog">
  <section class="blog-intro">
    <div class="blog-heading container">
      <h1 class="blog-title center"> <?php single_post_title(); ?> </h1>
    </div>
  </section>

  <section class="index-container">
      <div class="index-content container">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>

        <?php if ( has_post_thumbnail() ) {
          // Get the post thumbnail URL
          $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        } else {
          
          // Get the default featured image in theme options
          $feat_image = get_field('default_featured_image', 'option');
        } ?>
        <section class="card container" 
          style="background: linear-gradient( rgba( 233,77,78, 0.7 ), rgba( 34,126,129,0.7 ) ), 
            url(<?php echo $feat_image; ?>) no-repeat; background-size: cover;">
          <div <?php post_class('post-section'); ?> id="post-<?php the_ID(); ?>">
              <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="post-date"><?php echo get_the_date(); ?></p>
              <div class="post-cat"><?php the_category(); ?></div>
            <div class="post-info">
              <div class="card-subtitle"><?php the_content(); ?></div>
            </div><!-- .post-info -->

          </div><!-- .post-class -->
        </section><!-- .card -->

        <?php endwhile; ?>

        <div class="index-navigation">
        <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
        </div><!-- .index-navigation -->

        <?php else : ?>
        

        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h2>Not Found</h2>
        </div><!-- .post-class -->
        <?php wp_reset_postdata();?>
        <?php endif; ?>

      </div><!-- .index-content -->

      <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
      <div class="sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
      </div><!-- .sidebar -->

    <?php endif; ?>

  </section><!-- .index-container -->

</main>


<?php get_footer(); ?>