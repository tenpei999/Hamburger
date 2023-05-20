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
      <?php
      if (is_category()) {
        echo category_description();
        get_template_part("components/archive");
      } elseif (is_tag()) {
        // タグのアーカイブに関する処理
        echo tag_description();
        get_template_part("components/archive");
      }
      ?>
    </article>

    <div class="wp-pagenavi--wrapper">
      <?php wp_link_pages(); ?>
      <?php if (is_paged()) : ?>
        <?php wp_pagenavi(); ?>
      <?php else : ?>
        <div class="pagenavi-is-top">
          <?php wp_pagenavi(); ?>
        </div>
      <?php endif; ?>
    </div>
  </article>
  <!-- pages -->

</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>