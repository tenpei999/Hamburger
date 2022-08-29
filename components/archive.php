<div class="l-card__inner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
        <div class="p-card c-card">
          <?php the_post_thumbnail(); ?>

          <div class=" c-card__contents-area">
            <div class="c-card__text-area">
              <h3 class="c-card__title">
                <?php the_title(); ?>
              </h3>
              <?php get_single(); ?> <!-- preg_match_all から取得-->
              <?php the_excerpt(); ?>
            </div>
            <div class="c-card__btn-area">
              <button class="c-card__btn">
                <a href="<?php echo get_permalink(); ?>">
                  詳しく見る
                </a>
              </button>
            </div>
          </div>
        </div>
      <?php endwhile;
  else : ?>
      <p>記事がありません</p>
    <?php endif; ?>
    <!-- チーズバーガー -->
      </div>