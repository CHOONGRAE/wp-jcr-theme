<?php

function is_current($id)
{
  $curr = get_queried_object_id();
  if (is_category()) {
    if ($id == $curr) {
      return "curr";
    }
    return "";
  }

  if (is_single()) {
    $curr = get_the_category($curr)[0]->term_id;
    if ($id == $curr) {
      return "curr";
    }
    return "";
  }
}

function make_className($have_children, $is_current)
{
  $result = "";
  if ($have_children) {
    $result = $result . "have-sub-cat open";
  }
  if ($is_current) {
    if ($result) {
      $result = $result . " ";
    }
    $result = $result . $is_current;
  }
  return $result;
}

function icon_category()
{
  ?>

<svg viewBox='0 0 20 20' width="25px" height="25px">
    <circle cx='3' cy='3.5' r='2' fill='#999' />
    <line x1='7.5' y1='3.5' x2='17.5' y2='3.5' stroke='#999' stroke-width='2.5' stroke-linecap='round' />
    <circle cx='3' cy='10' r='2' fill='#999' />
    <line x1='7.5' y1='10' x2='17.5' y2='10' stroke='#999' stroke-width='2.5' stroke-linecap='round' />
    <circle cx='3' cy='16.5' r='2' fill='#999' />
    <line x1='7.5' y1='16.5' x2='17.5' y2='16.5' stroke='#999' stroke-width='2.5' stroke-linecap='round' />
</svg>

<?php
}

function icon_expand()
{
  ?>

<svg viewBox='0 0 20 20' width="25px" height="25px">
    <path d='M5.5 10 L14.5 2.5 L14.5 17.5 Z' stroke='#999' fill='#999' stroke-linejoin='round' />
</svg>

<?php
}

function makeList($cat)
{
  foreach ($cat as $_cat) {

    $term_id = $_cat->term_id;

    $slug = $_cat->slug;

    $name = $_cat->name;

    $cat_cnt = count(
      get_posts([
        "category" => $term_id,
        "numberposts" => -1,
      ])
    );

    $sub_cat = get_categories([
      "parent" => $term_id,
      "hide_empty" => 0,
    ]);

    $sub_cat_cnt = count($sub_cat);

    $className = make_className($sub_cat_cnt, is_current($term_id));

    $link = esc_url(get_category_link($term_id));

    $alt = esc_attr($slug);
    ?>

<li class="<?php echo $className; ?>" data-name="<?php echo $name; ?>">
    <a href="<?php echo $link; ?>" alt="<?php echo $alt; ?>">
        <div class="item">

            <?php icon_category(); ?>

            <p>
                <?php echo $name; ?>
                <span class="cnt">[<?php echo $cat_cnt; ?>]</span>
            </p>

            <?php if ($sub_cat_cnt) { ?>

            <div class="state">
                <p class="all">&nbsp;- 모두 보기</p>
                <?php icon_expand(); ?>
            </div>

            <?php } ?>

        </div>
    </a>

    <?php if ($sub_cat_cnt) {
      usort($sub_cat, "sortByDate"); ?>

    <ul class="sub-cat">

        <?php makeList($sub_cat); ?>

    </ul>

    <?php
    } ?>
</li>

<?php
  }
}

function sortByDate($cat1, $cat2)
{
  $post1 = get_posts([
    "category" => $cat1->term_id,
    "numberposts" => 1,
  ]);

  $date1 = $post1 ? $post1[0]->post_date : 0;

  $post2 = get_posts([
    "category" => $cat2->term_id,
    "numberposts" => 1,
  ]);

  $date2 = $post2 ? $post2[0]->post_date : 0;

  if ($date1 === $date2) {
    return 0;
  }

  return $date1 < $date2 ? 1 : -1;
}

$cat = get_categories([
  "parent" => 0,
  "hide_empty" => 0,
]);

usort($cat, "sortByDate");
?>

<nav class="categories">
    <ul class="cat-list">
        <?php makeList($cat); ?>
    </ul>
</nav>