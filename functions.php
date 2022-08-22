<?php
function add_files() {
//外部読み込みファイル

  //font-awesome
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  //リセットcss
  wp_enqueue_style('reset-style', get_theme_file_uri('https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css'), array(), $theme_version);
  //preconnect デフォルト
  wp_enqueue_style('google-fonts-pre', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap');
  //Google Fonts
  wp_enqueue_style('google-fonts-pre2', 'https://fonts.googleapis.com');
  //Google Fonts
  wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Roboto:wght@400;700&display=swap', array(), '');
  //メインのcssファイル
  wp_enqueue_style('rtbread', get_stylesheet_uri(), array(), $theme_version);
  // main.js
  wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', '', '', true);
  wp_enqueue_script('bundle', get_theme_file_uri('/js/bundle.js'), 'jquery', $theme_version, true );
}
add_action('wp_enqueue_scripts', 'add_files', 'readScript');
// add_action('wp_enqueue_scripts', 'add_files');


// カスタム投稿
add_action('init', 'codex_book_init');

function codex_book_init() {
  $labels = array(
    'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
  );

  $args = array (
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'book' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    
  );
  register_post_type('book', $args);
}


function register_my_menu() {
  register_nav_menu('header-menu', ( 'ヘッダーメニュー' ));
  register_nav_menu('sidebar-menu', ( 'サイドバーメニュー' ));
  register_nav_menu('drawer-menu', ( 'ドロワーバーメニュー' ));
  register_nav_menu('slide-menu', ( 'スライドメニュー' ));
}
add_action( 'init', 'register_my_menu' );

// nav_menuの追加
// function register_my_menu() {
//   register_nav_menu('header-menu', ( 'ヘッダーメニュー' ));
//   register_nav_menu('sidebar-menu', ( 'サイドバーメニュー' ));
//   register_nav_menu('drawer-menu', ( 'ドロワーバーメニュー' ));
//   register_nav_menu('slide-menu', ( 'スライドメニュー' ));
// }
// add_action( 'init', 'register_my_menu' );


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

//タクソノミー
add_action('init', 'create_book_taxonomies',0);

function create_book_taxonomies() {
  $labels = array (
    'name'              => _x( 'Genres', 'taxonomy general name' ),
    'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Genres' ),
    'all_items'         => __( 'All Genres' ),
    'parent_item'       => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item'         => __( 'Edit Genre' ),
    'update_item'       => __( 'Update Genre' ),
    'add_new_item'      => __( 'Add New Genre' ),
    'new_item_name'     => __( 'New Genre Name' ),
    'menu_name'         => __( 'Genre' ),
  );
  $args = array (
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'genre' ),
  );
  register_taxonomy('genre', array('book'), $args);

          // （タグのような）階層のないカスタム分類を新たに追加
          $labels = array(
            'name'                       => _x( 'Writers', 'taxonomy general name' ),
            'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
            'search_items'               => __( 'Search Writers' ),
            'popular_items'              => __( 'Popular Writers' ),
            'all_items'                  => __( 'All Writers' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Writer' ),
            'update_item'                => __( 'Update Writer' ),
            'add_new_item'               => __( 'Add New Writer' ),
            'new_item_name'              => __( 'New Writer Name' ),
            'separate_items_with_commas' => __( 'Separate writers with commas' ),
            'add_or_remove_items'        => __( 'Add or remove writers' ),
            'choose_from_most_used'      => __( 'Choose from the most used writers' ),
            'not_found'                  => __( 'No writers found.' ),
            'menu_name'                  => __( 'Writers' ),
        );

        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'writer' ),
        );

        register_taxonomy( 'writer', 'book', $args );
}


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

// 画像サイズ
add_image_size( $name, $width, $height, $crop ); 