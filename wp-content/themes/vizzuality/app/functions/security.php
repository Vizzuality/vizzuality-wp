<?php

// Disable the Plugin and Theme Editor
define('DISALLOW_FILE_EDIT', true);

// Remove WordPress Generator
remove_action('wp_head', 'wp_generator');

// Remove version from rss
add_filter('the_generator', '__return_empty_string');

// Remove version from CSS/JS
function theme_remove_css_js_ver($src)
{
    $src = remove_query_arg('ver', $src);

    return $src;
}

add_filter(
    'style_loader_src',
    'theme_remove_css_js_ver'
);

add_filter(
    'script_loader_src',
    'theme_remove_css_js_ver'
);
