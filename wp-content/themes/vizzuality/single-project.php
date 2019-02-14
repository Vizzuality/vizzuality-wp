<?php get_header() ?>
    <main id="main">
        <?php while (have_posts()): the_post() ?>
            <div class="container">
                <div class="hero-banner bg-video-holder" <?php theme_bg_image(get_field('image')) ?>>
                    <?php if ($video = get_field('video')): ?>
                        <video class="bg-video" width="640" height="360" loop autoplay muted playsinline>
                            <source type="video/mp4" src="<?php echo $video['url'] ?>" />
                        </video>
                    <?php endif; ?>
                    <div class="hold">
                        <div class="title-block">
                            <h1 class="title-banner"><?php the_title() ?></h1>
                            <?php if (get_field('summary')): ?>
                                <span class="sub-title"><?php the_field('summary') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <?php if ($_client = get_field('client', get_the_ID())[0]): ?>
                        <div class="post-head">
                            <div class="box">
                                <?php if ($_logo_id = get_field('logo', $_client->ID)): ?>
                                    <div class="visual">
                                        <?php echo wp_get_attachment_image($_logo_id, 'full') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="txt">
                                    <h2 class="title-head"><?php echo $_client->post_title ?></h2>
                                    <?php if (get_field('release_date')): ?>
                                        <div><?php the_field('release_date') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                            $_link = get_field('link', $_client->ID);
                            if (get_field('client_link')) {
                                $_link = get_field('client_link');
                            }
                            ?>
                            <?php if ($_link): ?>
                                <div class="wrap-mobile">
                                    <a href="<?php echo $_link ?>" class="btn" target="_blank"><?php _e('Check it online') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="txt-block">
                        <?php the_content() ?>
                    </div>
                </div>
                <?php if (have_rows('flexible')): ?>
                    <?php while (have_rows('flexible')): the_row() ?>
                        <?php get_template_part('acf-flexible/project/' . get_row_layout()) ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </main>
<?php get_footer() ?>
