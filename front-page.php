<?php
/**
 * The front-page.php template file is used to render your site’s 
 * front page, whether the front page displays the blog posts index 
 * or a static page.
 * 
 * If the front-page.php file does not exist, WordPress will either 
 * use the home.php or page.php files depending on the setup in 
 * Settings → Reading. If neither of those files exist, it will 
 * use the index.php file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WP Karmic WordPress Framework
 * @version 1.0.0
 */ get_header(); ?>

<main>
  <section class="hero">

    <div class="hero-content">
      <div class="hero-header"></div><!-- /.hero-header -->

      <div class="hero-main">
        <h1 class="hero-title"><?php the_field('hero_title', 'option'); ?></h1>
        <p class="hero-subtitle"><?php the_field('hero_subtitle', 'option'); ?></p>
      </div><!-- /.hero-main -->

      <div class="hero-footer"></div><!-- /.hero-footer -->
    </div><!-- /.hero-content -->

    <div class="hero-img">
      <img src="http://kcfw.local/wp-content/themes/karmic/assets/img/hero_scene.png" alt="">
    </div><!-- /.hero-img -->

  </section><!-- /section.hero -->
</main>

<?php get_footer(); ?>