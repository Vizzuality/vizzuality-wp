<?php
/*
 * Theme Warnings
 */

// Search Engine Visibility
add_action('admin_notices', function () {
    if (get_option('blog_public')) {
        return;
    }

    $message = __('You are blocking access to robots. You must go to your <a href="%s">Reading</a> settings and uncheck the box for Search Engine Visibility.', 'base');
    echo '<div class="error"><p>';
    printf($message, admin_url('options-reading.php'));
    echo '</p></div>';
});
