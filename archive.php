<?php get_header(); ?>

<main class="l-main">
  <div class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>
        Menu:
      </h1>
      <P>
        <?php single_cat_title(); ?>
      </P>
    </div>
  </div>
  <!-- main-visual-->

  <div class="l-contents_pages p-contents_pages c-background-color--base-white">
    <div class="c-contents_pages">
      <?php if (is_category()) : ?>
        <?php echo category_description(); ?>
      <?php endif; ?>
    </div>



    <?php get_template_part("components/archive"); ?>

    <?php wp_pagenavi(); ?>
  </div>
  <!-- pages -->

</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
