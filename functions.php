<?php
function add_files() {
  //font-awesome
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  //リセットcss
  wp_enqueue_style('reset-style', 'https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css');
  //Google Fonts
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //メインのcssファイル
  wp_enqueue_style('main-style', get_stylesheet_uri());  
}
add_action('wp_enqueue_scripts', 'add_files');

function theme_setup() {
  // titleタグ
  add_theme_support('title-tag');

}
add_action('after_setup_theme', 'theme_setup');