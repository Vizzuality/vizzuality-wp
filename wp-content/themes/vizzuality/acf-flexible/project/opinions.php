<section class="section section-about-it bg-gray">
    <?php if (get_sub_field('title')): ?>
        <h2 class="text-center"><?php the_sub_field('title') ?></h2>
    <?php endif; ?>
    <?php if (have_rows('repeater_blocks')): ?>
        <div class="threecolumns">
            <?php while (have_rows('repeater_blocks')): the_row() ?>
                <div class="col d-flex">
                    <div class="card">
                        <?php if (get_sub_field('image')): ?>
                            <div class="ico">
                                <?php theme_attachment_image(get_sub_field('image')) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('text') || get_sub_field('addition')): ?>
                            <div class="body-card">
                                <?php the_sub_field('text') ?>
                                <?php if (get_sub_field('addition')): ?>
                                    <div class="opinion-autor">
                                        <?php the_sub_field('addition') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('link')): ?>
                            <div class="footer-card">
                                <span class="name"><a href="<?php the_sub_field('link_url') ?>"><?php the_sub_field('link_label') ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
