<?php get_header() ?>
    <main id="main">
        <div class="container">
            <?php while (have_posts()): the_post() ?>
                <article class="about-detail">
                    <header class="header-detail">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="col">
                                <div class="photo"<?php theme_bg_image(get_post_thumbnail_id()) ?>></div>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('phrase')): ?>
                            <div class="col">
                                <blockquote class="title-bq">
                                    <p><?php the_field('phrase') ?></p>
                                </blockquote>
                            </div>
                        <?php endif; ?>
                    </header>
                    <div class="content-article">
                        <div class="title-article">
                            <h1 class="name"><?php the_title() ?></h1>
                            <?php if (get_field('position')): ?>
                                <span class="position"><?php the_field('position') ?></span>
                            <?php endif; ?>
                        </div>
                        <?php the_content() ?>
                        <?php if (have_rows('repeater_info_links')): ?>
                            <footer class="footer-article">
                                <ul class="social-afticle">
                                    <?php while (have_rows('repeater_info_links')): the_row() ?>
                                        <?php
                                        $_link = get_sub_field('link');
                                        if (get_sub_field('label') == 'Email') {
                                            $_link = 'mailto:' . $_link;
                                        }
                                        ?>
                                        <li><a href="<?php echo $_link ?>" target="_blank"><?php the_sub_field('label') ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </footer>
                        <?php endif; ?>
                    </div>
                </article>
                <?php
                $_post_prev = get_adjacent_post(false, null, false);
                $_post_next = get_adjacent_post(false, null, true);

                if (!$_post_next || !$_post_prev) {
                    $_posts = get_posts([
                        'post_type' => 'team',
                        'posts_per_page' => -1,
                    ]);

                    if (!$_post_prev) {
                        $_post_prev = end($_posts);
                    }

                    if (!$_post_next) {
                        $_post_next = array_shift($_posts);
                    }
                }
                ?>
                <?php if ($_post_prev || $_post_next): ?>
                    <section class="section section-prev-next-team bg-gray">
                        <ul class="list-prev-next-team">
                            <?php if ($_post_prev): ?>
                                <li>
                                    <a href="<?php echo get_permalink($_post_prev) ?>" class="prev-next-team-items">
                                        <span class="prev-next"><?php _e('Previous') ?></span>
                                        <h2 class="name"><?php echo $_post_prev->post_title ?></h2>
                                        <?php if (get_field('position', $_post_prev->ID)): ?>
                                            <span class="position"><?php the_field('position', $_post_prev->ID) ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($_post_next): ?>
                                <li>
                                    <a href="<?php echo get_permalink($_post_next) ?>" class="prev-next-team-items">
                                        <span class="prev-next"><?php _e('Next') ?></span>
                                        <h2 class="name"><?php echo $_post_next->post_title ?></h2>
                                        <?php if ($_position = get_field('position', $_post_next->ID)): ?>
                                            <span class="position"><?php the_field('position', $_post_next->ID) ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </section>
                <?php endif; ?>
                <?php if (get_field('team_section_contact', 'option')): ?>
                    <section class="section-contact">
                        <div class="section-frame">
                            <?php if (get_field('section_contact_title', 'option')): ?>
                                <h1><?php the_field('section_contact_title', 'option') ?></h1>
                            <?php endif; ?>
                            <?php if (get_field('section_contact_link', 'option')): ?>
                                <a href="<?php the_field('section_contact_link', 'option') ?>" class="btn"><?php _e('Apply') ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </main>
<?php get_footer() ?>
