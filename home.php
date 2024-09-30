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
                <!-- //Сделать на jquery анимацию двигающихся постов в trending menu -->

                <?php wp_nav_menu([
                    "theme_location" => "trending-menu",
                    "container" => "div",
                    "container_class" => "trending-menu"
                ]); ?>
            </div>
        </div>
    </main>
</div>
<?php wp_footer(); ?>