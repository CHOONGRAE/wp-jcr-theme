<?php
//이미지 처리
add_theme_support("post-thumbnails");

add_filter("intermediate_image_sizes_advanced", "remove_default_image_sizes");

add_image_size("thumb", 150, 130, true);
add_image_size("thumb2", 675, 130, true);

function remove_default_image_sizes($sizes)
{
  $targets = [
    "thumbnail",
    "medium",
    "medium_large",
    "large",
    "1536x1536",
    "2048x2048",
  ];

  foreach (get_intermediate_image_sizes() as $_size) {
    if (in_array($_size, $targets)) {
      unset($sizes[$_size]);
    }
  }

  return $sizes;
}
