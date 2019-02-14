<section class="section<?php if (get_sub_field('gray_background')): ?> bg-gray<?php endif; ?>">
    <div class="twocolumns">
        <div class="col">
            <?php if (get_sub_field('title')): ?>
                <h2><?php the_sub_field('title') ?></h2>
            <?php endif; ?>
            <?php the_sub_field('content') ?>
        </div>
    </div>
</section>