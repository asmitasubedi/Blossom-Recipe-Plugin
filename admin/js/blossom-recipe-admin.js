(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 */
	 $(function() {
	 	// Grab the wrapper for the Navigation Tabs
        var navTabs = $( '#blossom-recipe-navigation').children( '.nav-tab-wrapper' ),
            tabIndex = null;
 
        /* Whenever each of the navigation tabs is clicked, check to see if it has the 'nav-tab-active'
         * class name. If not, then mark it as active; otherwise, don't do anything (as it's already
         * marked as active.
         *
         * Next, when a new tab is marked as active, the corresponding child view needs to be marked
         * as visible. We do this by toggling the 'hidden' class attribute of the corresponding variables.
         */
        navTabs.children().each(function() {
 
            $( this ).on( 'click', function( evt ) {

                evt.preventDefault();
 
                // If this tab is not active...
                if ( ! $( this ).hasClass( 'nav-tab-active' ) ) {
 
                    // Unmark the current tab and mark the new one as active
                    $( '.nav-tab-active' ).removeClass( 'nav-tab-active' );
                    $( this ).addClass( 'nav-tab-active' );
 
                    // Save the index of the tab that's just been marked as active. It will be 0 - 3.
                    tabIndex = $( this ).index();
 
                    // Hide the old active content
                    $( '#blossom-recipe-navigation' )
                        .children( 'div:not( .inside.hidden )' )
                        .addClass( 'hidden' );
 
                    $( '#blossom-recipe-navigation' )
                        .children( 'div:nth-child(' + ( tabIndex ) + ')' )
                        .addClass( 'hidden' );
 
                    // And display the new content
                    $( '#blossom-recipe-navigation' )
                        .children( 'div:nth-child( ' + ( tabIndex + 2 ) + ')' )
                        .removeClass( 'hidden' );
 
 
                }
 
 
            });
        });

	 });

	 /**
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );
