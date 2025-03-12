<?php get_header(); ?>

<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <!-- breadcrumb -->
      <?php if (function_exists('bcn_display')): //BreadcrumbNavXTプラグインが入っているときだけ表示する 
      ?>
        <!-- breadcrumb -->
        <div class="breadcrumb">
          <?php bcn_display(); // BreadcrumbNavXTのパンくずリストを表示するための記述 
          ?>
        </div><!-- /breadcrumb -->
      <?php endif; ?><!-- /breadcrumb -->

      <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
          <?php the_post(); ?>

          <!-- entry -->
          <article class="entry">

            <!-- entry-header -->
            <div class="entry-header">
              <?php
              $category = get_the_category();
              if ($category[0]): ?>
                <div class="entry-label"><a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->cat_name; ?></a></div><!-- /entry-item-tag -->
              <?php endif; ?>
              <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

              <!-- entry-meta -->
              <div class="entry-meta">
                <time class="entry-published" datetime="<?php the_time("c"); ?>">公開日 <?php the_time("Y/n/j"); ?></time>
                <?php if (get_the_modified_time("c") != get_the_time("c")): ?>
                  <time class="entry-updated" datetime="<?php the_modified_time("c"); ?>">最終更新日 <?php the_modified_time("Y/n/j"); ?></time>
                <?php endif; ?>
              </div><!-- /entry-meta -->

              <!-- entry-img -->
              <div class="entry-img">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                <?php endif; ?>
              </div><!-- /entry-img -->

            </div><!-- /entry-header -->

            <!-- entry-body -->
            <div class="entry-body">
              <?php the_content(); ?>
              <?php wp_link_pages(
                array(
                  'before' => '<nav class="entry-links">',
                  'after' => '</nav>',
                  'link_before' => '',
                  'link_after' => '',
                  'next_of_number' => 'number',
                  'separator' => '',
                )
              ); ?>
            </div><!-- /entry-body -->


            <div class="entry-tag-items">
              <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
              <div class="entry-tag-item"><a href="">WordPress</a></div><!-- /entry-tag-item -->
              <div class="entry-tag-item"><a href="">コーディング</a></div><!-- /entry-tag-item -->
              <div class="entry-tag-item"><a href="">フリーランス</a></div><!-- /entry-tag-item -->
            </div><!-- /entry-tag-items -->


            <div class="entry-related">
              <div class="related-title">関連記事</div>

              <div class="related-items">

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

              </div><!-- /related-items -->
            </div><!-- /entry-related -->

          </article> <!-- /entry -->

        <?php endwhile; ?>
      <?php endif; ?>

    </main><!-- /primary -->

    <?php get_sidebar(); ?>

  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>