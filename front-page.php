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
      <h1 class="hero-title">Hi, we're karmic<span class="highlight">.</span></h1>
      <p class="hero-subtitle">We’re a <span class="highlight">strategic creative agency</span>
        creating beautiful interfaces <strong><em>for humans</em></strong>.</p>
    </div>
    <div class="hero-img">
      <img src="http://karmic.local/wp-content/themes/karmic/assets/img/karmic-displays.png" alt="responsive-web-development-devices">
    </div>
  </section><!-- /section.hero -->

  <section class="about">
    <div class="about-title">
      <h2>We make cool shit for brands that give a damn<span class="highlight">.</h2>
    </div>
    <div class="about-subtitle">
      <p>
        We believe in leveraging design for the greater good.
        We believe in creating things to make people’s lives
        easier and more enjoyable.
        <br><br>
        We help like-minded businesses grow by creating digital
        experiences that achieve business goals and make their
        customers happy.
      </p>
    </div>
  </section><!-- /section.about-->

  <section class="services"> 
    <div class="services-content">
      <h2 class="services-title">we're passionate about what we do<span class="highlight">.</span></h2>
      <p class="services-subitle">
        Let’s stop pretending modern digital efforts include a one-size-fits-all strategy.
        <br><br>
        We provide a boutique agency experience you’re gonna love.
      </p>
      <a href="/services">
        <p>Learn more »</p>
      </a>
    </div>

    <div class="services-grid">
      <div class="cards">

        <div class="card red">
          <span class="icon">
            <i class="fas fa-brackets-curly"></i>
          </span>
          <h3 class="card-title">Consulting</h3>
          <p class="card-subtitle">
            Data is knowledge and knowledge is power.
            We leverage data to formulate a strategy based on your customers.
          </p>
        </div>
        <div class="card dark">
          <span class="icon">
            <i class="fas fa-brackets-curly"></i>
          </span>
          <h3 class="card-title">Consulting</h3>
          <p class="card-subtitle">
            Data is knowledge and knowledge is power.
            We leverage data to formulate a strategy based on your customers.
          </p>
        </div>
        <div class="card red">
          <span class="icon">
            <i class="fas fa-brackets-curly"></i>
          </span>
          <h3 class="card-title">Consulting</h3>
          <p class="card-subtitle">
            Data is knowledge and knowledge is power.
            We leverage data to formulate a strategy based on your customers.
          </p>
        </div>
        <div class="card dark">
          <span class="icon">
            <i class="fas fa-brackets-curly"></i>
          </span>
          <h3 class="card-title">Consulting</h3>
          <p class="card-subtitle">
            Data is knowledge and knowledge is power.
            We leverage data to formulate a strategy based on your customers.
          </p>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>