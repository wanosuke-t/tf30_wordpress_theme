<?php get_header(); ?>

<!-- main-visual -->
<div class="mainvisual">
  <div class="inner">
    <div class="mainvisual-content">
      <div class="mainvisual-title">制作実績</div>
    </div>
  </div><!-- /inner -->
</div><!-- /main-visual -->

<div class="work-breadcrumb">
  <div class="inner">

    <!-- breadcrumb -->
    <?php if (function_exists('bcn_display')): //BreadcrumbNavXTプラグインが入っているときだけ表示する 
    ?>
      <!-- breadcrumb -->
      <div class="breadcrumb">
        <?php bcn_display(); // BreadcrumbNavXTのパンくずリストを表示するための記述 
        ?>
      </div><!-- /breadcrumb -->
    <?php endif; ?><!-- /breadcrumb -->

  </div><!-- /inner -->
</div><!-- /work-breadcrumb -->


<!-- content -->
<div id="content" class="content-work">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
          <?php the_post(); ?>

          <!-- entry -->
          <article class="entry entry-work">

            <!-- entry-header -->
            <div class="entry-header">
              <div class="entry-label"><a href="">Webサイト制作</a></div>
              <h1 class="entry-title"><?php the_title(); ?></h1>

              <div class="entry-img">
                <img src="img/entry10.png" alt="">
              </div>
            </div><!-- /entry-header -->

            <div class="entry-work-body">
              <?php the_content(); ?>
              <div class="entry-work-content">
                カスタム投稿、カスタムタクソノミーでサイト構造の整理を行い、カスタムフィールドの活用によって、お客様にとっても操作性の高い管理画面の設計を行っています。
              </div>
              <div class="entry-work-table">
                <table>
                  <tr>
                    <th>会社名</th>
                    <td>〇〇株式会社</td>
                  </tr>
                  <tr>
                    <th>サイトURL</th>
                    <td>https://example.com</td>
                  </tr>
                  <tr>
                    <th>担当範囲</th>
                    <td>デザイン、コーディング</td>
                  </tr>
                </table>
              </div><!-- /entry-work-table -->
            </div><!-- /entry-work-body" -->

            <div class="entry-work-btn">
              <a class="btn" href="">一覧に戻る</a>
            </div><!-- /entry-work-btn -->
          </article><!-- /entry -->

        <?php endwhile; ?>
      <?php endif; ?>

    </main><!-- /primary -->

  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>