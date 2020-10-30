<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="sizing-selector">
    <div class="sizing-select-wrapper">
        <div class="sizing-select">
            <p>Bust</p>
        </div>
    </div>
    <div class="sizing-select-wrapper">
        <div class="sizing-select">
            <p>Shoulders</p>
        </div>
    </div>
    <div class="sizing-select-wrapper">
        <div class="sizing-select">
            <p>Torso</p>
        </div>
    </div>
</div>
<div class="sizing-input">
    <div class="sizing-input-title">
        <h2>How would you classify your torso?</h2>
    </div>
    <div class="sizing-slider">
        <?php

        do_action( 'buttermilk-get-slider' );

        ?>
    </div>
</div>
<?php
