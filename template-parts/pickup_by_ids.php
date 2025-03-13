<!-- pickup -->
<div id="pickup">
  <div class="inner">

    <div class="pickup-items">

      <?php $pickup_ids = array(124, 92, 93) ?>
      <?php $pickup_query = new WP_Query(
        array(
          'post_type' => 'post',
          'post__in' => $pickup_ids,
          'posts_per_page' => 3,
        )
      ); ?>
      <?php if ($pickup_query->have_posts()): ?>
        <?php while ($pickup_query->have_posts()): ?>
          <?php $pickup_query->the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="pickup-item">
            <div class="pickup-item-img">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
              <?php endif; ?>
              <div class="pickup-item-tag"><?php my_the_post_category(); ?></div><!-- /pickup-item-tag -->
            </div><!-- /pickup-item-img -->
            <div class="pickup-item-body">
              <h2 class="pickup-item-title"><?php the_title(); ?></h2><!-- /pickup-item-title -->
            </div><!-- /pickup-item-body -->
          </a><!-- /pickup-item -->

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); //サブクエリの投稿データをリセットし、グローバルな投稿データに戻す 
      ?>

    </div><!-- /pickup-items -->

  </div><!-- /inner -->
</div><!-- /pickup -->