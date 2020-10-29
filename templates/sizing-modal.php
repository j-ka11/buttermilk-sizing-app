<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="buttermilk sizing-app">
    <div class="buttermilk content">
        <span class="buttermilk close">&times;</span>
        <div class="buttermilk wrapper">

            <div class="buttermilk mannequin-container">
                <p>Hi i'm mannequin</p>
            </div>

            <div class="buttermilk controller-container">
                <div class="buttermilk controller-frame">
                    <p>Hi i'm controller</p>

                    <?php

                    do_action( 'buttermilk_get_controller' );

                    ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php
