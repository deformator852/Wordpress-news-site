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
                    <?php
                    $first_post = get_posts(array(
                        'numberposts' => -1,
                    ));
                    if (!empty($first_post)) {
                        $post = $first_post[0];
                        setup_postdata($post);
                    }
                    ?>
                    <?php
                    $categories = get_the_category($post->ID);
                    if (!empty($categories)) {
                        echo "<ul>";
                        foreach ($categories as $category) {
                            echo '<li>' . esc_html($category->name) . '</li>';
                        }
                        echo "</ul>";
                    }
                    ?>
                    <p class="post-title"><?php the_title(); ?></p>
                </div>
                <div>
                    <div class="second-news">
                    </div>
                    <div class="third-news"></div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php wp_footer(); ?>