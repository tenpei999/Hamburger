<form role="search" class="p-search search-form" method="get" action="<?php echo esc_url(home_url('/'));?>">
  <label class="c-text-box--has-icon">
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    <input type="search" class="c-text-box--has-icon__inner search-field" name="s" placeholder="<?php echo esc_attr_x('キーワード', 'placeholder') ?>" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
    <i class="fa-solid fa-magnifying-glass c-text-box--has-icon__icon"></i>
  </label>
  <input type="submit" name="検索ボタン" value="検索" class="c-btn--submit search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" >
</form>

  <!-- 開発用予備
<form class="p-search" id="searchform" method="get" action="<?php echo home_url('/');?>">
  <div class="c-text-box--has-icon">
  <input type="text" name="s" id="s" placeholder="キーワード" class="c-text-box--has-icon__inner">
      <i class="fa-solid fa-magnifying-glass c-text-box--has-icon__icon"></i>
  </div>
  <input type="submit" id="searchsubmit" name="検索ボタン" value="検索" class="c-btn--submit">
</form>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
 -->