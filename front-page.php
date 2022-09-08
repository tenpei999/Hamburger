<?php get_header(); ?>

<main class="l-main">

  <section class="c-background-image p-main-visual">
    <h1 class="c-text--M-white">
      ダミーサイト
    </h1>
  </section>
  <!-- main-visual-->

  <?php if (is_home() || is_front_page()) : ?>
    <article class="l-contents--wrapper">
      <section class="l-contents p-contents__take-out c-background-image">
        <h2 class="p-contents__section-title">
          <a href="<?php echo esc_url( get_category_link( 3 ) ); ?>">
            <p class="c-text--roboto-white u-under-bar">Take out</p>
          </a>
        </h2>
        <section class="l-contents__item p-contents__item c-background-color--white-opacity">
          <h3 class="p-contents__contents-title c-text--M-text-black">
            <a href="<?php echo esc_url( get_category_link( 3 ) ); ?>">Take Out</a>
          </h3>
          <p class="c-hidden-text">
            当店のテイクアウトjで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。
          </p>
        </section>
        <!-- contents-item take out -->
        <section class="l-contents__item p-contents__item c-background-color--white-opacity">
          <h3 class="p-contents__contents-title c-text--M-text-black">
            <a href="<?php echo esc_url( get_category_link( 3 ) ); ?>">Take Out</a>
          </h3>
          <p>
            当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています。当店のテイクアウトで利用できる商品を掲載しています。
          </p>
        </section>
        <!--  contents-item take out -->
      </section>
      <!-- contents take out -->

      <section class="l-contents p-contents__eat-in c-background-image">
        <h2 class="p-contents__section-title">
          <a href="<?php echo esc_url( get_category_link( 2 ) ); ?>">
            <p class="c-text--roboto-white u-under-bar">Eat In</p>
          </a>
        </h2>
        <section class="l-contents__item p-contents__item c-background-color--white-opacity">
          <h3 class="p-contents__contents-title c-text--M-text-black">
            <a href="<?php echo esc_url( get_category_link( 2 ) ); ?>">Eat In</a>
          </h3>
          <p>
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
          </p>
        </section>
        <!-- contents-item eat in -->
        <section class="l-contents__item p-contents__item c-background-color--white-opacity">
          <h3 class="p-contents__contents-title c-text--M-text-black">
            <a href="<?php echo esc_url( get_category_link( 2 ) ); ?>">Eat In</a>
          </h3>
          <p>
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
            店内でお食事いただけるメニューです。
          </p>
        </section>
        <!--  contents-item eat in -->
      </section>
      <!-- contents eat in -->
    </article>
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