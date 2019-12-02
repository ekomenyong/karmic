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
 * @package karmic
 * @version 1.0.0
 */ get_header(); ?>
<main role="main">
  <section class="hero">
    <p class="hero-pretitle">A Strategic Creative Agency</p>
    <div class="hero-text">
      <!-- <h2 class="hero-title">Hi, we're karmic<span class="highlight">.</span></h2> -->
      <p class="hero-subtitle"><span class="typewriter">We make cool shit for brands that give a damn</span><span class="highlight">.</span></p>
    </div>
    <a class="bounce arrow-d" href="#benefits">
      <i class="far fa-angle-double-down"></i>
    </a>

  </section><!-- /section.hero -->
  <section id="benefits" class="benefits center">
    <h2 class="benefit-title">Disrupt or be disrupted<span class="highlight">.</span></h2>
    <p class="benefit-text">
      It’s time to <span class="highlight">rethinkthe traditional agency
      experience </span> and partner with passionate and talented
      creative strategists that <span class="highlight">give a damn</span>.
    </p>
    <p class="benefit-quote">
      “The unfortunate truth is that traditionalists
      are the irrelevant aristocracy. They are still
      influential due to their large networks...
      but they have minimal impact on the emerging
      disruptor class.”
    </p>
    <p class="quote-author">
      &mdash; <span class="highlight semi-bold">Paul Roetzer</span>,
      The Marketing Agency Blueprint
    </p>
    <a href="/about" class="btn">why choose karmic? <i class="far fa-angle-double-right"></i></a>
  </section><!-- /section.benefits -->
  <section class="about">
    <div class="about-content">
      <div class="about-left">
        <h2 class="about-title">We love doing what we do<span class="highlight">.</span></h2>
      </div>

      <div class="about-right">
        <p>We believe in leveraging design for the greater good.
          We believe in creating things to make people’s lives easier and more enjoyable.
          <br><br>
          We help like-minded businesses grow by creating digital experiences
          that achieve business goals and make their customers happy.</p>
      </div>
    </div><!-- /.about-content -->

    <hr class="" />

    <div class="services">
      <h2 class="service-title">Our Capabilities<span class="highlight">:</span></h2>

      <div class="service-row">
        <div class="left">
          <h3 class="service-name">Branding & Identity<span class="highlight">.</span></h3>
          
        </div>
        <div class="right">
        <p class="service-description">
            The future of your brand rests on the experiences
            people have with your products and platforms. We
            create a visual indentity and brand strategy so
            that your users love your brand as much as you do.
          </p>
          <a class="service-link" href="">Branding & Identity »</a>
        </div>
      </div><!-- /.service-row -->
      <hr class="section-hr" />

      <div class="service-row">
        <div class="left">
          <h3 class="service-name">Strategy & Consulting<span class="highlight">.</span></h3>
        </div>
        <div class="right">
        <p class="service-description">
            Our disruptive, innovative thinking combined with
            our creative human-centric mindset, allows us to
            change businesses. We translate your business
            goals into an actionable digital strategy model.
          </p>
          <a class="service-link" href="">Strategy & Consulting »</a>
        </div>
      </div><!-- /.service-row -->
      <hr class="section-hr" />

      <div class="service-row">
        <div class="left">
          <h3 class="service-name">Design & Development<span class="highlight">.</span></h3>
        </div>
        <div class="right">
          <p class="service-description">
              Beautiful user-centric designs coupled with high-quality
              modern development are at the foundation of what we do.
              We create bespoke digital interfaces that fuel
              user engagement with your brand.
            </p>
            <a class="service-link" href="">Design & Development »</a>
        </div>
      </div><!-- /.service-row -->
      <hr class="section-hr" />

      <div class="service-row">
        <div class="left">
          <h3 class="service-name">Marketing & Campaigns<span class="highlight">.</span></h3>
        </div>
        <div class="right">
          <p class="service-description">
            Data-driven and optimized digital strategies focused on
            engaging users ensure we reach the right users, at the
            right place, at the right time.
          </p>
          <a class="service-link" href="">Marketing & Campaigns »</a>
        </div>
      </div><!-- /.service-row -->

    </div><!-- /.services -->
  </section><!-- /section.about -->
  <section class="blog-feed red">
    <div class="blog-intro">
      <h2 class="section-title">balance: the karmic blog<span class="highlight">.</span></h2>
      <p class="section-subtitle">
        Read the latest digital news, case studies,
        tutorial, and tips from <span class="highlight-dark bold">karmic<span class="highlight">.</span></span>
      </p>
    </div><!-- /.blog-intro -->
    <div class="blog-grid">
      <?php query_posts('posts_per_page=1');
      if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php
              /* grab the url for the full size featured image */
              $feat_img = get_the_post_thumbnail_url();

              /* link thumbnail to full size image for use with lightbox*/
              //  echo '<a href="'.esc_url($feat_img).'" rel="lightbox">'; 
              //      the_post_thumbnail('thumbnail');
              //  echo '</a>';
              ?>
          <div class="main-blog-card">
            <figure class="main-blog-img">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'blog-img')); ?>
                </a>
              <?php endif; ?>
            </figure>

            <div class="main-blog-text">
              <span class="blog-cat-meta"><?php the_category( ', ' ); ?></span>
              <a href="<?php the_permalink(); ?>">
                <h3 class="main-blog-title"><?php the_title(); ?></h3>
              </a>
              <span class="blog-date-meta"><?php echo get_the_date(); ?></span>
              <p class="main-blog-excerpt">
                <?php echo get_the_excerpt(); ?>
              </p>
            </div>
          </div><!-- /.main-blog-card -->
        <?php endwhile;
        else : ?>
      <?php endif; ?>

      <div class="side-blog-cards">
        <?php query_posts('posts_per_page=2&offset=1');
        if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blog-card">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'blog-card-img')); ?>
                </a>
              <?php endif; ?>
              <a href="<?php the_permalink(); ?>">
                <h4 class="blog-card-title"><?php the_title(); ?></h4>
              </a>
              <span class="blog-date-meta"><?php echo get_the_date(); ?></span>
            </div><!-- /.blog-card -->
          <?php endwhile;
          else : ?>
        <?php endif; ?>
      </div><!-- /.side-blog-card -->

    </div><!-- /.blog-grid -->

  </section><!-- /section.blog-feed -->
  <section class="ebook red">
    <div class="ebook-text"> 
      <span class="ebook-meta">Free e-book Download</span>
      <h2 class="ebook-title">
      Grow new leads<span class="highlight">.</span> <br>
      Increase sales<span class="highlight">.</span>
      </h2>
      <p class="ebook-subtitle">
        Learn how to create audience-focused landing pages that 
        <span class="highlight semi-bold">drive qualified leads</span> 
        with our e-book <span class="italic">‘Stick the Landing: The 
        Complete Guide to Landing Pages That Convert’</span>.
      </p>
      <?php echo do_shortcode("[ninja_form id='2']"); ?>
    </div>
    <div class="ebook-img"> 
      <!-- TODO: Insert ebook mockup photo! -->
      <img src="http://karmic.local/wp-content/themes/karmic/assets/img/development-overhead.jpg" alt="">
    </div>
  </section><!-- /section.ebook -->
  
  <section class="contact dark">
    <div class="contact-info">
      <p class="contact-title highlight">Let's work<span class="highlight-white">.</span></p>
      <a href="mailto:hello@karmic.dev">
        <p class="email highlight-white">hello@karmic<span class="highlight">.</span>dev</p>
      </a>
    </div>

    <p class="contact-social">
      Feeling social? We're also on <a class="social-link" href="https://twitter.com/_karmicdev" target="_blank" rel="noopener noreferrer">twitter</a>, 
      and <a class="social-link" href="https://instagram.com/_karmicdev" target="_blank" rel="noopener noreferrer">instagram</a>!
    </p>
  </section><!-- /section.contact -->
</main>


<?php get_footer(); ?>