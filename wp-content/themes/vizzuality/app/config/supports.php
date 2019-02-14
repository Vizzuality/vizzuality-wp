<?php
/*
 * Add Theme Supports
 */

add_filter('mime_types', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
