<?php

$curr_search = get_search_query();
$result_cnt = count(get_posts(["s" => $curr_search, "numberposts" => -1]));

get_header("", [
  "type" => "SEARCH",
  "name" => $curr_search,
  "cnt" => $result_cnt,
]);

include_once "templates/loop_posts.php";

get_footer();
