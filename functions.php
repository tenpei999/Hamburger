<?php

/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage themrishvite
 */

//develop mode config
define("IS_VITE_DEVELOPMENT", true);

//define
define('DIST_DEF', 'dist');
define('DIST_URI',  get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory()     . '/' . DIST_DEF);

define('JS_DEPENDENCY', array()); // array( 'jquery' ) as example
define('JS_LOAD_IN_FOOTER', true); // load scripts in footer?

define('VITE_SERVER', 'http://localhost:3000');
define('VITE_ENTRY_POINT', '/main.js');

/*
 * init theme support
 */
function themrishvite_theme_support()
{
  add_theme_support('html5', array(
    'comment-form',
    'comment-list',
    'search-form',
    'gallery',
    'caption',
    'style',
    'script'
  ));
  add_theme_support("post-thumbnails");
  add_theme_support('title-tag');
  add_theme_support('editor-styles');
  add_theme_support('custom-logo');
  add_theme_support('automatic-feed-links');
  set_post_thumbnail_size('100%', '100%', false);
  add_theme_support('responsive-embeds');
  add_theme_support('custom-background');
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation', 'hamburger'),
    'category_nav' => esc_html__('category navigation', 'hamburger'),
  ));
  add_editor_style();
}
add_action('after_setup_theme', 'themrishvite_theme_support');

