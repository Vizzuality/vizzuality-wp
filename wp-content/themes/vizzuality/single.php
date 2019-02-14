<?php get_header() ?>
    <div class="container">
        <div id="content">
            <?php while (have_posts()): the_post() ?>
                <div <?php post_class() ?> id="post-<?php the_ID() ?>">
                    <div class="title">
                        <?php the_title('<h1>', '</h1>') ?>
                        <p class="meta-info">
                            <a href="<?php echo get_date_archive_link() ?>" rel="bookmark">
                                <time datetime="<?php echo get_the_date('Y-m-d') ?>">
                                    <?php the_time('F jS, Y') ?>
                                </time>
                            </a>
                            <?php _e('by', 'base') ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) ?>"><?php the_author() ?></a>
                        </p>
                    </div>
                    <div class="content">
                        <?php the_post_thumbnail('full') ?>
                        <?php the_content() ?>
                    </div>
                    <?php wp_link_pages() ?>
                    <?php get_template_part('template-parts/meta') ?>
                </div>
                <?php comments_template() ?>
                <?php get_template_part('template-parts/pager-single', get_post_type()) ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer() ?>
