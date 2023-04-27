<?php
function add_files()
{
  //外部読み込みファイル
  wp_enqueue_style('google-fonts-pre', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //Google Fonts
  wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap', array(), '');

  // main.js
  wp_enqueue_script('jq', get_theme_file_uri('/js/jquery-3.6.1.min.js'), array('jquery'));
  wp_enqueue_script('bundle', get_theme_file_uri().'/js/bundle.js' , array('jquery'), '1.0.0', true);
  //リセットcss
  wp_enqueue_style('reset-css', get_theme_file_uri('/css/modern-css-reset-master/src/reset.css'), array(), '1.4.0');
  //メインのcssファイル
  wp_enqueue_style('main', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'add_files', 'readScript');


function register_my_menu()
{
  register_nav_menu('header-menu', ('ヘッダーメニュー'));
  register_nav_menu('sidebar-menu', ('サイドバーメニュー'));
  register_nav_menu('drawer-menu', ('ドロワーバーメニュー'));
  register_nav_menu('slide-menu', ('スライドメニュー'));
  register_nav_menu('footer-menu', ('フッターメニュー'));
}
add_action('init', 'register_my_menu');



// アクションフックの有効化
function custom_theme_support()
{
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    
  ));
  add_theme_support('post-thumbnails'); // 投稿画像の表示
  set_post_thumbnail_size('100%', '100%', false);
  add_theme_support( 'automatic-feed-links' ); //RSSフィードリンク
  add_theme_support('title-tag'); // titleタグ
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'custom-background' );
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation', 'hamburger'),
    'category_nav' => esc_html__('category navigation', 'hamburger'),
  ));
  add_theme_support('editor-styles');
  add_editor_style();
}
add_action('after_setup_theme', 'custom_theme_support');

//カテゴリー説明文でHTMLタグを使う
remove_filter('pre_term_description', 'wp_filter_kses');

$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/img/main-visual.svg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );


// ウィジェット作成
function hamburger_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('category widget', 'hamburger'),
      'id'            => 'category_widget',
      'description'   => esc_html__('category widget', 'hamburger'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'after_title'   => "</h2>\n",
    )
  );
}
add_action('widgets_init', 'hamburger_widgets_init');

if (is_active_sidebar('category_widget')) {
  dynamic_sidebar('category_widget');
}

// searchは5件表示する.archiveは3件表示する
function my_posts_control($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_search()) {
    $query->set('posts_per_page', '5');
    return;
  }
  if ($query->is_archive()) {
    $query->set('posts_per_page', '3');
    return;
  }
}
add_action('pre_get_posts', 'my_posts_control');


//検索結果から固定ページを除外
function SearchFilter($query) {
  if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
  $query->set( 'post_type', 'post' );
  }
  }
  add_action( 'pre_get_posts','SearchFilter' );

//サイト内検索のカスタマイズ
function custom_search($search, $wp_query)
{
  global $wpdb;

  //検索ページ以外だったら終了
  if (!$wp_query->is_search)
    return $search;
  if (!isset($wp_query->query_vars))
    return $search;

  // タグ名・カテゴリ名・カスタムフィールド も検索対象にする
  $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
  if (count($search_words) > 0) {
    $search = '';
    foreach ($search_words as $word) {
      if (!empty($word)) {
        $search_word = $wpdb->_escape("%{$word}%");
        $search .= " AND (
						{$wpdb->posts}.post_title LIKE '{$search_word}'
						-- OR {$wpdb->posts}.post_content LIKE '{$search_word}'
            -- // 検索結果に投稿内容を含めたい場合はコメントアウトを解除

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
add_filter('posts_search', 'custom_search', 10, 2);


// h2をsingle.phpからh2を取得しリスト
function get_single()
{
  //グローバル変数を使う為の宣言
  global $post;
  //マッチングで<h>タグを取得する
  preg_match_all('/<h[2]>.+<\/h[2]>/u', $post->post_content, $matches);
  //取得した<h>タグの個数をカウント
  $matches_count = count($matches[0]);
  if (empty($matches)) {
    //<h>タグがない場合の出力
    echo '<span>Sorry no index</span>';
  } else {
    //<h>タグが存在する場合に<h>タグを出力
    for ($i = 0; $i < $matches_count; $i++) {
      echo  $matches[0][$i];
    }
  }
}

//本体ギャラリーCSS停止
add_filter('use_default_gallery_style', '__return_false');


function gutenberg_support_setup() {
 
  //Gutenberg用スタイルの読み込み
  add_theme_support( 'wp-block-styles' );
 
  //「幅広」と「全幅」に対応
  add_theme_support( 'align-wide' );
 
}
add_action( 'after_setup_theme', 'gutenberg_support_setup' );


/**
* <head>〜</head>内にAdobe Fonts Scriptを挿入する
**/
add_action(
	'wp_head',
	function() { ?>
		<script>
(function(d) {
var config = {
kitId: 'vap4wrz',
scriptTimeout: 3000,
async: true
},
h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);
</script>
	<?php }
);