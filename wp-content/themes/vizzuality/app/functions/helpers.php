<?php

function theme_attachment_image($id = false, $size = 'full', $attr = array())
{
    if (!$id || !is_numeric($id)) {
        return;
    }

    $render_image = wp_get_attachment_image($id, $size, null, $attr);
    echo preg_replace('/(height|width)="\d*"\s/', '', $render_image);
}

function theme_bg_image($id, $size = 'full')
{
    if (!$id || !is_numeric($id)) {
        return;
    }

    $_img = wp_get_attachment_image_src($id, $size);
    echo ' style="background-image: url(' . $_img[0] . ');"';
}

function theme_block_id($id = false)
{
    if (!$id) {
        return;
    }

    echo ' id="' . $id . '"';
}

function theme_image($attachment_id = false, $size = 'full', $attr = array(), $width = 200)
{
    if (!$attachment_id || !is_numeric($attachment_id)) {
        return;
    }

    $src = wp_get_attachment_image_url($attachment_id, $size);

    $default_attr = array(
        'src' => $src,
        'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))),
    );

    $widthAttr = '';
    if ($width) {
        $widthAttr = 'width="' . $width . '"';
    }

    $attr = wp_parse_args($attr, $default_attr);
    $attr = array_map('esc_attr', $attr);


    $html = "<img $widthAttr";
    foreach ($attr as $name => $value) {
        $html .= " $name=" . '"' . $value . '"';
    }
    $html .= '>';

    echo $html;
}
