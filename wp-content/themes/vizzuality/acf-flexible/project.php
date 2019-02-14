<?php
//project
$_project = get_sub_field('project_object')[0];

//project ID
$_project_ID = $_project->ID;

//project client
$_client = get_field('client', $_project_ID)[0];

//image id
$_image_id = get_field('image', $_project_ID);
if (get_field('cover_image', $_project_ID)) {
    $_image_id = get_field('cover_image', $_project_ID);
}
?>
<section class="project-section vh-section"<?php theme_block_id(get_sub_field('section_id')) ?><?php theme_bg_image($_image_id) ?>>
    <div class="section-frame">
        <?php if ($_client): ?>
            <?php theme_image(get_field('logo_svg', $_client->ID), null, ['class' => 'section-logo'], (get_sub_field('image_size')) ? get_sub_field('image_size') : 200) ?>
        <?php endif; ?>
        <h1><?php echo $_project->post_title ?></h1>
        <?php if (get_field('summary', $_project_ID)): ?>
            <p><?php the_field('summary', $_project_ID) ?></p>
        <?php endif; ?>
        <a href="<?php echo get_the_permalink($_project_ID) ?>" class="btn btn-white btn-border btn-read-more"><?php _e('Read more') ?></a>
    </div>
</section>
