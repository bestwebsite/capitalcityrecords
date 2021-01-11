/**
 *  Searchable dropdown
 */
 /* global SnakepitAdminParams */
;( function( $ ) {

	'use strict';

	$( '.snakepit-searchable' ).chosen( {
		no_results_text: SnakepitAdminParams.noResult,
		width: '100%'
	} );

	$( document ).on( 'hover', '#menu-to-edit .pending', function() {
		if ( ! $( this ).find( '.chosen-container' ).length && $( this ).find( '.snakepit-searchable' ).length ) {
			$( this ).find( '.snakepit-searchable' ).chosen( {
				no_results_text: SnakepitAdminParams.noResult,
				width: '100%'
			} );
		}
	} );

} )( jQuery );