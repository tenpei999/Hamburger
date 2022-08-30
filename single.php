<?php get_header(); ?>

<main class="l-main">

  <div class="c-background-image p-main-visual single">
    <h1 class="c-text--M-white">
      <?php the_title(); ?>
    </h1>
  </div>
  <!-- main-visual-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="l-contents_pages p-contents_pages c-background-color--base-white">
        <div class="p-single c-contents_pages">
          <?php the_content(); ?>
          <!-- 個別投稿を反映 -->
          
        </div>
      </div>

</main>

</div>
<!-- container -->
<?php endwhile;
  else : ?>
<p>記事はありません。</p>
<?php endif; ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>