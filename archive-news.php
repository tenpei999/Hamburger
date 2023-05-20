<?php get_header(); ?>

<main class="l-main">
  <section class="c-background-image--shadow p-main-visual">
    <div class="c-text--M-white">
      <h1>News:</h1>
      <P><?php single_cat_title(); ?>
        <?php
        $term = get_queried_object();
        $total_posts = $term->count;
        echo '(' . $total_posts . '件)';
        ?>
      </P>
    </div>
  </section>
  <!-- main-visual-->

  <article class="l-contents_pages p-contents_pages c-background-color--base-white">
    <article class="c-contents_pages">
      <?php
      if (is_tax('news-category')) {
        $term = get_queried_object();
        $description = $term->description;
        if (!empty($description)) {
          echo $description;
        }
      } elseif (is_tax('news-tags')) {
        $term = get_queried_object();
        $description = $term->description;
        if (!empty($description)) {
          echo $description;
        }
      }
      ?>
      <?php
      $args = array('post_type' => 'news', 'no_found_rows'  => true);
      $wp_query = new WP_Query($args);
      ?>
      <ul>
        <?php if ($wp_query->have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part("components/archive-news"); ?>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
      </ul>
    </article>
    <?php wp_link_pages(); ?>
    <?php wp_pagenavi(); ?>
  </article>
  <!-- pages -->

</main>

</div>
<!-- container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>