<?php /* Template Name: カスタムテンプレート*/ ?>

<?php get_header(); ?>

<main class="l-main">

  <section class="c-background-image p-main-visual single is-news">
    <div class="p-main-visual__inner single"></div>
    <h1 class="c-text--M-white"><?php the_title(); ?>

      <?php
      $taxonomy = 'news-category'; // カスタムタクソノミーのスラッグを指定する
      $terms = get_terms($taxonomy);

      if (!empty($terms) && !is_wp_error($terms)) {
        echo '<ul class="c-news-archive-categories is-top">';
        $count = count($terms);
        foreach ($terms as $key => $term) {
          $total_posts = $term->count;
          if ($key === $count - 1) {
            echo '<li class="c-news-archive-category is-top"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '(' . $total_posts . ')' . '</a>
          </li>';
          } else {
            echo '<li class="c-news-archive-category is-top"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . ' (' . $total_posts . ')' . '</a><p>,</P></li>';
          }
        }
        echo '</ul>';
      }
      ?>

      <?php
      $taxonomy = 'news-tags'; // カスタムタクソノミーのスラッグを指定する
      $terms = get_terms($taxonomy);

      if (!empty($terms) && !is_wp_error($terms)) {
        echo '<ul class="c-news-archive-tags is-top">';
        foreach ($terms as $term) {
          $total_posts = $term->count;
          echo '<li class="c-news-archive-tag is-top"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . ' (' . $total_posts . ')' . '</a></li>';
        }
        echo '</ul>';
      }
      ?>
    </h1>

  </section>
  <!-- main-visual-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="l-contents_pages p-contents_pages c-background-color--base-white">
        <section class="p-single c-contents_pages">
          <?php the_content(); ?>
          <!-- 個別投稿を反映 -->
        </section>
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