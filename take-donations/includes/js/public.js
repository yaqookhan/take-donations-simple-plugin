//console.log( 'take donations public.js worked!' );

(function ($) {
	'use strict';

	$(function() {

		// From https://stripe.com/docs/checkout#integration-custom

		var handler = StripeCheckout.configure({
			key  : 'pk_test_QoXu2YY7fzML1zkYold1hW8x',
			image: '/square-image.png',
			token: function(token) {
				// Use the token to create the charge with a server-side script.
				// You can access the token ID with `token.id`
			}
		});

		$('#customButton').on('click', function(e) {
			// Open Checkout with further options
			handler.open({
				name       : 'Demo Site',
				description: '2 widgets ($20.00)',
				amount     : 2000
			});
			e.preventDefault();
		});

		// Close Checkout on page navigation
		$(window).on('popstate', function() {
			handler.close();
		});

	});

}(jQuery));
