<?php get_header() ?>
    <div class="container">
        <div id="content">
            <?php if (have_posts()): ?>
                <div class="title">
                    <h1><?php printf(__('Search Results for: %s', 'base'), '<span>' . get_search_query() . '</span>') ?></h1>
                </div>
                <?php get_template_part('template-parts/loop') ?>
            <?php else: ?>
                <?php get_template_part('template-parts/not-found') ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer() ?>
