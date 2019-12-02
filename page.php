<?php

/**
 * Template Name: Page
 *
 * (the template for displaying contact page)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package karmic
 * @version 1.0.0
 */
get_header(); ?>

<main role="main">
  <section class="page-heading page-section">
    <h1 class="page-title"><?php the_title(); ?><span class="highlight">.</span></h1>
  </section><!-- .page-heading -->

  <section class="page-content page-section" id="contact">
    <div class="section-intro">
      <h2 class="section-title">This is a section heading</h2>
      <p class="section-subtitle">This is a section subtitle</p>
    </div>
  </section><!-- .page-content -->

</main>

<?php get_footer(); ?>