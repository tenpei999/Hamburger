<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tsuruのデモサイトです。飲食店の事業者様の参考になるサイトに仕上がっております。">
  <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php wp_body_open(); ?>
  <div class="l-global-container">
    <div class="l-container">
      <header class="l-header p-header c-background-color--bisque">

        <div class="l-header__wrapper">
          <button class="p-hamburger p-gmenu--btn js-hamburger">
           <p class="c-menu-icon">Menu</p>
          </button>
          <div class="p-header__site-title">
            <a href="<?php echo esc_url(home_url('/'));?>"class="c-title-block--roboto"><?php bloginfo('name');?></a>
            <!-- <p class="site-description"><?php bloginfo('description'); ?></p>            -->
            <!-- サイトのキャッチフレーズ -->
          </div>
        </div>

        <?php get_search_form(); ?>

        <!-- p-header-wrapper -->
      <span class="p-gmenu--fead"></span>

      </header>