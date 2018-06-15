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

	<?php $details = get_post_meta( get_the_ID(), 'br_recipe', true ); 

	if(isset($details['details'])) 
	{
			print_r($details['details']);
	}?>
	
    <div>

	    <label for="br_recipe_name">Name</label>
	    <input id="br_recipe_name" name="br_recipe[details][name]" placeholder="Recipe Name" type="text" value="<?php echo isset( $details['details']['name'] ) ? esc_attr($details['details']['name']) : '' ;?>">

	</div>

	<div>

		<label for="br_recipe_servings">Servings</label>
		<input min="0" id="br_recipe_servings" name="br_recipe[details][servings]" placeholder="4" type="number" value="<?php echo isset ( $details['details']['servings'] ) ? esc_attr($details['details']['servings']) : '' ;?>">

		<input id="br_recipe_servings_unit" name="br_recipe[details][servings_unit]" placeholder="people" type="text" value="<?php echo isset ( $details['details']['servings_unit'] ) ? esc_attr($details['details']['servings_unit']) : '' ;?>">

	</div>

	<div>

		<label for="br_recipe_prep_time">Preparation Time</label>
		<input id="br_recipe_prep_time" name="br_recipe[details][prep_time]" placeholder="10" min="0" type="number" value="<?php echo isset ( $details['details']['prep_time'] ) ? esc_attr($details['details']['prep_time']) : '' ;?>">minutes		

	</div>

	<div>

		<label for="br_recipe_cook_time">Cook Time</label>
		<input id="br_recipe_cook_time" name="br_recipe[details][cook_time]" placeholder="20" min="0" type="number" value="<?php echo isset ($details['details']['cook_time']) ? esc_attr($details['details']['cook_time']) : '' ;?>">minutes

	</div>

	<div>
		
		<label for="br_recipe_passive_time">Passive Time</label>
		<input id="br_recipe_passive_time" name="br_recipe[details][passive_time]" placeholder="15" min="0" type="number" value="<?php echo isset ($details['details']['passive_time']) ? esc_attr($details['details']['passive_time']) : '' ;?>">minutes

	</div>
 
</div>