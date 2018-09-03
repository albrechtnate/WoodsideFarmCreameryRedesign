<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body class="navigation-page">
    <h2>Site Navigation</h2>
    <nav class="navigation-page-full-menu">
        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'container' => false
        )); ?>
    </nav>
    <?php wp_footer(); ?>
</body>
</html>