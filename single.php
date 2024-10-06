<div id="wrapper">
    <?php get_header(); ?>
    <main class="main">
        <div class="main-container">
            <div class="page-breadcrumb">
                <div class="page-breadcrumb__container">
                    <div class="page-breadcumb__links">
                        <p class="home-link"><a href="<?php echo home_url(); ?>">Home</a></p>
                        <p class="active-link"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="single-post">
                <div class="single-post__container">
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
                    <a class="post-header" href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <div class="author-published">
                        <div class="author">
                            <?php
                            $author_id = get_the_author_meta('ID', get_the_ID());
                            echo get_avatar($author_id, 25);
                            $author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
                            echo '<span class="author-name">' . esc_html($author_name) . '</span>';
                            ?>
                        </div>
                        <div class="published">
                            <?php echo get_the_date('', $post->ID); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
<?php wp_footer(); ?>
</div>