<?php
//change script type
add_filter("script_loader_tag", "change_type_attribute", 10, 3);

function change_type_attribute($tag, $handle, $src)
{
  $type = wp_scripts()->get_data($handle, "type");
  if ($type && is_string($type)) {
    $tag = preg_replace("/type='.{0,50}'\s/", "type='" . $type . "' ", $tag);
  }
  return $tag;
}

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

    wp_enqueue_script("sidebar", get_theme_file_uri("/js/sidebar.js"));
    wp_scripts()->add_data("sidebar", "type", "module");

    if (is_home()) {
      wp_enqueue_style("home", get_theme_file_uri("/styles/home.css"));
    }

    if (is_search()) {
      wp_enqueue_style("search", get_theme_file_uri("/styles/search.css"));
    }
  }
}