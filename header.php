 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title("|", true, "right"); bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-73713365-2', 'auto');
          ga('send', 'pageview');
        </script>
        <header class="main-header">
			<h1 class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/logo.png" alt="Woodside Farm Creamery"></a></h1>
			<nav class="main-header__main-nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main-nav',
                    'container' => false,
                    'after' => '<li class="separator">&bull;</li>',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="main-nav__more-link"><a href="' . get_page_link(42) . '">More</a></li></ul>'
                )); ?>
			</nav>
		</header>