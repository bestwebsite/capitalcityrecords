/**
 *  Reset theme mods button
 */
 /* global SnakepitAdminParams,
 confirm, console */
;( function( $ ) {

	'use strict';

	var $container = $( '#customize-header-actions' ),
		$button = $( '<button id="snakepit-mods-reset" class="button-secondary button">' )
		.text( SnakepitAdminParams.resetModsText )
		.css( {
		'float': 'right',
		'margin-right': '10px',
		'margin-left': '10px'
	} );

	$button.on( 'click', function ( event ) {

		event.preventDefault();

		var r = confirm( SnakepitAdminParams.confirm ),
			data = {
				wp_customize: 'on',
				action: 'snakepit_ajax_customizer_reset',
				nonce: SnakepitAdminParams.nonce.reset
			};

		if ( ! r ) {
			return;
		}

		$button.attr( 'disabled', 'disabled' );

		$.post( SnakepitAdminParams.ajaxUrl, data, function ( response ) {

			if ( 'OK' === response ) {
				wp.customize.state( 'saved' ).set( true );
				location.reload();
			} else {
				$button.removeAttr( 'disabled' );
				console.log( response );
			}
		} );
	} );

	$button.insertAfter( $container.find( '.button-primary.save' ) );
} )( jQuery );