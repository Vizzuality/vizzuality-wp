<section class="section map-section">
    <?php if (get_sub_field('title')): ?>
        <h2 class="text-center"><?php the_sub_field('title') ?></h2>
    <?php endif; ?>
    <div class="map-container">
        <div class="map-wrap">
            <?php the_sub_field('embed_code') ?>
        </div>
    </div>
    <?php if (get_sub_field('caption')): ?>
        <div class="caption text-center">
            <?php the_sub_field('caption') ?>
        </div>
    <?php endif; ?>
</section>
