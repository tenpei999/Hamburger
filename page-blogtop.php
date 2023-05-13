<?php get_header(); ?>

<main class="l-main">
  <section class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>全ての記事</h1>
      <P><?php single_cat_title(); ?>
        <?php
        $count_custom = wp_count_posts('news');
        $custom_posts = $count_custom->publish;
        echo '(' . $custom_posts . '件)';
        ?>
      </P>
    </div>
  </section>
  <!-- main-visual-->

  <article class="l-contents_pages p-contents_pages c-background-color--base-white">
    <?php
    $args = array(
      'post_type' => 'news',
      'posts_per_page' => 7,
      'paged' => get_query_var('paged'),
      'no_found_rows'  => true,
    );
    
    $posts = get_posts($args);

    if ($posts) {
      foreach ($posts as $posts) {
        setup_postdata($post);
        get_template_part("components/archive-news");
      }
    }

    wp_pagenavi();
    wp_reset_postdata();

    wp_link_pages(); ?>
  </article>
  <!-- pages -->

</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>