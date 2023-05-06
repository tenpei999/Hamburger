<div class="l-card__inner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="p-card--news c-card--news">
          <?php the_post_thumbnail(); ?>
          <section class="c-card--news__contents-area">
            <?php
            $post_date = get_the_date('Y-m-d');
            $now = date('Y-m-d');
            $new_date = date('Y-m-d', strtotime('-7 days', strtotime($now)));
            if ($post_date > $new_date) {
              echo '<span class="c-card__new">NEW</span>';
            }; ?>
            <section class="c-card--news__text-area">
              <h3 class="c-card--news__title">
                <?php the_title(); ?>
              </h3>
              <?php
              $taxonomy = 'news-category'; // カスタムタクソノミーのスラッグを指定する
              $terms = get_terms($taxonomy);

              if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="c-news-archive-categories">';
                $count = count($terms);
                foreach ($terms as $key => $term) {
                  if ($key === $count - 1) {
                    echo '<li class="c-news-archive-category"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a></li>';
                  } else {
                    echo '<li class="c-news-archive-category"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . ',</a></li>';
                  }
                }
                echo '</ul>';
              }
              ?>

              <?php
              $taxonomy = 'news-tags'; // カスタムタクソノミーのスラッグを指定する
              $terms = get_terms($taxonomy);

              if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="c-news-archive-tags">';
                foreach ($terms as $term) {
                  echo '<li class="c-news-archive-tag"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a></li>';
                }
                echo '</ul>';
              }
              ?>



              <?php get_single(); ?>
              preg_match_all から取得
              <?php

              //小見出しh2の文字数を除外して抜粋を開始
              $start = 6;

              //取得する長さ（文字数）
              $length = 100;

              //指定した文字数を出力
              echo mb_substr(get_the_excerpt(), $start, $length), ',,,続きを読む';

              ?>
            </section>
            <section class="c-card--news__btn-area">
              <button class="c-card--news__btn">
                <a href="<?php echo get_permalink(); ?>">詳しく見る</a>
              </button>
            </section>
          </section>
        </div>
      <?php endwhile;
  else : ?>
      <p>記事がありません</p>
    <?php endif; ?>
    <!-- チーズバーガー -->
      </article>