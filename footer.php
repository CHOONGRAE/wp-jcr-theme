<?php
$year = get_the_date("Y"); ?>

</main>

<footer id='Site-footer'>
    <p class='fs12'>&lt; Copyright <?php echo $args
      ? $args["year"]
      : $year; ?>.</p>
    <p class='fs12'>여긔.</p>
    <p class='fs12'>All right reserved. &gt;</p>
</footer>

<?php wp_footer(); ?>
</body>

</html>