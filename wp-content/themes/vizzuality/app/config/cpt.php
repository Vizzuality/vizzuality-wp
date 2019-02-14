<?php
/*
 * Custom Post Types
 */

// register project cpt
add_action('init', function () {
    $args = [
        'labels' => [
            'name' => __('Projects'),
            'singular_name' => __('Project'),
            'edit_item' => __('Edit Project'),
        ],
        'public' => true,
        'supports' => ['title', 'editor'],

    ];
    register_post_type('project', $args);
});

// register client cpt
add_action('init', function () {
    $args = [
        'labels' => [
            'name' => __('Clients'),
            'singular_name' => __('Client'),
            'edit_item' => __('Edit Client'),
        ],
        'public' => true,
        'supports' => ['title'],

    ];
    register_post_type('client', $args);
});

// register team cpt
add_action('init', function () {
    $args = [
        'labels' => [
            'name' => __('Team'),
            'singular_name' => __('Team'),
            'edit_item' => __('Edit Member'),
        ],
        'public' => true,
        'rewrite' => ['slug' => 'about'],
        'supports' => ['title', 'editor', 'thumbnail'],

    ];
    register_post_type('team', $args);
});
