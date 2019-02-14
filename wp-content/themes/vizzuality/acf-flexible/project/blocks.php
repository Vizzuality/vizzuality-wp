<section class="section detail-section">
    <?php if (get_sub_field('title')): ?>
        <h2><?php the_sub_field('title') ?></h2>
    <?php endif; ?>
    <?php if (have_rows('repeater_blocks')): ?>
        <div class="threecolumns">
            <?php while (have_rows('repeater_blocks')): the_row() ?>
                <div class="col">
                    <div class="card-thumbhail">
                        <?php if (get_sub_field('image')): ?>
                            <?php if (get_sub_field('link')): ?>
                                <a href="<?php the_sub_field('link') ?>" class="visual"<?php theme_bg_image(get_sub_field('image')) ?>></a>
                            <?php else: ?>
                                <div href="<?php the_sub_field('link') ?>" class="visual"<?php theme_bg_image(get_sub_field('image')) ?>></div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (get_sub_field('text')): ?>
                            <div class="body-card">
                                <?php the_sub_field('text') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
