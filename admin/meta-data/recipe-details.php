<?php
 
/**
 * Provides the 'Recipe Details' view for the corresponding tab in the Post Meta Box.
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin/meta-data
 */

?>
 
<div id="blossom-recipe-tab-recipe-details" class="inside">

    <div>

	    <label for="br-recipe-name">Name</label>
	    <input id="br-recipe-name" placeholder="Recipe Name" type="text">

	</div>

	<div>

		<label for="br-recipe-servings">Servings</label>
		<input min="0" id="br-recipe-servings" placeholder="4" type="number">
		<input id="br-recipe-servings-unit" placeholder="people" type="text">

	</div>

	<div>

		<label for="br-recipe-prep-time">Preparation Time</label>
		<input id="br-recipe-prep-time" placeholder="10" min="0" type="number">minutes		

	</div>

	<div>

		<label for="br-recipe-cook-time">Cook Time</label>
		<input id="br-recipe-cook-time" placeholder="20" min="0" type="number">minutes

	</div>

	<div>
		
		<label for="br-recipe-passive-time">Passive Time</label>
		<input id="br-recipe-passive-time" placeholder="15" min="0" type="number">minutes

	</div>



    


</div>