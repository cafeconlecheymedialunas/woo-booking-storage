(function( $ ) {
	'use strict';


	$("#step-one-form").on("submit",function(e){
		e.preventDefault()
		console.log(e.target)
	})
	console.log("Holas")
})( jQuery );
