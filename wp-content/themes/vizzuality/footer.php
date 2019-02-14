        <footer id="footer">
            <div class="container">
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo theme_assets_url() ?>/images/vizzuality-white.svg" alt="<?php bloginfo('name') ?>"></a>
                </div>
                <?php if (has_nav_menu('nav_footer')): ?>
                    <?php
                    wp_nav_menu([
                        'container' => 'nav',
                        'container_class' => 'footer-nav',
                        'theme_location' => 'nav_footer',
                        'walker' => new Custom_Walker_Nav_Menu(),
                    ]);
                    ?>
                <?php endif; ?>
            </div>
        </footer>
    </div>
    <div class="popup-holder">
        <?php
        $args = [
            'post_type' => 'project',
            'posts_per_page' => -1,
            'no_found_rows' => true,
            'post_status' => 'publish',
            'ignore_sticky_posts' => true,
        ];
        $_query = new WP_Query($args);
        ?>
        <?php if ($_query->have_posts()): ?>
            <div id="popup-projects" class="lightbox">
                <h2><?php _e('All our projects.') ?></h2>
                <ul class="projects-list">
                    <?php while ($_query->have_posts()): $_query->the_post() ?>
                        <?php
                        //project client
                        $_client = get_field('client', $_project_ID)[0];

                        $_client_txt = '';
                        if ($_client) {
                            $_client_txt = ', ' . $_client->post_title;
                        }

                        $_title = (get_field('short_title')) ? get_field('short_title') : get_the_title();

                        if (substr($_client_txt, -1) == '.') {
                            $_client_txt = substr($_client_txt, 0,-1);
                        }
                        ?>
                        <li><a href="<?php the_permalink() ?>"><b><?php echo $_title ?></b><?php echo $_client_txt ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php wp_reset_postdata() ?>
        <?php endif; ?>
    </div>
<?php wp_footer() ?>
</body>
</html>
