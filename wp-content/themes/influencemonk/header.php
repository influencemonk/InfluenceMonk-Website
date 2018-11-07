<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset');  ?>">
    <meta name='description' content="<?php bloginfo('description'); ?>">

    <title>  <?php bloginfo('name') ?> <?php wp_title('  |  '); ?> </title>

    <?php wp_head(); ?>

    <meta name="og:title" property="og:title" content="<?php bloginfo('name') ?> <?php wp_title('  |  '); ?>">
    <meta name="og:type" property="og:type" content="website">
    <meta name="og:description" property="og:description" content="<?php bloginfo('description'); ?>">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a class="navbar-brand" href="<?php echo get_home_url(); ?> "> <span>influence</span>monk </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse navbar-right"  itemscope itemtype="http://www.schema.org/SiteNavigationElement">

        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new Walker_Nav_Primary)); ?>

    </div>
</nav>