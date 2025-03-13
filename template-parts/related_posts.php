<!-- 関連記事を表示する -->
<?php
$category = get_the_category(); //この記事が持つカテゴリーを取得
$cat_ids = array(); //カテゴリーIDを格納する配列を初期化
foreach ($category as $cat) { //カテゴリーの数だけループさせる
  $cat_ids = $cat->term_id; //カテゴリーIDを配列に格納
}
?>
<?php
$args = array( //関連記事を8件取得する設定
  'post_type' => 'post', // 投稿タイプが投稿の場合
  'posts_per_page' => 8, // 8件取得
  'post__not_in' => array(get_the_ID()), // この記事を除外
  'category__in' => $cat_ids, // この記事が持つカテゴリーIDを含む記事を取得
  'orderby' => 'rand', // ランダムに記事を取得
);
$related_posts = get_posts($args); //関連記事を取得（サブクエリ
?>
<?php if ($related_posts): //関連記事がある場合 
?>
  <div class="entry-related">
    <div class="related-title">関連記事</div>

    <div class="related-items">
      <?php foreach ($related_posts as $post): setup_postdata($post) //関連記事データをポストデータとして使う設定 
      ?>

        <a class="related-item" href="<?php the_permalink(); ?>">
          <div class="related-item-img">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
            <?php endif; ?>
          </div><!-- /related-item-img -->
          <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
        </a><!-- /related-item -->

      <?php endforeach; ?>
      <?php wp_reset_postdata(); //関連記事データをポストデータとして使う設定をリセット 
      ?>

    </div><!-- /related-items -->
  </div><!-- /entry-related -->

<?php endif; ?><!-- /関連記事を表示する -->