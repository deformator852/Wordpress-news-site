<?php

class ThemeAssets
{
    public function enqueue_assets()
    {
        add_action('wp_enqueue_scripts', function () {
            $theme_root_url = get_template_directory_uri();
            wp_enqueue_style('index', $theme_root_url . '/assets/css/index.css');
            wp_enqueue_style('adaptive', $theme_root_url . '/assets/css/adaptive.css');
            wp_enqueue_style('fonts', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css");
            wp_enqueue_script('header', $theme_root_url . "/assets/js/header.js",);
            if (is_front_page()) {
                wp_enqueue_script("home_js", $theme_root_url . './assets/js/main.js');
                wp_enqueue_style("home_css", $theme_root_url . '/assets/pages/home.css');
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
        "menu" => "Header menu",
    ]);
}

add_action("init", "register_menus");
