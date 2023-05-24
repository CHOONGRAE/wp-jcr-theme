<?php

$curr_cat = get_queried_object();
$curr_cat_cnt = count(
  get_posts(["category" => $curr_cat->term_id, "numberposts" => -1])
);

get_header("", [
  "type" => "CATEGORY",
  "name" => $curr_cat->name,
  "cnt" => $curr_cat_cnt,
]);

include_once "templates/loop_posts.php";

get_footer();
