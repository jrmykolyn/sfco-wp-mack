$( document ).ready( function() {
    var nav = $( '.js--supporting-nav' );
    var activeClass = 'is-active';

    var scrollThreshold = 150;
    var prevScrollPos = 0;

    var scrollTimeout = null;
    var throttleDur = 100;

    // EVENTS
    $( window ).on( 'scroll', function( e ) {

        // Throttle scroll-related logic.
        if ( !scrollTimeout ) {

            scrollTimeout = setTimeout( function() {
                scrollTimeout = null;
                currScrollPos = window.pageYOffset;

                if ( ( currScrollPos > scrollThreshold ) && ( currScrollPos < prevScrollPos ) ) {
                    if ( !nav.hasClass( activeClass ) ) {
                        nav.addClass( activeClass );
                    }
                } else {
                    if ( nav.hasClass( activeClass ) ) {
                        nav.removeClass( activeClass );
                    }
                }

                // Update previous scroll position.
                prevScrollPos = currScrollPos;
            }, throttleDur );
        }
    } ); // 'scroll' handler
} );