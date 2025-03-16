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
    <?php get_template_part('/template-parts/breadcrumb'); ?>
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
        // 'genre' というカスタムタクソノミーのタームを取得する
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

        <?php if (have_posts()): ?>
          <?php while (have_posts()): ?>
            <?php the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="entry-item entry-item-horizontal">
              <div class="entry-item-img">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                <?php endif; ?>
              </div>
              <div class="entry-item-body">
                <div class="entry-item-meta">
                  <?php $the_terms = get_the_terms(get_the_ID(), 'genre');
                  if (!empty($the_terms)): ?>
                    <div class="entry-item-tag"><?php echo $the_terms[0]->name; ?></div>
                  <?php endif; ?>
                </div>
                <div class="entry-item-title"><?php the_title(); ?></div>
                <div class="entry-item-excerpt"><?php echo mb_substr(post_custom('overview'), 0, 40); ?></div>
              </div><!-- /entry-item-body -->
            </a><!-- /entry-item -->

          <?php endwhile; ?>
        <?php endif; ?>

      </div><!-- /entries -->

      <?php get_template_part('/template-parts/pagination'); ?>

    </main><!-- /primary -->

  </div><!-- /.inner -->
</div><!-- /.content -->


<?php get_footer(); ?>