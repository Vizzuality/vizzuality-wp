<?php get_header() ?>
    <div id="content">
        <?php if (have_posts()): ?>
            <?php get_template_part('template-parts/loop') ?>
        <?php else: ?>
            <?php get_template_part('template-parts/not-found') ?>
        <?php endif; ?>
    </div>
    <?php get_sidebar() ?>
<?php get_footer() ?>
