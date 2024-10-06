<?php
// Template Name:Home
?>
<div id="wrapper">
	<?php get_header(); ?>
	<main class="main">
		<div class="main-container">
			<div class="tags">
				<?php
				$tags = get_tags([
					'number' => 15,
					'orderby' => 'count',
					'order' => 'DESC'
				]);
				if ($tags) {
					echo '<ul>';
					echo '<p class="tags-title">Popular Tags:</p>';
					foreach ($tags as $tag) {
						echo '<li><a href="' . get_tag_link($tag->term_id) . '">' .  "# $tag->name" . '</a></li>';
					}
					echo '</ul>';
				}
				?>
			</div>
			<div class="trending">
				<div class="trending-heading">
					<h5>TRENDING POSTS</h5>
				</div>
				<div class="triangle"></div>
				<?php wp_nav_menu([
					"theme_location" => "trending-menu",
					"container" => "div",
					"container_class" => "trending-menu"
				]); ?>
			</div>
			<div class="last-news">
				<div class="news first-news" style=" background-size: contain; background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');">
					<div class="news-container">
						<?php
						$posts = get_posts(array(
							'numberposts' => 3,
						));
						global $post;
						$post = $posts[0];
						setup_postdata($post);
						?>
						<?php
						$categories = get_the_category($post->ID);
						if (!empty($categories)) {
							echo "<ul class='post-cats'>";
							foreach ($categories as $category) {
								$category_color = get_term_meta($category->term_id, "category_color", true);
								echo "<li class='post-cat' style='background-color:$category_color;'>" . esc_html($category->name) . '</li>';
							}
							echo "</ul>";
						}
						?>
						<a href="<?php the_permalink(); ?>">
							<h3 class="post-title"><?php the_title(); ?></h3>
						</a>
						<div class="author-published">
							<div class="author">
								<?php
								$author_id = get_the_author_meta('ID', $post->ID);
								echo get_avatar($author_id, 25);
								$author_name = get_the_author_meta('display_name', $author_id);
								echo '<span class="author-name">' . esc_html($author_name) . '</span>';
								?>
							</div>
							<div class="published">
								<?php echo get_the_date('', $post->ID); ?>
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
				<div>
					<?php $post = $posts[1];
					setup_postdata($post); ?>
					<div class="news second-news" style="background-size: contain; background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');">
						<div class="news-container">
							<?php
							$categories = get_the_category($post->ID);
							if (!empty($categories)) {
								echo "<ul class='post-cats'>";
								foreach ($categories as $category) {
									$category_color = get_term_meta($category->term_id, "category_color", true);
									echo "<li class='post-cat' style='background-color:$category_color;'>" . esc_html($category->name) . '</li>';
								}
								echo "</ul>";
							}
							?>
							<h4 class="post-title"><?php the_title(); ?></h4>
							<div class="author-published">
								<div class="author">
									<?php
									$author_id = get_the_author_meta('ID', $post->ID);
									echo get_avatar($author_id, 25);
									$author_name = get_the_author_meta('display_name', $author_id);
									echo '<span class="author-name">' . esc_html($author_name) . '</span>';
									?>
								</div>
								<div class="published">
									<?php echo get_the_date('', $post->ID); ?>
								</div>
							</div>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
					<?php $post = $posts[2];
					setup_postdata($post); ?>
					<div class="news third-news" style="background-size: contain; background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');">
						<div class="news-container">
							<?php
							$categories = get_the_category($post->ID);
							if (!empty($categories)) {
								echo "<ul class='post-cats'>";
								foreach ($categories as $category) {
									$category_color = get_term_meta($category->term_id, "category_color", true);
									echo "<li class='post-cat' style='background-color:$category_color;'>" . esc_html($category->name) . '</li>';
								}
								echo "</ul>";
							}
							?>
							<h4 class="post-title"><?php the_title(); ?></h4>
							<div class="author-published">
								<div class="author">
									<?php
									$author_id = get_the_author_meta('ID', $post->ID);
									echo get_avatar($author_id, 25);
									$author_name = get_the_author_meta('display_name', $author_id);
									echo '<span class="author-name">' . esc_html($author_name) . '</span>';
									?>
								</div>
								<div class="published">
									<?php echo get_the_date('', $post->ID); ?>
								</div>
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
			<div class="featured">
				<div class="featured-heading">FEATURED NEWS</div>
				<div class="triangle"></div>
				<div class="featured-menu">
					<div class="view-all"><a href="#">View All</a><i class="fa-solid fa-angles-right"></i></div>
				</div>
			</div>
			<div class="featured-news">
				<?php
				$posts = get_posts(array(
					'numberposts' => 4,
					'category_name' => 'featured',
				));
				if ($posts) {
					foreach ($posts as $post) {
						setup_postdata($post);
				?>
						<div class="news featured-news-item" style="background-size: contain; background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');">
							<div class="news-container">
								<?php
								$categories = get_the_category($post->ID);
								if (!empty($categories)) {
									echo "<ul class='post-cats'>";
									foreach ($categories as $category) {
										$category_color = get_term_meta($category->term_id, 'category_color', true);
										echo "<li class='post-cat' style='background-color:$category_color;'>" . esc_html($category->name) . '</li>';
									}
									echo "</ul>";
								}
								?>
								<a href=<?php the_permalink(); ?>>
									<h4 class="post-title"><?php the_title(); ?></h4>
								</a>
								<div class="author-published">
									<div class="author">
										<?php
										$author_id = get_the_author_meta('ID', $post->ID);
										echo get_avatar($author_id, 25);
										$author_name = get_the_author_meta('display_name', $author_id);
										echo '<span class="author-name">' . esc_html($author_name) . '</span>';
										?>
									</div>
									<div class="published">
										<?php echo get_the_date('', $post->ID); ?>
									</div>
								</div>
							</div>
						</div>
				<?php
					}
					wp_reset_postdata();
				} else {
					echo 'Нет постов в этой категории.';
				}
				?>
			</div>

		</div>
	</main>
	<?php wp_footer(); ?>
</div>
</body>

</html>