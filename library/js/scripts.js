/* ==================
 * Contents
 * ================== */
/* ==================
 * 1. Upfront Scripts
 */

/* ==================
 * Responsive Script */
// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {


    /*$('.book').each(function() {

        var book = $(this),
            isbn = book.data('isbn');

        $.getJSON('https://www.googleapis.com/books/v1/volumes?q=isbn:' + isbn + '&key=AIzaSyDJryVZGwUhNscwwHO2Xq-JT-PdPGLrQ84&country=US', function( data ) {
            $.each( data.items, function( i, item ) {
            var cover    = item.volumeInfo.imageLinks.thumbnail;
            book.find('.cover > img').attr('src', cover);
          });
        });

      });*/

    /* ==================
     * Load Spotlight */
     get_spotlight = function() {

        $('[data-spotlight]').each(function() {

            var el                  =   $(this),
                audience            =   el.data( 'audience' ),
                postNo              =   el.data('post'),
                type                =   el.data('spotlight'),
                baseAPI             =   'http://sherman2.library.nova.edu/sites/spotlight/api/taxonomy/get_taxonomy_posts/?taxonomy=library-audience&callback=?',

                // placeholders
                api, category, markup;

            // Who is the audience?
            baseAPI = baseAPI + '&slug=' + ( audience ? audience : 'public' );


            if ( type === 'database' ) {

                api = baseAPI + '&post_type=spotlight_databases';
            } 

            else if ( type === 'event' ) {

                api = baseAPI + '&post_type=spotlight_events';

            }

            $.getJSON( api )
                .success( function( response ) {

                    var count = 0;

                    $.each( response.posts, function( i, post ) {

                        if ( type === 'event' ) {

                            if ( post.custom_fields['overlay_title'][0] && post.custom_fields['is_feature'][0] == 'No' ) {

                                count++;

                                if ( count == postNo ) {

                                    markup = '<section class="force-ratio shadow" style="overflow: hidden; background-image: url(' + post.thumbnail_images['media-medium']['url'] + '); background-size: 100%;">';
                                    markup +=  '<div class="promotion" style="background-color: #4b5971; margin-top: 28%; color:white; padding: .5em 0; border-top: 2px solid white;">';
                                    markup += '<header class="wrap">';
                                    markup += '<h3 class="epsilon no-margin" style="color: white;">' + post.title + '</h3>';
                                    markup += '<time class="zeta no-margin"> Now through December 1st </time>';
                                    markup += '</header>';
                                    markup += '<div class="description wrap zeta" style="font-size: .9em; line-height: 1;">';
                                    markup += 'Sauce piquante remoulade mirliton bread pudding cayenne alligator etoufee cayenne.';
                                    markup += '</div>';
                                    markup += '</div>';
                                    markup += '</section>';
                                }

                            }
                        }

                        else if ( type === 'database' ) {

                            count++;

                            if ( count == postNo ) {
                                //console.log( post.thumbnail_images['media-medium']['url'] );
                                markup = '<img src=' + post.thumbnail_images['media-medium']['url'] + '>';
                            }
                        }

                    });

                    el.html( markup );

                });
        });
    }

    get_spotlight();

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it so, be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();

    

}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );

