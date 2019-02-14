<section class="section<?php if (get_sub_field('gray_background')): ?> bg-gray<?php endif; ?>">
    <div class="twocolumns align-items-center reverce">
        <div class="col">
            <?php if (get_sub_field('title')): ?>
                <h2><?php the_sub_field('title') ?></h2>
            <?php endif; ?>
            <?php the_sub_field('text') ?>
        </div>
        <?php if ($_image_id = get_sub_field('image')): ?>
            <div class="col">
                <div class="wrap-mobile">
                    <?php theme_attachment_image($_image_id) ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>