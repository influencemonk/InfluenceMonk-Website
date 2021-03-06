<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset');  ?>">

    <?php wp_head(); ?>

    <?php
    if (is_single()) {

        if (have_posts()):
            while (have_posts()): the_post(); ?>

                <meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php echo get_the_title(); ?>" />
                <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
                <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
                <meta name="twitter:card" content="summary" />
                <meta name="twitter:site" content="<?php echo get_site_url(); ?>" />

            <?php endwhile;
        endif;

        wp_reset_query(); ?>

    <?php }else { ?>
	    <meta name="og:title" property="og:title" content="<?php bloginfo('name') ?>">
        <meta name="og:type" property="og:type" content="website">
        <meta name="og:description" property="og:description" content="<?php bloginfo('description'); ?>">
    <?php } ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119032571-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119032571-2');
    </script>

</head>
<body>
<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo get_home_url(); ?> "> <img src="<?php echo get_template_directory_uri() ?>/img/influenceMonk.png" alt="InfluenceMonk"/> </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse navbar-right"  itemscope itemtype="http://www.schema.org/SiteNavigationElement">

        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new Walker_Nav_Primary)); ?>

    </div>
</nav>