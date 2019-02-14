<?php
/*
Template Name: Flexible
*/
get_header() ?>
    <main id="main">
        <div class="container">
            <?php if (have_rows('flexible_content')): ?>
                <?php while (have_rows('flexible_content')): the_row() ?>
                    <?php get_template_part('acf-flexible/' . get_row_layout()) ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>
<?php get_footer() ?>
