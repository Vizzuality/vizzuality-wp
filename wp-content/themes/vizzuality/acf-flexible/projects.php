<?php if (have_rows('projects_list')): ?>
    <div class="projects-grid-holder">
        <div class="projects-grid">
            <?php while (have_rows('projects_list')): the_row() ?>
                <?php
                //project
                $_project = get_sub_field('project_object')[0];

                //project ID
                $_project_ID = $_project->ID;

                //project client
                $_client = get_field('client', $_project_ID)[0];
                ?>
                <?php if ($_project): ?>
                    <?php
                    $_image_id = get_field('image', $_project_ID);
                    if (get_field('cover_image', $_project_ID)) {
                        $_image_id = get_field('cover_image', $_project_ID);
                    }

                    $_title = (get_field('short_title', $_project_ID)) ? get_field('short_title', $_project_ID) : $_project->post_title;
                    ?>
                    <section class="project-section <?php the_sub_field('size') ?>"<?php theme_bg_image($_image_id) ?>>
                        <a href="<?php echo get_the_permalink($_project_ID) ?>" class="section-frame">
                            <?php if ($_client): ?>
                                <?php theme_image(get_field('logo_svg', $_client->ID), null, ['class' => 'section-logo'], (get_sub_field('image_size')) ? get_sub_field('image_size') : 200) ?>
                            <?php endif; ?>
                            <h1><?php echo $_title ?></h1>
                        </a>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <a href="#popup-projects" data-fancybox="" class="btn btn-large btn-see-all"><?php _e('See all projects') ?></a>
    </div>
<?php endif; ?>
