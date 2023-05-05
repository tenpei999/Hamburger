<?php
/*
YARPP humburger
Author: tsuru
Description: テスト用テンプレートです。
*/
?>
<h2>★おすすめ商品</h2>
<ul class="p-recommended-items">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <li class="p-recommended-item">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="p-card--yarpp c-card--yarrp">
            <?php the_post_thumbnail(); ?>

            <section class="c-card__contents-area">
              <section class="c-card__text-area">
                <?php get_single(); ?>
                <!-- preg_match_all から取得-->
                <?php

                //小見出しh2の文字数を除外して抜粋を開始
                $start = 6;

                //取得する長さ（文字数）
                $length = 50;

                //指定した文字数を出力
                echo mb_substr(get_the_excerpt(), $start, $length), ',,,続きを読む';

                ?>
              </section>
              <section class="c-card__detail">
                <a href="<?php echo get_permalink(); ?>">詳しく見る</a>
              </section>
            </section>
          </div>
        </article>
      <?php endwhile;
  else : ?>
      <p>記事がありません</p>
    <?php endif; ?>
    <!-- チーズバーガー -->
      </li>
</ul>