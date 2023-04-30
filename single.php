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
        <div class="p-recommendation-field--wrap">
          <?php if (get_post_meta($post->ID, 'recommendation_link_title', true)) : ?>
            <h2>★おすすめ情報タイトル</h2>
          <?php else : ?>
            <h2>
              <a href="<?php echo esc_url(home_url('/')); ?>">ブログのトップページへ</a>
            </h2>
          <?php endif; ?>
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