<section class="section-contact">
    <div class="section-frame">
        <?php if (get_sub_field('title')): ?>
            <h1><?php the_sub_field('title') ?></h1>
        <?php endif; ?>
        <?php if (get_sub_field('button')): ?>
            <a href="<?php the_sub_field('button_link') ?>" class="btn"><?php the_sub_field('button_label') ?></a>
        <?php endif; ?>
    </div>
</section>
