<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="buttermilk-sizing-app">

    <div class="buttermilk-mannequin-container">
        <?php

        do_action( 'buttermilk_load_model' );

        ?>
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
