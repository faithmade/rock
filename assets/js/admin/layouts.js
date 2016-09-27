/* global jQuery */
window.wp = window.wp || {};

( function( $ ) {

	$( document ).ready( function() {

		$( 'input[name="rock-layout-override"]' ).change( function() {

			if ( '1' === $( this ).val() ) {

				$( '.rock-layout ul li' )
					.removeClass( 'disabled' )
					.addClass( 'active' )
					.find( 'input' )
					.prop( 'disabled', false );

				return;

			}

			$( '.rock-layout ul li' )
				.addClass('disabled')
				.find(':not(.global)')
				.removeClass( 'active' )
				.addClass( 'disabled' )
				.find( 'input' )
				.prop( 'disabled', true );

			$( '.rock-layout ul li.global input' )
				.prop( 'checked', true );

		} );

	} );

} )( jQuery );
