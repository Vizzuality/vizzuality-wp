<?php
$args = [
    'post_type' => 'team',
    'posts_per_page' => (get_sub_field('posts_per_page')) ? get_sub_field('posts_per_page') : 12,
    'no_found_rows' => true,
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
];

$_query = new WP_Query($args);

$_placeholder = [];

if (have_rows('repeater_placeholders')) {
    $_cnt = 0;
    while (have_rows('repeater_placeholders')) {
        the_row();
        $_placeholder[$_cnt]['order'] = get_sub_field('insert_after');
        $_placeholder[$_cnt]['image'] = get_sub_field('image');
        ++$_cnt;
    }
}
?>
<?php if ($_query->have_posts()): ?>
    <ul id="team" class="team-gallery">
        <?php $_cnt = 0; while ($_query->have_posts()): $_query->the_post(); ++$_cnt ?>
            <li>
                <a href="<?php the_permalink() ?>" class="item-team"<?php theme_bg_image(get_post_thumbnail_id()) ?>>
                    <div class="veil"></div>
                    <div class="team-gallery-content">
                        <h3><?php the_title() ?></h3>
                        <?php if (get_field('position')): ?>
                            <p><?php the_field('position') ?></p>
                        <?php endif; ?>
                    </div>
                </a>
            </li>
            <?php if ($_placeholder && is_numeric($_key = array_search($_cnt, array_column($_placeholder, 'order')))): ?>
                <li>
                    <div href="<?php the_permalink() ?>" class="item-team"<?php theme_bg_image($_placeholder[$_key]['image']) ?>></div>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata() ?>
    </ul>
<?php endif; ?>
