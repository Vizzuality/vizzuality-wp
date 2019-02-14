<div class="meta">
    <ul>
        <li><?php _e('Posted in', 'base') ?><?php the_category(', ') ?></li>
        <li><?php comments_popup_link(__('No Comments', 'base'), __('1 Comment', 'base'), __('% Comments', 'base')) ?></li>
        <?php the_tags(__('<li>Tags: ', 'base'), ', ', '</li>') ?>
        <?php edit_post_link(__('Edit', 'base'), '<li>', '</li>') ?>
    </ul>
</div>
