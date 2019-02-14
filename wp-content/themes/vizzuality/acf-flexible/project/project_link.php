<?php
//project client
$_client = get_field('client')[0];
?>
<?php if ($_client && $_link = get_field('link', $_client->ID)): ?>
    <?php
    if (get_field('client_link')) {
        $_link = get_field('client_link');
    }
    ?>
    <section class="section check-section bg-primary">
        <div class="check-hold">
            <a href="<?php echo $_link ?>" class="txt"><?php the_sub_field('link_label') ?></a>
            <a href="<?php echo $_link ?>" class="btn btn-white btn-large"><?php _e('Check it online') ?></a>
        </div>
    </section>
<?php endif; ?>
