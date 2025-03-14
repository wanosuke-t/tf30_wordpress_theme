			<!-- secondary -->
			<aside id="secondary">

				<!-- widget -->
				<div class="widget widget_text widget_custom_html">
					<div class="widget-title">プロフィール</div>

					<div class="wprofile">
						<div class="wprofile-img"><img src="<?php echo get_template_directory_uri(); ?>/img/profile.png" alt=""></div>
						<div class="wprofile-content">
							<p>
								テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
							</p>
						</div>
						<!-- /wprofile-content -->
						<nav class="wprofile-sns">
							<div class="wprofile-sns-item m_twitter"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-twitter"></i></a></div>
							<div class="wprofile-sns-item m_facebook"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-facebook-f"></i></a></div>
							<div class="wprofile-sns-item m_instagram"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-instagram"></i></a></div>
						</nav>
					</div><!-- /wprofile -->
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_search">
					<div class="widget-title">検索</div>
					<?php get_search_form(); ?>
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_popular">
					<div class="widget-title">人気記事</div>

					<?php
					if (function_exists('wpp_get_mostpopular')) {
						wpp_get_mostpopular(array(
							'limit' => 5,
							'order_by' => 'views',
							'post_type' => 'post',
							'range' => 'last24hours',
							'thumbnail_width' => 680,
							'thumbnail_height' => 400,
							'stats_views' => 0,
							'wpp_start' => '<div class="wpost-items m_ranking">',
							'wpp_end' => '</div>',
							'post_html' => '<div class="wpost-item">
																<div class="wpost-item-img">{thumb}</div>
																<div class="wpost-item-body">
																	<div class="wpost-item-title">{title}</div>
																</div>
															</div>',
						));
					}
					?>

				</div><!-- /widget -->

				<!-- widget -->
				<div class="widget widget_recent">
					<div class="widget-title">新着記事</div>

					<div class="wpost-items">

						<?php $latest_query = new WP_Query(
							array(
								'post_type' => 'post',
								'orderby' => 'date', //日付順で取得
								'order' => 'DESC', //降順で取得
								'posts_per_page' => 5, //取得件数
							)
						); ?>
						<?php if ($latest_query->have_posts()): ?>
							<?php while ($latest_query->have_posts()): ?>
								<?php $latest_query->the_post(); ?>

								<!-- wpost-item -->
								<a class="wpost-item" href="<?php the_permalink(); ?>">
									<div class="wpost-item-img">
										<?php if (has_post_thumbnail()): ?>
											<?php the_post_thumbnail(); ?>
										<?php else: ?>
											<img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
										<?php endif; ?>
									</div>
									<div class="wpost-item-body">
										<div class="wpost-item-title"><?php the_title(); ?></div>
									</div><!-- /wpost-item-body -->
								</a><!-- /wpost-item -->

							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); //サブクエリの投稿データをリセットし、グローバルな投稿データに戻す 
						?>

					</div><!-- /wpost-items -->
				</div><!-- /widget -->

				<div class="widget widget_archive">
					<div class="widget-title">アーカイブ</div>
					<ul>
						<?php wp_get_archives(); ?>
					</ul>
				</div><!-- /widget -->

			</aside><!-- secondary -->