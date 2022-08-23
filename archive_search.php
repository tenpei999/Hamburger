<?php get_header();?>
      <main class="l-main">
        <div class="c-background-image--shadow p-main-visual">
          <div class="c-text--M-white">
            <h1>
              Search:
            </h1>
            <p>
              チーズバーガー
            </p>
          </div>
        </div>
        <!-- main-visual-->

        <div class="l-contents_pages p-contents_pages c-background-color--base-white">
          <div class="c-contents_pages">
            <h2 class="c-contents_pages__title">
              小見出しが入ります
            </h2>
            <p class="c-contents_pages__text">
              テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            </p>
          </div>
         
          <?php get_template_part("components/archive"); ?>

          <nav class="p-pagination">
            <ul class="c-pagination">
              <li>
                <p>page 1/10</p>
              </li>
              <li class="c-pagination--prev">
                <a href="#">
                  <img src="img/prev.png" alt="前へ">
                  <p>前へ</p>
                </a>
              </li>
              <li class="c-pagination--no this">
                <a href="#">1</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">2</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">3</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">4</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">5</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">6</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">7</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">8</a>
              </li>
              <li class="c-pagination--no">
                <a href="#">9</a>
              </li>
              <li class="c-pagination--next">
                <a href="#"> 
                  <img src="img/next.png" alt="次へ">
                  <p>次へ</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- pages -->

      </main>

    </div>
    <!-- container -->

<?php get_sidebar();?>

    <?php get_footer();?>
