function docReady(fn) {
    document.addEventListener( 'DOMContentLoaded', fn, false );
}

( function() {
    docReady( function() {
        var slider = document.querySelector( '.buttermilk .slider-input' );
        console.log(slider.value);

        slider.oninput = function() {
            console.log(this.value);
        }
    } );
} )();
