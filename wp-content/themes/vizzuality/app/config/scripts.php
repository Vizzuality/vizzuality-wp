<?php
/*
 * Add Theme JS
 */

add_action('wp_enqueue_scripts', function () {
  /*
  * Adds JavaScript to pages with the comment form to support
  * sites with threaded comments (when in use).
  */
    wp_deregister_script('comment-reply');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script(
            'comment-reply',
            theme_assets_url() . '/js/comment-reply.js',
            null,
            null,
            true
        );
    }

    if (is_page_template('page-templates/flexible.php')) {
        wp_enqueue_script(
            'leaflet',
            theme_assets_url() . '/js/leaflet-1.2.js',
            null,
            null,
            true
        );
    }

    // Loads JavaScript file with functionality specific.
    wp_enqueue_script(
        'main-script',
        theme_assets_url() . '/js/jquery.main.js', ['jquery'],
        null,
        true
    );
});

/*
 * Add Theme CSS
 */
add_action('wp_enqueue_scripts', function () {
    // Loads our main stylesheet.
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );

    if (is_page_template('page-templates/flexible.php')) {
        wp_enqueue_style(
            'leaflet-style',
            theme_assets_url() . '/css/leaflet-1.2.css'
        );
    }
});
