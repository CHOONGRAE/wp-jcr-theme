<?php

$wp_query->the_post();

$cat = get_the_category_list("<span class='separator'> / </span>", "multiple");
$title = get_the_title();
$date = get_the_date("Y. n. j");
$author = get_the_author();
$avatar = get_avatar(get_the_author_meta("ID"), 26);
$content = preg_replace("/<!--.*-->\n/", "", get_the_content());

get_header("", [
  "cat" => $cat,
  "title" => $title,
  "avatar" => $avatar,
  "author" => $author,
  "date" => $date,
]);

$prev_post = get_previous_post(true);
if ($prev_post) {
  $prev_post_ID = $prev_post->ID;
  $prev_post_link = esc_url(get_the_permalink($prev_post_ID));
  $prev_post_thumbnail = esc_url(
    get_the_post_thumbnail_url($prev_post_ID, "thumb2")
  );
  $prev_post_title = get_the_title($prev_post_ID);
}

$next_post = get_next_post(true);
if ($next_post) {
  $next_post_ID = $next_post->ID;
  $next_post_link = esc_url(get_the_permalink($next_post_ID));
  $next_post_thumbnail = esc_url(
    get_the_post_thumbnail_url($next_post_ID, "thumb2")
  );
  $next_post_title = get_the_title($next_post_ID);
}
?>

<article id='Post'>
    <section class="post-content">
        <?php echo $content; ?>
    </section>
    <?php
    include_once "templates/prev_next_post.php";

    if (comments_open() && shortcode_exists("jcr_comment")) {
      echo do_shortcode("[jcr_comment]");
    }
    ?>
</article>


<?php get_footer("", ["year" => get_the_date("Y")]);
