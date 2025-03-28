<?php

function my_setup()
{
  add_theme_support("post-thumbnails");
  add_theme_support("automatic-feed-links");
  add_theme_support("title-tag");
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
};
add_action('after_setup_theme', 'my_setup');


function my_script_init()
{
  wp_enqueue_style('font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css", array(), "5.8.2", "all");
  wp_enqueue_style("my-style", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
  wp_enqueue_script("my-script", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
  if (is_single()) {
    wp_enqueue_script("sns-script", get_template_directory_uri() . "/js/sns.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
  };
};
add_action('wp_enqueue_scripts', 'my_script_init');


function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'footer' => 'フッターメニュー',
    )
  );
};
add_action('init', 'my_menu_init');
function my_widget_init()
{
  register_sidebar(
    array(
      'name' => 'サイドバー',
      'id' => 'sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title">',
      'after_title' => '</div>',
    )
  );
}
add_action('widgets_init', 'my_widget_init');


/**
 * アーカイブタイトル書き換え
 */
function my_archive_title($title)
{

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');

/* 
*  カテゴリー名を取得する関数
*/
function my_the_post_category($anchor = false)
{
  $category = get_the_category();
  if ($category[0]) {
    if ($anchor) {
      echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
    } else {
      echo $category[0]->cat_name;
    }
  }
}

/* 
*  タグ名を取得する関数
*/
function my_the_tags()
{
  $post_tags = get_the_tags(); //このポストが持つすべてのタグを取得 
  if ($post_tags) { //タグが存在するなら表示させる処理に入る 
    foreach ($post_tags as $tag) { //持っているタグの数だけループさせる 
      if ($tag->name === 'pickup') { //pickupタグがある場合は処理をスキップ
        continue;
      }
      echo '<div class="entry-tag-item"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name  . '</a></div>';
    }
  }
}

/**
 * 検索クエリをカスタマイズして、「投稿 (post) のみ」を検索対象にする
 *
 * @param string   $search   検索用の WHERE 句（SQLの一部）
 * @param WP_Query $wp_query 現在の検索クエリ情報を持つ WP_Query オブジェクト
 * @return string  変更後の検索SQLの WHERE 句
 */
function my_posts_search($search, $wp_query)
{
  // 検索クエリ（is_search()）かつ、メインクエリ（is_main_query()）で、管理画面ではない場合に実行
  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {
    // 現在の検索条件 ($search) に「投稿（post）のみを対象にする」条件を追加
    $search .= " AND post_type = 'post' ";
  }
  return $search; // 変更後の検索クエリを返す
}
// WordPress の検索 SQL をカスタマイズするフィルターを登録
// - 'posts_search' → 検索の WHERE 句を変更するフック
// - 'my_posts_search' → 呼び出す関数
// - 10 → 優先度（デフォルト値）
// - 2 → 渡される引数の数（$search, $wp_query の 2 つ）
add_filter('posts_search', 'my_posts_search', 10, 2);


// ショートコード（ボタン）
function my_contact_btn_shortcode($atts, $content = '')
{
  return '<div class="entry-btn"><a class="btn" href="' . $atts['link'] . '">' . $content . '</a></div>';
}
add_shortcode('btn', 'my_contact_btn_shortcode');


// ショートコード（検索フォーム）
function my_search_form_shortcode($atts, $content = '')
{
  return get_search_form(false); //文字列を返す
}
add_shortcode('search-form', 'my_search_form_shortcode');
