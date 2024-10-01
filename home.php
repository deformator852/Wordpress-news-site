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
                <div class="first-news" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');">
                    <div class="first-news-container">
                        <?php
                        $posts = get_posts(array(
                            'numberposts' => 3,
                        ));
                        global $posts;
                        setup_postdata($posts[0]);
                        ?>
                        <?php
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo "<ul class='post-cats'>";
                            foreach ($categories as $category) {
                                echo '<li class="post-cat">' . esc_html($category->name) . '</li>';
                            }
                            echo "</ul>";
                        }
                        ?>
                        <h3 class="post-title"><?php the_title(); ?></h3>
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
                    <div class="second-news">
                        <?php setup_postdata($posts[1]) ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="third-news">
                        <?php setup_postdata($posts[2]) ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php wp_footer(); ?>