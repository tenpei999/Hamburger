<?php get_header(); ?>
<main class="l-main">
  <section class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>Search:</h1>
      <p><?php echo get_search_query(); ?>
        <?php
        $total_posts = $wp_query->found_posts;
        echo '(' . $total_posts . ')';
        ?>
      </p>
    </div>
  </section>
  <!-- main-visual-->

  <article class="l-contents_pages p-contents_pages c-background-color--base-white">
    <article class="c-contents_pages">
      <?php if (is_category()) : ?>
        <?php echo category_description(); ?>
      <?php endif; ?>
    </article>
    <?php get_template_part("components/archive"); ?>

    <?php wp_link_pages(); ?>
    <?php wp_pagenavi(); ?>
  </article>
  <!-- pages -->

</main>

</div>

<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>