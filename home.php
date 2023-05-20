<?php
get_header();

$className = "recent-posts";
$listTitle = "<h2 class='title fs22'>최신글</h2>";

$wp_query = new WP_Query(["cat" => 0, "showposts" => 5]);

include_once "templates/loop_posts.php";

get_footer();

?>
