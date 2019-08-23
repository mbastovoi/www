<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo('charset');?>">
  <link href="<?php echo get_stylesheet_directory_uri(). '/style.css' ?>" rel="stylesheet" type="text/css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
        <nav id="main-navigation">
            <a href="<?php echo site_url()?>"><img class="pink-logo logo" src="<?php echo THEME_IMG_PATH; ?>/logo.png" alt="image""></a>
            <ul>
            <li <?php if (get_post_type()=='mec-events') echo 'class="current-page"' ?>><a href="<?php echo site_url('/events') ?>">evenimente</a></li>
            <li <?php if (get_post_type()=='proiecte') echo 'class="current-page"' ?>><a href="<?php echo site_url('/proiecte'); ?>">proiecte</a></li>
            <li <?php if (get_post_type()=='post') echo 'class="current-page"' ?>><a href="<?php echo site_url('/blog') ?>">blog</a></li>
            <li <?php if (get_post_type()=='echipa') echo 'class="current-page"' ?>><a href="<?php echo get_post_type_archive_link('echipa') ?>">echipa</a></li>
            <li><a href="<?php echo site_url('/contact') ?>">contact</a></li>
            <li><a href="https://www.patreon.com/centruldeurbanism">fii patron cu</a></li>
            </ul>
            <div class="search-items">
                <li class="search-box" id="trans-box"><?php get_search_form() ?></li>
                <a class="search-button"><img class="search-btn" src="<?php echo THEME_IMG_PATH; ?>/search.png" alt=""></a>
                <a class="close-button"><img class="close-btn" src="<?php echo THEME_IMG_PATH; ?>/close.png" alt=""></a>
            </div>
          </nav>
    
  </header>