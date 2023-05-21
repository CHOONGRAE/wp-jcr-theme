<?php

//enqueue assets
add_action("wp_enqueue_scripts", "my_theme_assets");

function my_theme_assets()
{
  wp_enqueue_style("global", get_stylesheet_uri());

  if (
    is_home() ||
    is_category() ||
    is_search() ||
    is_archive() ||
    is_single()
  ) {
    wp_enqueue_style("header", get_theme_file_uri("/styles/header.css"));
    wp_enqueue_style("footer", get_theme_file_uri("/styles/footer.css"));
    wp_enqueue_style("sidebar", get_theme_file_uri("/styles/sidebar.css"));
  }
}
