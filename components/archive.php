<div class="l-card__inner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_category(', '); ?>
        <div class="p-card c-card">

          <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
          <div class="c-card__contents-area">
            <div class="c-card__text-area">
              <h3 class="c-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <h4 class="c-card__sub-title">
                <p>小見出しが入ります</p>
              </h4>
              <div class="c-card__text">
                <p>
                  <?php the_content('続きを読む'); ?>
                </p>
              </div>
            </div>
            <div class="c-card__btn-area">
              <button class="c-card__btn">
                <p>
                  詳しく見る
                </p>
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