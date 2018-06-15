(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 */
	 $(function() {

	 	math.config({
		  number: 'Fraction'
		});

		var value = $(".br_adjust-recipe-servings").val();
		console.log('Servings:', value);

		var test = math.eval('0.32 + 0.08');
		console.log('test:', math.format(test));

		var a = math.fraction('1 1/8');
		console.log('a:', math.format(a));

		$(".br_adjust-recipe-servings").bind('keyup mouseup', function (e) {

			var new_servings = ($(this).val());
			new_servings = math.number(new_servings);
			console.log('New Servings:', math.format(new_servings));

			var original_servings = $(this).data('original');
			original_servings = math.number(original_servings);
			console.log('Original Servings:', math.format(original_servings));


			$( ".ingredient_quantity" ).each(function( index ) {
			  	console.log( index + ": " + $( this ).text() );

			  	var quantity = $(this).data('original');
			  	console.log('Quantity:', math.format(quantity));

			  	if (!isFinite(quantity)) {
			  		quantity = math.fraction(quantity);

			  		console.log('Quantity Fraction:', math.format(quantity));

			  		var new_quantity = math.eval(new_servings * quantity / original_servings);

			  		//if (!isFinite(new_quantity)) {
				  		console.log('new_quantity:', math.format(new_quantity, {fraction: 'ratio'}));
				  		jQuery(this).text(math.format(new_quantity, {fraction: 'ratio'}));
				  	/*}
				  	else{
				  		console.log('new_quantity:', math.format(new_quantity, {fraction: 'decimal'}));
			  			jQuery(this).text(math.format(new_quantity, {fraction: 'decimal'}));
				  	}*/
			  	}
			  	else{
			  		quantity = math.number(quantity);
				  	console.log('Quantity Number:', math.format(quantity));

				  	var new_quantity = math.eval(new_servings * quantity / original_servings);

				  	/*if (!isFinite(new_quantity)) {
				  		console.log('new_quantity:', math.format(new_quantity, {fraction: 'ratio'}));
				  		jQuery(this).text(math.format(new_quantity, {fraction: 'ratio'}));
				  	}
				  	else{*/
				  		console.log('new_quantity:', math.format(new_quantity, {fraction: 'decimal'}));
			  			jQuery(this).text(math.format(new_quantity, {fraction: 'decimal'}));
				  	//}
			  }

			  	
			});
			
			/*var data = {
			    action: 'adjust_recipe_servings',
			    security : AdjustServings.security,
			    servings: servings
			  };

			  // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			  $.post(AdjustServings.ajaxurl, data, function(response) {
			    console.log(response);
			});*/

	 	});

		var count = 0;
		var checkboxes = 0;
		checkboxes = $('input:checkbox.ingredients_checkcounter').length;
    	console.log("Total checkboxes:", checkboxes);
	 	$('.ingredients_checkcounter').click(function() {
		    var checked = $(this).is(':checked');
		    if(checked){
		    	count++;

		    }
		    if(!checked){
		    	count--;
		    }
		    $('.ingredient_checked').text(count);
		    console.log("ingredient_checked", $('.ingredient_checked' ).text());
		    console.log(checked);
		    console.log(count);

		    var percentage = parseInt(((count / checkboxes) * 100),10);
		    $(".progressbar-bar").progressbar({
		            value: percentage
		        });
		   
		});

		var checked_index = 0;
		var instruction_checkboxes = 0;
		instruction_checkboxes = $('input:checkbox.instructions_checkcounter').length;
    	console.log("Total Instruction checkboxes:", instruction_checkboxes);

	 	$('.instructions_checkcounter').click(function() {
		    var checked = $(this).is(':checked');
		    checked_index = $(this).data('count');
		    console.log("Checked Index:",checked_index);

		    if(checked){

		    	for (var i=0, len=checked_index; i<len; i++) {
		    		console.log("Instruction:", $('.instructions_checkcounter')[i]);
		    		console.log("i:", i);
				    $('.instructions_checkcounter')[i].checked = true;
				}

		    }
		    if(!checked){

		    	for (var i=(checked_index-1), len=instruction_checkboxes; i<len; i++) {
		    		console.log("Instruction:", $('.instructions_checkcounter')[i]);
		    		console.log("i:", i);
				    $('.instructions_checkcounter')[i].checked = false;
				}
				checked_index--;
		    
		    }

		    $('.instructions_checked').text(checked_index);
		    console.log("instructions_checked", $('.instructions_checked' ).text());
		    console.log(checked);

		    var percentage = parseInt(((checked_index / instruction_checkboxes) * 100),10);
		    $(".instruction-progressbar-bar").progressbar({
		            value: percentage
		        });
		   
		});

	 });
	 
	 /* When the window is loaded:
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