function cors_http_header()
{
  header("Access-Control-Allow-Origin: *");
}
add_action('send_headers', 'cors_http_header');
function add_files()
{
  //外部読み込みファイル
  wp_enqueue_style('google-fonts-pre', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //Google Fonts
  wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap', array(), '');
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

add_action('wp_enqueue_scripts', function () {
  if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {
    //develop mode
    function vite_head_module_hook()
    {
      echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
    }
    add_action('wp_footer', 'vite_head_module_hook');
  } else {
    // production mode, 'npm run build' must be executed in order to generate assets

    // read manifest.json to figure out what to enqueue
    $manifest = json_decode(file_get_contents(DIST_PATH . '/manifest.json'), true);

    // is ok
    if (is_array($manifest)) {

      // get first key, by default is 'main.js'
      $manifest_key = array_keys($manifest);
      if (isset($manifest_key[0])) {
        // enqueue CSS files
        foreach (@$manifest["main.css"] as $css_file) {
          wp_enqueue_style('main', DIST_URI . '/' . $css_file);
        }
        // enqueue main JS file
        $js_file = @$manifest["main.js"]['file'];
        if (!empty($js_file)) {
          wp_enqueue_script('main', DIST_URI . '/' . $js_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER);
        }
      }
    }
  }
});

//カテゴリー説明文でHTMLタグを使う
remove_filter('pre_term_description', 'wp_filter_kses');

$args = array(
  'width'         => 980,
  'height'        => 60,
  'default-image' => get_template_directory_uri() . 'assets/images/main-visual.svg',
  'uploads'       => true,
);
add_theme_support('custom-header', $args);


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

// searchは5件表示する.archiveは3件表示する

function custom_post_limits($query)
{
  if (!is_admin() && $query->is_main_query()) {
    if ($query->is_search) { // 検索ページの表示件数を設定
      $query->set('posts_per_page', 5);
    } elseif ($query->is_archive) { // アーカイブページの表示件数を設定
      $taxonomies = get_taxonomies(); // 全てのタクソノミーを取得
      $custom_taxonomies = array('news-category', 'news-tags'); // カスタムタクソノミーのスラッグを指定

      $matched_taxonomy = array_intersect($custom_taxonomies, $taxonomies);
      if (!empty($matched_taxonomy)) { // カスタムタクソノミーが存在する場合
        foreach ($matched_taxonomy as $taxonomy) {
          if (is_tax($taxonomy)) { // カスタムタクソノミーのアーカイブページの表示件数を設定
            $query->set('posts_per_page', 7);
          }
        }
      } else { // タクソノミーが存在しない場合
        $query->set('posts_per_page', 3); // デフォルトの表示件数を設定
      }
    }
  }
}
add_action('pre_get_posts', 'custom_post_limits');
//検索結果から固定ページを除外
function SearchFilter($query)
{
  if (!is_admin() && $query->is_main_query() && $query->is_search()) {
    $query->set('post_type', array('post', 'customtemplate', 'news'));
  }
}
add_action('pre_get_posts', 'SearchFilter');

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

function gutenberg_support_setup()
{

  //Gutenberg用スタイルの読み込み
  add_theme_support('wp-block-styles');

  //「幅広」と「全幅」に対応
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'gutenberg_support_setup');


/**
 * <head>〜</head>内にAdobe Fonts Scriptを挿入する
 **/
add_action(
  'wp_head',
  function () { ?>
  <script>
    (function(d) {
      var config = {
          kitId: 'vap4wrz',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>

<?php }
);

/*
* カスタムフィールド
*/
function add_recommendation_fields()
{
  add_meta_box(
    'recommendation_setting', //カスタムフィールドブロックに割り当てるID名
    'おすすめ情報', //カスタムフィールドのタイトル
    'insert_recommendation_fields', //入力エリアの HTML
    'post', //投稿タイプ。サンプルでは カスタムタクソノミー名。他に post 等が指定可能
    'normal' //カスタムフィールドが表示される部分
  );
}
add_action('admin_menu', 'add_recommendation_fields');

//入力エリア
function insert_recommendation_fields()
{
  global $post;
  echo 'リンクタイトル： <input type="text" name="recommendation_link_title" value="' . get_post_meta($post->ID, 'recommendation_link_title', true) . '" size="50" style="margin-bottom: 10px;" />　<br>';
  echo 'リンク： <input type="text" name="recommendation_link" value="' . get_post_meta($post->ID, 'recommendation_link', true) . '" size="50" style="margin-bottom: 10px;" />　<br>';
}

//カスタムフィールドの値を保存
function save_custom_fields($post_id)
{

  if (!empty($_POST['recommendation_link_title'])) {
    update_post_meta($post_id, 'recommendation_link_title', $_POST['recommendation_link_title']);
  } else {
    delete_post_meta($post_id, 'recommendation_link_title');
  }
  if (!empty($_POST['recommendation_link'])) {
    update_post_meta($post_id, 'recommendation_link', $_POST['recommendation_link']);
  } else {
    delete_post_meta($post_id, 'recommendation_link');
  }
}
add_action('save_post', 'save_custom_fields');

/*
カスタム投稿
*/

function custom_post_type()
{

  $labels0 = array(
    'name'               => __('news', 'Hamburger'),
    'singular_name'      => __('news', 'Hamburger'),
    'menu_name'          => __('news', 'admin menu', 'Hamburger'),
    'name_admin_bar'     => __('news', 'add new on admin bar', 'Hamburger'),
    'add_new'            => __('新規追加', 'Hamburger'),
    'add_new_item'       => __('新しいお知らせを追加'),
    'new_item'           => __('新しいお知らせ', 'Hamburger'),
    'edit_item'          => __('お知らせを編集', 'Hamburger'),
    'view_item'          => __('お知らせを表示', 'Hamburger'),
    'all_items'          => __('全てのお知らせ', 'Hamburger'),
    'search_items'       => __('お知らせを検索', 'Hamburger'),
    'not_found'          => __('お知らせが見つかりません', 'Hamburger'),
    'not_found_in_trash' => __('ゴミ箱にお知らせが見つかりません', 'Hamburger'),
  );

  $args = array(
    'labels'             => $labels0,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'news'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'tags'),
    'taxonomies'         => array('news-category', 'news-post_tag'),
  );

  register_post_type('news', $args);
}
add_action('init', 'custom_post_type');


function custom_taxonomy()
{

  // タクソノミー1
  $labels1 = array(
    'name'              => __('カテゴリー'),
    'singular_name'     => __('news-category'),
    'search_items'      => __('カテゴリーを検索'),
    'all_items'         => __('すべてのカテゴリー'),
    'parent_item'       => __('カテゴリー'),
    'parent_item_colon' => __('カテゴリー:'),
    'edit_item'         => __('カテゴリーを編集'),
    'update_item'       => __('カテゴリーを更新'),
    'add_new_item'      => __('新しいカテゴリーを追加'),
    'new_item_name'     => __('新しいカテゴリー名'),
    'menu_name'         => __('カテゴリー'),
  );

  $args1 = array(
    'hierarchical'      => true,
    'labels'            => $labels1,
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud'     => true,
  );

  register_taxonomy('news-category', array('news'), $args1);

  // タクソノミー2
  // （タグのような）階層のないカスタム分類を新たに追加
  $labels = array(
    'name'                       => _x('タグ', 'taxonomy general name'),
    'singular_name'              => _x('news-tags', 'taxonomy singular name'),
    'search_items'               => __('タグを更新'),
    'all_items'                  => __('All タグ'),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __('タグを編集'),
    'update_item'                => __('タグを更新'),
    'add_new_item'               => __('新しいタグを追加'),
    'new_item_name'              => __('新しいタグ名'),
    'not_found'                  => __('タグが見つかりません'),
    'menu_name'                  => __('タグ'),
  );

  $args2 = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
  );
  register_taxonomy('news-tags', array('news'), $args2);
}
add_action('init', 'custom_taxonomy');

function load_custom_post_type_archive_template()
{
  if (is_tax('news-category')) {
    include(get_stylesheet_directory() . '/archive-news.php');
    exit;
  }
  if (is_tax('news-tags')) {
    include(get_stylesheet_directory() . '/archive-news.php');
    exit;
  }
}
add_action('template_redirect', 'load_custom_post_type_archive_template');
