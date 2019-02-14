<section id="contact" class="section-contact black-color">
    <div class="section-frame">
        <?php if (get_sub_field('title')): ?>
            <h1><?php the_sub_field('title') ?></h1>
        <?php endif; ?>
        <?php if (get_sub_field('text')): ?>
            <div class="txt">
                <?php the_sub_field('text') ?>
            </div>
        <?php endif; ?>
    </div>
</section>
