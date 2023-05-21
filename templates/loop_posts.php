<section id='List' <?php echo isset($className)
  ? "class='" . $className . "'"
  : ""; ?>>
    <?php
    if (isset($listTitle)) {
      echo $listTitle;
    }
    $cnt = 0;

    while (have_posts()) {

      the_post();

      $cat = get_the_category_list(
        "<span class='separator'> / </span>",
        "multiple"
      );
      $date = get_the_date("Y. n. j");
      ?>

    <article class="post<?php echo $cnt == 0 ? " first" : ""; ?>">
        <p class="post-info">
            <span class="category fs15"><?php echo $cat; ?></span>
            <span class="date fs15"><?php echo $date; ?></span>
        </p>
        <a href="<?php the_permalink(); ?>">
            <div class="post-thumb">
                <p class='fs22 bold'>No Img</p>
                <?php if (has_post_thumbnail()) { ?>
                <img src='<?php the_post_thumbnail_url(
                  isset($listTitle) ? "thumb2" : "thumb"
                ); ?>'>
                <?php } ?>
            </div>
            <div class="post-summary">
                <h3 class='fs22'><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
            </div>
        </a>
    </article>

    <?php $cnt += 1;
    }
    ?>
</section>

<?php if (empty($className) && empty($listTitle)) {
  $paged = get_query_var("paged") ? get_query_var("paged") : 1;
  $links = paginate_links([
    "prev_text" => __("< Prev"),
    "next_text" => __("Next >"),
    "current" => $paged,
  ]);

  if ($links) { ?>

<section id='Pagination'>
    <nav>
        <?php echo $links; ?>
    </nav>
</section>

<?php }
} ?>
