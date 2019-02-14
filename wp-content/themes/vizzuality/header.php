<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
    <div id="wrapper">
        <header id="header">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')) ?>">
                        <img src="<?php echo theme_assets_url() ?>/images/vizzuality.svg" alt="<?php bloginfo('name') ?>">
                        <img class="logo-alt" src="<?php echo theme_assets_url() ?>/images/vizzuality-white.svg" alt="<?php bloginfo('name') ?>">
                    </a>
                </div>
                <?php if (has_nav_menu('primary')): ?>
                    <a href="#" class="nav-opener"><span></span></a>
                    <nav class="main-nav">
                        <?php
                        wp_nav_menu([
                            'container' => false, // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                            'theme_location' => 'primary',
                        ]);
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </header>
