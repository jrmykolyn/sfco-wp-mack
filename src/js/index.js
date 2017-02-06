$( document ).ready( function() {
    // DECLARE VARS
    var arrow = $( '.js--index-hero-arrow' );

    // REGISTER EVENTS
    if ( arrow ) {
        arrow.on( 'click', function() {
            $( 'html, body' ).animate( { scrollTop: window.innerHeight }, 250 );
        } );
    }
} );