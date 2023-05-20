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

  <div class="l-contents_pages p-contents_pages">

    <article class="c-contents_pages">
      <h2 class="recommended-field__title">
        <p>
          <?php echo esc_html(get_post_meta($post->ID, 'blogtop_title', true)); ?>
        </p>
      </h2>
      <p>
        <?php echo esc_html(get_post_meta($post->ID, 'blogtop_text', true)); ?>
      </p>
    </article>
    <?php
    // カスタムクエリを作成する
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'news', // カスタム投稿タイプのスラッグを指定
      'posts_per_page' => 7, // 表示する記事数
      'paged' => $paged,
    );

    $custom_query = new WP_Query($args); ?>
    <?php
    // カスタムクエリのループを開始する
    if ($custom_query->have_posts()) :
      while ($custom_query->have_posts()) :
        $custom_query->the_post();
        get_template_part("components/archive-news");
      endwhile;
    endif; ?>

    <?php
    if (is_paged()) {
      echo '<div class="pagenavi-blogtop">';
    } else {
      echo '<div class="pagenavi-blogtop is-top">';
    }

    // ページネーションを表示する
    $total_pages = $custom_query->max_num_pages;
    if ($total_pages > 1) {
      $current_page = max(1, get_query_var('paged'));

      $paginate_links = paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => '<p class="pagenavi-blogtop__pre"></p>',
        'next_text' => '<p class="pagenavi-blogtop__next"></p>',
        'type' => 'array',
      ));
      echo '<span class="pages">' . sprintf('<p class="current-page"> %s / %s</p>', $current_page, $total_pages) . '</span>';

      if ($paginate_links) {
        foreach ($paginate_links as $page) {
          if (strpos($page, 'prev') !== false || strpos($page, 'next') !== false) {
            echo '<span>' . $page . '</span>';
          } else {
            $page_without_class = str_replace('class="page-numbers"', '', $page);
            $current_page_class = strpos($page, 'current') !== false ? ' current' : '';
            $page_without_class = str_replace('class="page-numbers current"', '', $page_without_class);
            echo '<span class="page-numbers' . $current_page_class . '">' . $page_without_class . '</span>';
          }
        }
      }
    }
    echo '</div>';
    ?>


    <?php
    // メインのクエリをリセットする
    wp_reset_postdata();
    ?>

    <?php wp_link_pages(); ?>
    </article>
    <!-- pages -->

</main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
<!-- container -->