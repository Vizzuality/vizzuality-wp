<?php
/*
 * Theme functions
 */

//assets url
function theme_assets_url()
{
    return get_template_directory_uri() . '/assets';
}

// fix gutenberg width
add_action('admin_head', 'editor_full_width_gutenberg');
function editor_full_width_gutenberg()
{
    echo '
        <style>
        .editor-styles-wrapper .wp-block {
            max-width: 1400px !important;
        }
        @media screen and (min-width: 1200px) {
            #editor .edit-post-layout__metaboxes {
                padding: 56px 60px !important;
            }
        }
        
    </style>';
}

// add google analytics code
add_action('wp_head', function () {
    if ($_google_analytics = get_field('google_analytics', 'option')) {
        echo $_google_analytics;
    }
}, 200);
