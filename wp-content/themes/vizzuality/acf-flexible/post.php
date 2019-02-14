<section class="post-section vh-section <?php the_sub_field('style') ?>">
    <div class="section-frame">
        <?php if (get_sub_field('title')): ?>
            <h1><?php the_sub_field('title') ?></h1>
        <?php endif; ?>
        <?php if (get_sub_field('subtitle')): ?>
            <?php if ($_link_subtitle = get_sub_field('link_subtitle')): ?>
                <h2><a href="<?php echo $_link_subtitle ?>"><?php the_sub_field('subtitle') ?></a></h2>
            <?php else: ?>
                <h2><?php the_sub_field('subtitle') ?></h2>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (get_sub_field('button')): ?>
            <a href="<?php the_sub_field('button_link') ?>" class="btn<?php if (get_sub_field('style') == 'style-border-secondary'): ?> btn-secondary<?php endif; ?>"><?php the_sub_field('button_label') ?></a>
        <?php endif; ?>
    </div>
</section>
