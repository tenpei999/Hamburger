<?php get_header(); ?>

<main class="l-main">

  <section class="c-background-image p-main-visual single">
    <div class="p-main-visual__inner single"></div>
    <h1 class="c-text--M-white"><?php the_title(); ?></h1>
  </section>
  <!-- main-visual-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="l-contents_pages p-contents_pages c-background-color--base-white">
        <section class="p-single c-contents_pages">
          <?php the_content(); ?>
          <!-- 個別投稿を反映 -->
        </section>
        <div class="p-bookdetail-field--wrap">
          <ul class="p-bookdetail-field">
            <li class="p-bookdetail-field__price">金額：<?php echo esc_html(get_post_meta($post->ID, 'book_price', true)); ?>円</li>
            <li class="p-bookdetail-field__isbn">ISBN：<?php echo get_post_meta($post->ID, 'book_isbn', true); ?></li>
            <li class="p-bookdetail-field__best">ベストセラー：<i class="fa <?php echo get_post_meta($post->ID, 'book_label', true); ?>"></i></li>
          </ul>
        </div>
      </article>

</main>

</div>
<!-- container -->
<?php endwhile;
  else : ?>
<p>記事はありません。</p>
<?php endif; ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>