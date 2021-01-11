/*!
 * Vimeo
 *
 * Snakepit 1.2.7
 */
/* jshint -W062 */

/* global Vimeo */
var SnakepitVimeo = function( $ ) {

	'use strict';

	return {

		/**
		 * Init UI
		 */
		init : function () {
			$( '.vimeo-bg' ).each( function() {
				var iframe = $( this )[0],
					player = new Vimeo.Player( iframe );
				
				player.setVolume( 0 );
			} );
		}
	};

}( jQuery );

( function( $ ) {

	'use strict';

	$( document ).ready( function() {
		SnakepitVimeo.init();
	} );

} )( jQuery );