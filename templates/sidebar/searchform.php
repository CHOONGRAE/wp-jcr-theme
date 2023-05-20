<?php
$url = esc_url(home_url("/")); ?>
<form id='Searchform' role='search' method='get' action="<?php echo $url; ?>">
    <svg viewbox='0 0 20 20' width='25px' height='25px'>
        <circle cx='8.5' cy='8.5' r='6' stroke='#eee' stroke-width='2.5' fill='transparent' />
        <line x1='13' y1='13' x2='18' y2='18' stroke='#eee' stroke-width='2.5' stroke-linecap='round' />
    </svg>
    <input type="text" placeholder='Search' name='s' autocomplete='off'>
</form>