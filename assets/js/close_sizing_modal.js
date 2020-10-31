function docReady(fn) {
    document.addEventListener( 'DOMContentLoaded', fn, false );
}

( function() {
    docReady( function() {
        var modal = document.querySelector( '.buttermilk-modal' );
        var btn = document.querySelector( '.buttermilk-close' );
        btn.onclick= function() {
            modal.style.display = "none";
        }
    } );
} )();
