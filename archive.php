<?php get_header(); ?>

<main class="l-main">
  <section class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>Menu:</h1>
      <P><?php single_cat_title(); ?>
        <?php
        $term = get_queried_object();
        $total_posts = $term->count;
        echo '(' . $total_posts . ')';
        ?>
      </P>
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