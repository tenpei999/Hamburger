<?php
get_header();
?>

<main class="l-main">
  <section class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>全ての記事</h1>
      <p><?php single_cat_title(); ?>
        <?php
        $count_custom = wp_count_posts('news');
        $custom_posts = $count_custom->publish;
        echo '(' . $custom_posts . '件)';
        ?>
      </p>
    </div>
  </section>
  <!-- main-visual-->

  <article class="l-contents_pages p-contents_pages c-background-color--base-white">
    <ul>
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1; // 何ページ目かを取得
      $args = array(
        'post_type' => 'news',
        'posts_per_page' => 7,
        'paged' => $paged,
        'no_found_rows'  => true,
        'post_status' => 'publish',
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
          $the_query->the_post();
          // 投稿の表示
          get_template_part("components/archive-news");
        }
      }
          ?>

    </ul>

    <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi();
    }

    wp_reset_postdata();
    wp_reset_query();
    ?>

    <?php wp_link_pages(); ?>
  </article>
  <!-- pages -->

</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>