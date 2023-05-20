<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name"); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=block" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id='Site-header'>
        <section class="page-info">
            <?php
            if (is_home()) { ?>
            <h1 class="title fs24">
                <?php bloginfo("name"); ?>
            </h1>
            <?php }
            if (is_category() || is_search()) { ?>
            <h1 class='title'>
                <span class="deco fs18"><?php echo $args["type"]; ?> - </span>
                <?php echo $args["name"]; ?>
                <span class="deco fs18">[ <?php echo $args["cnt"]; ?> ]</span>
            </h1>
            <?php }
            if (is_single()) { ?>
            <p class="category fs15 bold"><?php echo $args["cat"]; ?></p>
            <h1 class="title fs30"><?php echo $args["title"]; ?></h1>
            <p class="author date">
                <?php echo $args["avatar"]; ?>
                <span class="author fs18"><?php echo $args["author"]; ?></span>
                <span class="date fs15"><?php echo $args["date"]; ?></span>
            </p>
            <?php }
            ?>
        </section>
        <nav id='Nav'>
            <div class="btn-open-sidebar">
                <div class="long"></div>
                <div class="short"></div>
                <div class="long"></div>
            </div>
            <div class="site-menu">
                <?php $args = ["theme_location" => "header"]; ?>
                <?php wp_nav_menu($args); ?>
            </div>
        </nav>
    </header>

    <?php get_sidebar(); ?>

    <main role="main">