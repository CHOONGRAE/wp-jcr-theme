<?php if ($prev_post || $next_post) { ?>
<section class="prevNext">
    <?php
    if ($prev_post) { ?>
    <article class="prev-post">
        <a href="<?php echo $prev_post_link; ?>">
            <p class='bold'>&lt; Prev</p>
            <div class="post-thumb">
                <p class="fs22 bold">No Img</p>
                <?php if ($prev_post_thumbnail) { ?>
                <img src="<?php echo $prev_post_thumbnail; ?>" alt="prev_post_thumb">
                <?php } ?>
            </div>
            <h4 class="title"><?php echo $prev_post_title; ?></h4>
        </a>
    </article>
    <?php }
    if ($next_post) { ?>
    <article class="next-post">
        <a href="<?php echo $next_post_link; ?>">
            <p class='bold'>Next &gt;</p>
            <div class="post-thumb">
                <p class="fs22 bold">No Img</p>
                <?php if ($next_post_thumbnail) { ?>
                <img src="<?php echo $next_post_thumbnail; ?>" alt="next_post_thumb">
                <?php } ?>
            </div>
            <h4 class="title"><?php echo $next_post_title; ?></h4>
        </a>
    </article>
    <?php }
    } ?>
</section>