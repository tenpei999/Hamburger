<?php
function add_files() {
//外部読み込みファイル

  //font-awesome
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  //リセットcss
  wp_enqueue_style('reset-style', '//cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css', array(), '1.0.0');
  //preconnect デフォルト
  wp_enqueue_style('google-fonts-pre', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //Google Fonts
  wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap', array(), '');
  //メインのcssファイル
  wp_enqueue_style('main', get_stylesheet_uri(), array(), '1.0.0');
  // main.js
  wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', '', '', true);
  wp_enqueue_script('bundle', get_theme_file_uri('/js/bundle.js'), 'jquery', '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'add_files', 'readScript');
// add_action('wp_enqueue_scripts', 'add_files');

function register_my_menu() {
  register_nav_menu('header-menu', ( 'ヘッダーメニュー' ));
  register_nav_menu('sidebar-menu', ( 'サイドバーメニュー' ));
  register_nav_menu('drawer-menu', ( 'ドロワーバーメニュー' ));
  register_nav_menu('slide-menu', ( 'スライドメニュー' ));
}
add_action( 'init', 'register_my_menu' );

// アクションフックの有効化
// function theme_setup() {
function custom_theme_support() {
  add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
  add_theme_support('post-thumbnails'); // 投稿画像の表示
  set_post_thumbnail_size('100%', '100%', false);
  add_theme_support('menus'); // メニュー
  add_theme_support('title-tag'); // titleタグ
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation', 'rtbread'),
    'category_nav' => esc_html__('category navigation', 'rtbread'),
  ));
  add_theme_support('editor-styles');
  add_editor_style();

}
add_action('after_setup_theme', 'custom_theme_support');

//カテゴリー説明文でHTMLタグを使う
remove_filter('pre_term_description', 'wp_filter_kses');


//カテゴリー説明文から自動で付与されるpタグを除去
remove_filter('term_description', 'wpautop');

// ウィジェット作成
function hamburger_widgets_init() {
    register_sidebar (
        array(
            'name'          => esc_html__('category widget', 'Hamburger'),
            'id'            => 'category_widget',
            'description'   => esc_html__('category widget', 'Hamburger'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'after_title'   => "</h2>\n",
        )
    );
}
add_action( 'widgets_init', 'hamburger_widgets_init' );

if ( is_active_sidebar( 'category_widget' ) ) { dynamic_sidebar( 'category_widget' ); }

// searchは5件表示する
function my_posts_control( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }
  if ( $query->is_search() ) {
    $query->set( 'posts_per_page', '5' );
    return;
  }
}
add_action( 'pre_get_posts', 'my_posts_control' );

//サイト内検索のカスタマイズ
function custom_search($search, $wp_query) {
	global $wpdb;

	//検索ページ以外だったら終了
	if (!$wp_query->is_search)
	return $search;

	if (!isset($wp_query->query_vars))
	return $search;

	// タグ名・カテゴリ名・カスタムフィールド も検索対象にする
	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if ( count($search_words) > 0 ) {
		$search = '';
		foreach ( $search_words as $word ) {
			if ( !empty($word) ) {
				$search_word = $wpdb->escape("%{$word}%");
				$search .= " AND (
						{$wpdb->posts}.post_title LIKE '{$search_word}'
						OR {$wpdb->posts}.post_content LIKE '{$search_word}'
						OR {$wpdb->posts}.ID IN (
							SELECT distinct r.object_id
							FROM {$wpdb->term_relationships} AS r
							INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
							INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
							WHERE t.name LIKE '{$search_word}'
						OR t.slug LIKE '{$search_word}'
						OR tt.description LIKE '{$search_word}'
						)
						OR {$wpdb->posts}.ID IN (
							SELECT distinct p.post_id
							FROM {$wpdb->postmeta} AS p
							WHERE p.meta_value LIKE '{$search_word}'
						)
				) ";
			}
		}
	}

	return $search;
}
add_filter('posts_search','custom_search', 10, 2);