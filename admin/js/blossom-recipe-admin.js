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

        /**
		 * When Add an ingredient button is clicked, clones the last row elements. 
		 Also provides the proper ID and name attributes so that the information can be serialized.
		 *
		 */

		$('#br_recipe_ingredients tr.br_ingredients:first').find('span.br_ingredients_delete').hide();
    	$('#br_recipe_instructions tr.br_instructions:first').find('span.br_instructions_delete').hide();

        $('#br-add-ingredients').on('click', function(e){
	        e.preventDefault();
	        addIngredient();
    	});

    	/**
		 * When Add an instruction button is clicked, clones the last row elements. 
		 Also provides the proper ID and name attributes so that the information can be serialized.
		 *
		 */

        $('#br-add-instructions').on('click', function(e){
	        e.preventDefault();
	        addInstruction();
    	});

		$('.br_instructions_add_image').on('click', function(e) {

			e.preventDefault();

			var button = jQuery(this);

	        var image = button.siblings('.br_instructions_image');
	        var preview = button.siblings('.br_instructions_thumbnail');
 
		    var br_send_attachment = wp.media.editor.send.attachment;
		 
		    wp.media.editor.send.attachment = function(props, attachment) {
		 
		        jQuery(image).val(attachment.id).trigger('change');
				jQuery(preview).attr('src',attachment.url);
		        wp.media.editor.send.attachment = br_send_attachment;
	    	}
	 
		    wp.media.editor.open();
		 
		    return false;
		
		});

		$('.br_instructions_remove_image').on('click', function(e) {
	        e.preventDefault();

	        var button = jQuery(this);

	        button.siblings('.br_instructions_image').val('').trigger('change');
	        button.siblings('.br_instructions_thumbnail').attr('src', '');
    	});

    	$('.br_instructions_delete').on('click', function(){

	        jQuery(this).parents('tr').remove();

	    });

	    $('.br_ingredients_delete').on('click', function(){
        	
        	jQuery(this).parents('tr').remove();
      
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

function addIngredient()
{
        var no_ingredients = jQuery('#br_recipe_ingredients tr.br_ingredients').length;
        var last_row = jQuery('#br_recipe_ingredients tr:last');
        var last_ingredient = jQuery('#br_recipe_ingredients tr.br_ingredients:last');

        last_ingredient.find('input').attr('placeholder','');
        var clone_ingredient = last_ingredient.clone(true);

        clone_ingredient
            .insertAfter(last_row)
            .find('input, select').val('')
            .attr('name', function(index, name) {
                return name.replace(/(\d+)/, no_ingredients);
            })
            .attr('id', function(index, id) {
                return id.replace(/(\d+)/, no_ingredients);
            });

        clone_ingredient.find('span.br_ingredients_delete').show();
             
        jQuery('#br_recipe_ingredients tr:last .br_ingredients_quantity').focus();
}

function addInstruction()
{
        var no_instructions = jQuery('#br_recipe_instructions tr.br_instructions').length;
        var last_row = jQuery('#br_recipe_instructions tr:last');
        var last_instruction = jQuery('#br_recipe_instructions tr.br_instructions:last');

        last_instruction.find('input').attr('placeholder','');
        var clone_instruction = last_instruction.clone(true);

        clone_instruction
            .insertAfter(last_row)
            .find('textarea').val('')
            .attr('name', function(index, name) {
                return name.replace(/(\d+)/, no_instructions);
            })
            .attr('id', function(index, id) {
                return id.replace(/(\d+)/, no_instructions);
            });

        clone_instruction
            .find('.br_instructions_image').val('')

        clone_instruction
            .find('.br_instructions_thumbnail').attr('src', '')

        clone_instruction
            .find('.br_instructions_image')
            .attr('name', function(index, name) {
                return name.replace(/(\d+)/, no_instructions);
            });

        
        clone_instruction.find('span.br_instructions_delete').show();  
           
        jQuery('#br_recipe_instructions tr:last .br_instructions_description').focus();
}