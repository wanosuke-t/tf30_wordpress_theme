<?php get_header(); ?>

<!-- main-visual -->
<div class="mainvisual">
  <div class="inner">
    <div class="mainvisual-content">
      <div class="mainvisual-title"><?php the_archive_title(); ?></div>
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
    <?php endif; ?>
  </div><!-- /inner -->
</div><!-- /work-breadcrumb -->


<!-- content -->
<div id="content" class="content-work">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <div class="genre-nav">
        <div class="genre-nav-link"><a class="is-active" href="<?php echo get_post_type_archive_link('work'); ?>">すべて</a></div>
        <?php
        // 'genre' というカスタムタクソノミーのターム（カテゴリのようなもの）を取得する
        $genre_terms = get_terms('genre', array(
          'hide_empty' => false // 投稿が紐づいていないタームも取得する
        ));

        // 取得したタームが存在するかチェック
        if (!empty($genre_terms) && !is_wp_error($genre_terms)): ?>
          <?php foreach ($genre_terms as $term): ?>
            <div class="genre-nav-link"><a href="<?php echo get_term_link($term, 'genre'); ?>"><?php echo $term->name; ?></a></div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div><!-- /genre-nav -->

      <!-- entries -->
      <div class="entries entries-work">

        <?php $args = array(
          'posts_per_page' => 9, // 取得する投稿数を指定
        );
        $custom_query = new WP_Query($args);
        ?>
        <?php if ($custom_query->have_posts()): ?>
          <?php while ($custom_query->have_posts()): ?>
            <?php $custom_query->the_post(); ?>


            <a href="" class="entry-item entry-item-horizontal">
              <div class="entry-item-img">
                <img src="img/entry1.png" alt="">
              </div>
              <div class="entry-item-body">
                <div class="entry-item-meta">
                  <div class="entry-item-tag">Webサイト制作</div>
                </div>
                <div class="entry-item-title">△△ブランドのECサイト構築</div>
                <div class="entry-item-excerpt">抜粋テキストが入ります。抜粋テキストが入ります。抜粋テキストが入ります。抜粋テキストが入ります。</div>
              </div><!-- /entry-item-body -->
            </a><!-- /entry-item -->

          <?php endwhile; ?>
        <?php endif; ?>

      </div><!-- /entries -->

      <?php if (paginate_links()): ?>
        <!-- pagination -->
        <div class="pagination">
          <?php
          echo paginate_links(
            array(
              'end_size' => 1,
              'mid_size' => 1,
              'prev_next' => true,
              'prev_text' => '<i class="fas fa-angle-left"></i>',
              'next_text' => '<i class="fas fa-angle-right"></i>',
            )
          );
          ?>
        </div><!-- /pagination -->
      <?php endif; ?>

    </main><!-- /primary -->

  </div><!-- /.inner -->
</div><!-- /.content -->


<?php get_footer(); ?>