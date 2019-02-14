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
<?php if ($_project->post_status == 'publish'): ?>
    <section class="section section-project-item"<?php theme_bg_image($_image_id) ?>>
        <div class="text-center">
            <?php if ($_client): ?>
                <span class="sub-title"><?php echo $_client->post_title ?></span>
            <?php endif; ?>
            <h2 class="title-project"><a href="<?php echo get_the_permalink($_project_ID) ?>"><?php echo $_project->post_title ?></a></h2>
        </div>
    </section>
<?php endif; ?>
