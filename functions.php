<?php
function add_files() {
//外部読み込みファイル

  //font-awesome
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  //リセットcss
  wp_enqueue_style('reset-style', 'https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css');
  //preconnect デフォルト
  wp_enqueue_style('google-fonts-pre', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //Google Fonts
  wp_enqueue_style('google-fonts-pre2', 'https://fonts.googleapis.com');
  //Google Fonts
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //メインのcssファイル
  wp_enqueue_style('main-style', get_stylesheet_uri());
  // main.js
  wp_enqueue_script('main-script', 'main.js', '', '1.0', true );
}
add_action('wp_enqueue_scripts', 'add_files');

// アクションフックの有効化
function theme_setup() {

  // メニュー
  add_theme_support('menus');
  // titleタグ
  add_theme_support('title-tag');

  // タイトル出力
  function Hamburger_title($title) {
    if (is_front_page() && is_home()) { //トップページなら
      $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) { //シングルページなら
      $title = single_post_title('', false);
    }
      return $title;
    }
  add_filter('pre_get_document_title', 'Hamburger_title');

}
add_action('after_setup_theme', 'theme_setup');

function add_register_nav_menu() {
  register_nav_menu( 'menu', 'メニュー');
}
add_action( 'after_setup_theme', 'add_register_nav_menu' );