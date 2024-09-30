<?php

class ThemeAssets
{
    public function enqueue_assets()
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style('index', get_template_directory_uri() . '/assets/css/index.css');
            wp_enqueue_style('adaptive', get_template_directory_uri() . '/assets/css/adaptive.css');
            wp_enqueue_style('fonts', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css");
            wp_enqueue_style("khand", "https://fonts.googleapis.com/css2?family=Khand:wght@300;400;500;600;700&display=swap");

            wp_enqueue_script('header', get_template_directory_uri() . "/assets/js/header.js",);
            if (is_front_page()) {
                wp_enqueue_script("home_js", get_template_directory_uri() . '/assets/js/home.js');
                wp_enqueue_style("home_css", get_template_directory_uri() . '/assets/pages/home.css');
            }
        });
    }

    public function add_theme_supports()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }

    public function allow_svg_in_wordpress()
    {
        add_filter('upload_mimes', 'svg_upload_allow');
        function svg_upload_allow($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';

            return $mimes;
        }
        add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
        function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
        {
            if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
                $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
            } else {
                $dosvg = ('.svg' === strtolower(substr($filename, -4)));
            }
            if ($dosvg) {
                if (current_user_can('manage_options')) {

                    $data['ext'] = 'svg';
                    $data['type'] = 'image/svg+xml';
                } else {
                    $data['ext'] = false;
                    $data['type'] = false;
                }
            }
            return $data;
        }
    }
}

$theme_assets = new ThemeAssets();
$theme_assets->enqueue_assets();
$theme_assets->add_theme_supports();

function register_menus()
{
    register_nav_menus([
        "header-menu" => "Header menu",
        "trending-menu" => "Trending menu"
    ]);
}

add_action("init", "register_menus");

function add_menu_thumbnail($item_output, $item, $depth, $args)
{
    if ('trending-menu' === $args->theme_location && 'post' === get_post_type($item->object_id)) {
        $thumbnail = get_the_post_thumbnail($item->object_id, 'thumbnail', [
            'class' => 'trending-menu-post-thumbnail',
        ]);
        $item_output = $thumbnail . $item_output;
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_menu_thumbnail', 10, 4);
