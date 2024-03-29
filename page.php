<?php get_header(); ?>

<main class="l-main">

  <section class="c-background-image p-main-visual page">
    <h1 class="c-text--M-white"><?php the_title(); ?></h1>
  </section>
  <!-- main-visual-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="l-contents_pages p-contents_pages c-background-color--base-white">
        <section class="p-single c-contents_pages">
          <?php the_content(); ?>
          <!-- 固定ページを反映 -->

        </section>
      </article>

</main>

</div>
<!-- container -->
*
<?php get_sidebar(); ?>

<?php get_footer(); ?>