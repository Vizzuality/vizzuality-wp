<div class="intro-section vh-section">
    <div class="section-frame">
        <?php if (get_sub_field('title')): ?>
            <h1><?php the_sub_field('title') ?></h1>
        <?php endif; ?>
        <?php the_sub_field('text') ?>
        <?php if (have_rows('repeater_links')): ?>
            <?php while (have_rows('repeater_links')): the_row() ?>
                <?php
                $_link_class = '';

                if (get_sub_field('border')) {
                    $_link_class .= ' btn-border';
                }

                if (get_sub_field('anchor_link')) {
                    $_link_class .= ' anchor-link';
                }
                ?>
                <a href="<?php the_sub_field('url') ?>" class="btn<?php echo $_link_class ?>"><?php the_sub_field('label') ?></a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
