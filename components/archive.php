<div class="l-card__inner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="p-card c-card">
          <?php the_post_thumbnail(); ?>

          <section class=" c-card__contents-area">
            <?php
            $post_date = get_the_date('Y-m-d');
            $now = date('Y-m-d');
            $new_date = date('Y-m-d', strtotime('-7 days', strtotime($now)));
            if ($post_date > $new_date) {
              echo '<span class="c-card__new">NEW</span>';
            }; ?>
            <section class="c-card__text-area">
              <h3 class="c-card__title">
                <?php the_title(); ?>
              </h3>
              <?php get_single(); ?>
              <!-- preg_match_all から取得-->
              <?php

              //小見出しh2の文字数を除外して抜粋を開始
              $start = 6;

              //取得する長さ（文字数）
              $length = 100;

              //指定した文字数を出力
              echo mb_substr(get_the_excerpt(), $start, $length), ',,,続きを読む';

              ?>
            </section>
            <section class="c-card__btn-area">
              <button class="c-card__btn">
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