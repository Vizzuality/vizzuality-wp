<?php
/*
 * Default theme settings
 */

//Staging restrictions
if (file_exists(sys_get_temp_dir() . '/staging-restrictions.php')) {
    define('STAGING_RESTRICTIONS', true);
    require_once sys_get_temp_dir() . '/staging-restrictions.php';
}


function theme_disable_cheks()
{
    $disabled_checks = array('TagCheck', 'Plugin_Territory', 'CustomCheck', 'EditorStyleCheck');
    global $themechecks;
    foreach ($themechecks as $key => $check) {
        if (is_object($check) && in_array(get_class($check), $disabled_checks)) {
            unset($themechecks[$key]);
        }
    }
}

add_action('themecheck_checks_loaded', 'theme_disable_cheks');

add_theme_support('automatic-feed-links');

/* Custom logo support. Uncomment or delete on production
function theme_add_logo_support() {
	add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_add_logo_support' );
*/

if (!isset($content_width)) {
    $content_width = 900;
}

remove_action('wp_head', 'wp_generator');

function theme_localization()
{
    load_theme_textdomain('base', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'theme_localization');

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');


//Register tag [template-url]
function filter_template_url($text)
{
    return str_replace('[template-url]', get_template_directory_uri(), $text);
}

add_filter('the_content', 'filter_template_url');
add_filter('widget_text', 'filter_template_url');

//Register tag [site-url]
function filter_site_url($text)
{
    return str_replace('[site-url]', home_url(), $text);
}

add_filter('the_content', 'filter_site_url');
add_filter('widget_text', 'filter_site_url');

if (class_exists('acf') && !is_admin()) {
    add_filter('acf/load_value', 'filter_template_url');
    add_filter('acf/load_value', 'filter_site_url');
}

//Replace standard wp menu classes
function change_menu_classes($css_classes)
{
    return str_replace(array('current-menu-item', 'current-menu-parent', 'current-menu-ancestor'), 'active', $css_classes);
}

add_filter('nav_menu_css_class', 'change_menu_classes');

//Allow tags in category description
$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ($filters as $filter) {
    remove_filter($filter, 'wp_filter_kses');
}

function clean_phone($phone)
{
    return preg_replace('/[^0-9]/', '', $phone);
}

//Disable comments on pages by default
function theme_page_comment_status($post_ID, $post, $update)
{
    if (!$update) {
        remove_action('save_post_page', 'theme_page_comment_status', 10);
        wp_update_post(array(
            'ID' => $post->ID,
            'comment_status' => 'closed',
        ));
        add_action('save_post_page', 'theme_page_comment_status', 10, 3);
    }
}

add_action('save_post_page', 'theme_page_comment_status', 10, 3);


function basetheme_options_capability()
{
    $role = get_role('administrator');
    $role->add_cap('theme_options_view');
}

add_action('admin_init', 'basetheme_options_capability');

//theme options tab in appearance
if (function_exists('acf_add_options_sub_page') && current_user_can('theme_options_view')) {
    acf_add_options_sub_page(array(
        'title' => 'Theme Options',
        'parent' => 'themes.php',
    ));
}

// date archive link
add_action('admin_init',
    function () {
        add_settings_section(
            'eg_setting_section',
            __('Date archive link', 'base'),
            function () {
            },
            'reading'
        );

        add_settings_field(
            'eg_setting_name',
            __('Type', 'base'),
            'eg_setting_callback_function',
            'reading',
            'eg_setting_section'
        );

        register_setting('reading', 'eg_date_archive_link_type');
    }
);

function eg_setting_callback_function()
{
    if (get_option('eg_date_archive_link_type')) $type = get_option('eg_date_archive_link_type');
    else $type = "month";
    echo '
	 <select name="eg_date_archive_link_type">
		 <option ' . selected($type, 'day', false) . ' value="day">' . __('Day', 'base') . '</option>
		 <option ' . selected($type, 'month', false) . ' value="month">' . __('Month', 'base') . '</option>
		 <option ' . selected($type, 'year', false) . ' value="year">' . __('Year', 'base') . '</option>
	 </select>
	';
}

function get_date_archive_link()
{
    if (get_option('eg_date_archive_link_type') == "year") {
        $res = get_year_link(get_the_date("Y"));
    } elseif (get_option('eg_date_archive_link_type') == "day") {
        $res = get_day_link(get_the_date("Y"), get_the_date("m"), get_the_date("d"));
    } else {
        $res = get_month_link(get_the_date("Y"), get_the_date("m"));
    }
    return $res;
}

function defer_js($tag, $handle, $src)
{
    if (!is_admin())
        $tag = str_replace(' src=', ' defer src=', $tag);

    return $tag;
}
# commented block below, because there may be errors with js, if need you can uncomment this block
// add_filter( 'script_loader_tag', 'defer_js', 99, 3 );




