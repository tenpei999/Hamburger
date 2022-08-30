<?php get_header(); ?>

<main class="l-main">

  <div class="c-background-image p-main-visual">
    <h1 class="c-text--M-white">
      <p><?php bloginfo( 'name' ); ?></p>
    </h1>
  </div>
  <!-- main-visual-->

  <?php if (is_home() || is_front_page()) : ?>
    <div class="l-contents--wrapper">
      <div class="not-found">
        <h2>お探しのページは見つかり</h2>
        <p>
          Sorry,「<?php the_search_query(); ?>」is not found. 
        </p>
      </div>    
    </div>
    <!-- contents wrapper-->

    <div class="l-about p-about">
      <div class="l-about__inner p-about__inner">
        <h2 class="p-about__section-title">
          <p class="c-text--roboto-white  u-under-bar">
            見出しが入ります。
          </p>
        </h2>
        <p class="c-text--M-white">
          テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入りす。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入りす。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
        </p>
      </div>
    </div>
    <!-- about -->
  <?php endif; ?>
</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>