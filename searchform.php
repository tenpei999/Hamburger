<form role="search" class="p-search search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="c-text-box--has-icon">
    <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
    <input type="search" class="c-text-box--has-icon__inner search-field" name="s" placeholder="<?php echo esc_attr_x('検索', 'placeholder') ?>" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x('Search for:', 'label') ?>">
    <i class="fa-solid fa-magnifying-glass c-text-box--has-icon__icon"></i>
  </label>
  <input type="submit" name="検索ボタン" value="検索" class="c-btn--submit search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>">
</form>
