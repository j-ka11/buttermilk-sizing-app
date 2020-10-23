function docReady(fn) {
    document.addEventListener( 'DOMContentLoaded', fn, false );
}

( function() {
    docReady( function() {
        var modal = document.getElementById( 'buttermilkSizingModal' );
        var btn = document.getElementsByClassName( 'close' )[0];
        btn.onclick= function() {
            modal.style.display = "none";
        }
    } );
} )();