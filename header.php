<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tsuruのデモサイトです。飲食店の事業者様の参考になるサイトに仕上がっております。">
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.png')); ?>">
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
  <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
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

                 <!-- <?php wp_nav_menu(); ?> -->
           <!-- <?php 
            wp_nav_menu( array( 
              'theme_location' => 'header-menu' 
               ) ); 
              ?> -->