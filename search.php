<?php get_header(); ?>

<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <?php get_template_part('/template-parts/breadcrumb'); ?>

      <div class="archive-head">
        <div class="archive-lead">SEARCH</div>
        <h1 class="archive-title m_search"><span>"<?php the_search_query(); ?>"</span>の検索結果：<?php echo $wp_query->found_posts; ?>件</h1><!-- /archive-title -->
      </div><!-- /archive-head -->

      <!-- entries -->
      <div class="entries m_horizontal">

        <?php if (have_posts()): ?>
          <?php while (have_posts()): ?>
            <?php the_post(); ?>

            <!-- entry-item -->
            <a href="<?php the_permalink(); ?>" class="entry-item">
              <!-- entry-item-img -->
              <div class="entry-item-img">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                <?php endif; ?>
              </div><!-- /entry-item-img -->

              <!-- entry-item-body -->
              <div class="entry-item-body">
                <div class="entry-item-meta">
                  <?php
                  $category = get_the_category();
                  if ($category[0]): ?>
                    <div class="entry-item-tag"><?php echo $category[0]->cat_name; ?></div><!-- /entry-item-tag -->
                  <?php endif; ?>
                  <time class="entry-item-published" datetime="<?php the_time("c"); ?>"><?php the_time("Y/n/j"); ?></time><!-- /entry-item-published -->
                </div><!-- /entry-item-meta -->
                <h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
                <div class="entry-item-excerpt">
                  <p><?php the_excerpt(); ?></p>
                </div><!-- /entry-item-excerpt -->
              </div><!-- /entry-item-body -->
            </a><!-- /entry-item -->

          <?php endwhile; ?>
        <?php endif; ?>

      </div><!-- /entries -->

      <?php get_template_part('/template-parts/pagination'); ?>

    </main><!-- /primary -->

    <!-- secondary -->
    <?php get_sidebar(); ?>

  </div><!-- /inner -->
</div><!-- /content -->
<?php get_footer(); ?>