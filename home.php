<?php
// Template Name:Home
?>
<div id="wrapper">
    <?php get_header(); ?>
    <main class="main">
        <div class="main-container">
            <div class="tags">
                <p class="tags-title">Popular Tags:</p>
                <?php
                $tags = get_tags([
                    'number' => 15,
                    'orderby' => 'count',
                    'order' => 'DESC'
                ]);
                if ($tags) {
                    echo '<ul>';
                    foreach ($tags as $tag) {
                        echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </main>
</div>
<?php wp_footer(); ?>