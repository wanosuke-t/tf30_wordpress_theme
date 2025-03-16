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

    <?php get_template_part('/template-parts/breadcrumb'); ?>

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
              <?php $the_terms = get_the_terms(get_the_ID(), 'genre'); ?>
              <?php if (!empty($the_terms)): ?>
                <div class="entry-label"><a href="<?php echo get_term_link($the_terms[0], 'genre'); ?>"><?php echo $the_terms[0]->name; ?></a></div>
              <?php endif; ?>

              <h1 class="entry-title"><?php the_title(); ?></h1>

              <div class="entry-img">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('full'); ?>
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                <?php endif; ?>
              </div>
            </div><!-- /entry-header -->

            <div class="entry-work-body">
              <div class="entry-work-content">
                <?php echo post_custom('overview'); ?>
              </div>
              <div class="entry-work-table">
                <table>
                  <?php if (post_custom('company')): ?>
                    <tr>
                      <th>会社名</th>
                      <td><?php echo post_custom('company'); ?></td>
                    </tr>
                  <?php endif; ?>

                  <?php if (post_custom('url')): ?>
                    <tr>
                      <th>サイトURL</th>
                      <td><?php echo post_custom('url'); ?></td>
                    </tr>
                  <?php endif; ?>

                  <?php if (post_custom('position')): ?>
                    <tr>
                      <th>担当範囲</th>
                      <td><?php echo post_custom('position'); ?></td>
                    </tr>
                  <?php endif; ?>

                </table>

              </div><!-- /entry-work-table -->
            </div><!-- /entry-work-body" -->

            <div class="entry-work-btn">
              <a class="btn" href="<?php echo get_post_type_archive_link('work'); ?>">一覧に戻る</a>
            </div><!-- /entry-work-btn -->

            <?php
            $related_query = new WP_Query(
              array(
                'post_type' => 'work', // 投稿タイプが「制作実績」
                'posts_per_page' => 3, // 表示件数
                'post__not_in' => array(get_the_ID()), // 現在の投稿を除外
                'orderby' => 'rand', // ランダムに表示
                'tax_query' => array( // タクソノミーパラメータを指定
                  array(
                    'taxonomy' => 'genre',   // カスタムタクソノミーのスラッグ
                    'field'    => 'slug',    // 'terms' に指定する値の種類（'slug' を指定）
                    'terms'    => $the_terms[0]->slug // 現在の投稿の最初のジャンルを取得
                  )
                )
              )
            );
            ?>
            <?php if ($related_query->have_posts()) : ?>
              <div class="entry-work-related">
                <div class="entry-work-related-head">関連記事</div><!-- /.entry-work-related-head -->
                <div class="entries entries-work entry-work-related-entries">
                  <?php while ($related_query->have_posts()) : ?>
                    <?php $related_query->the_post(); ?>

                    <!-- entry-item -->
                    <a href="<?php the_permalink(); ?>" <?php post_class(array('entry-item', 'entry-item-horizontal')); ?>>

                      <!-- entry-item-img -->
                      <div class="entry-item-img">
                        <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail('my_thumbnail');
                        } else {
                          echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                        }
                        ?>
                      </div><!-- /entry-item-img -->

                      <!-- entry-item-body -->
                      <div class="entry-item-body">
                        <div class="entry-item-meta">
                          <?php $the_terms = get_the_terms(get_the_ID(), 'genre');
                          if (!empty($the_terms)): ?>
                            <div class="entry-item-tag"><?php echo $the_terms[0]->name; ?></div>
                          <?php endif; ?>
                        </div><!-- /entry-item-meta -->
                        <h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
                      </div><!-- /entry-item-body -->

                    </a><!-- /entry-item -->

                  <?php endwhile; ?>
                </div><!-- /.entry-work-related -->
              </div><!-- /.entry-work-related-entries -->
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

          </article><!-- /entry -->

        <?php endwhile; ?>
      <?php endif; ?>

    </main><!-- /primary -->

  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>