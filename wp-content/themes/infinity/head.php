<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/dist/css/app.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/dist/css/additional.css" type="text/css" media="screen" charset="utf-8">
    <?php wp_head(); ?>

    <script type='text/javascript' src='https://www.treace.com/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
    <script type='text/javascript' src='https://www.treace.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'infinity'); ?></a>