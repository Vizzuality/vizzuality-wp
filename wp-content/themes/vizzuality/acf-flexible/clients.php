<?php if (have_rows('repeater_clients')): ?>
    <div class="clients-section">
        <ul class="logos-list">
            <?php while (have_rows('repeater_clients')): the_row() ?>
                <li><?php theme_attachment_image(get_sub_field('logo')) ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>
