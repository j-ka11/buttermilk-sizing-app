<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="buttermilk-sizing-app">

    <div class="buttermilk-mannequin-container">
        <p>Hi i'm mannequin</p>
    </div>

    <div class="buttermilk-controller-container">
        <div class="controller-frame">
            <?php

            do_action( 'buttermilk_get_controller' );

            ?>
        </div>
    </div>

</div>
<?php
