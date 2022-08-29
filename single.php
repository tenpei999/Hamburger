<?php get_header();?>
  
      <main class="l-main">

                 <div class="c-background-image p-main-visual single">
                 <h1 class="c-text--M-white">
                   <?php the_title(); ?>
                 </h1>
               </div>
               <!-- main-visual-->
        <?php if (have_posts()): while(have_posts()): the_post(); ?>  
        <div class="l-contents_pages p-contents_pages c-background-color--base-white">
          <div class="p-single c-contents_pages">
            <?php the_content(); ?>
            <div class="p-flex-photos">
              <img src="img/flex-photo.svg" alt="ハンバーガーの写真" class="p-flex-photos__first">
              <div class="c-flex-item">
                <div class="c-flex-item__img">
                  <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                </div>
                <span></span>
                <p class="c-flex-item__text">
                  　テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                </p>
              </div>
              <div class="c-flex-item">
                <div class="c-flex-item__img">
                  <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                 </div>
                <span></span>
                <p class="c-flex-item__text">
                  　テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                </p>
              </div>
            </div>
            <div class="p-grid-photo">
              <div class="p-grid-photo__first c-flex-item__img">
                <img src="img/flex-item.svg" alt="ハンバーガーの写真">
              </div>
              <div class="l-grid-photo-wrapper">
                <ul class="c-grid-photo">
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                  <li>
                    <img src="img/flex-item.svg" alt="ハンバーガーの写真">
                  </li>
                </ul>
              </div>
            </div>
            <div class="c-block-verse">
              <div class="c-block-verse__ol">
                <ol class="c-block-verse__ol--child">
                  <li>リストリストリスト</li>
                  <li>リストリストリスト</li>
                </ol>
                <ol class="c-block-verse__ol--child">
                  <li>リストリストリスト2</li>
                  <li>リストリストリスト2</li>
                </ol>
                <ol class="c-block-verse__ol--child">
                  <li>リストリストリスト</li>
                  <li>リストリストリスト</li>
                </ol>
              </div>

              <div class="c-block-verse__ul">
                <ul class="c-block-verse__ul--child">
                  <li>リストリストリスト</li>
                  <li>リストリストリスト</li>
                </ul>
                <ul class="c-block-verse__ul--child">
                  <li>リストリストリスト2</li>
                  <li>リストリストリスト2</li>
                </ul>
                <ul class="c-block-verse__ul--child">
                  <li>リストリストリスト</li>
                  <li>リストリストリスト</li>
                </ul>
              </div>
            </div>

            <pre class="c-sauce">
              <code>

          &lt;html&gt;
                  &lt;head&gt;
                  &lt;/head&gt;
                  &lt;body&gt;
                  &lt;body&gt;
          &lt;/html&gt;
              </code>          
            </pre>
            <!-- 触らないこと -->

            <table class="c-table">
              <tr>
                <td>テーブル</td>
                <td>テーブル</td>
              </tr>
              <tr>
                <td>テーブル</td>
                <td>テーブル</td>
              </tr>
              <tr>
                <td>テーブル</td>
                <td>テーブル</td>
              </tr>
              <tr>
                <td>テーブル</td>
                <td>テーブル</td>
              </tr>
            </table>

            <div class="p-btn">
              <button class="c-btn">
                <p>ボタン</p>
              </button>
            </div>

            <div class="p-bold">
              <p>boldboldboldboldboldboldbold</p>
            </div>

          </div>

        </div>

        <!-- contents wrapper-->

      </main>

    </div>
    <!-- container -->
    <?php endwhile; else : ?>
      <p>記事はありません。</p>
    <?php endif; ?>
<?php get_sidebar();?>

    <?php get_footer();?>