<?php
 
/**
 * Provides the 'Recipe Ingredients & Information' view for the corresponding tab in the Post Meta Box.
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin/meta-data
 */

?>
 
<div id=""blossom-recipe-tab-recipe-ingredients-instructions" class="inside hidden">
    <p>This is where the Recipe Ingredients and Instructions content will reside.</p>

    <div class="br-recipe-ingredients">

    	<table>

    		<thead>
    			<tr>
    				<th>Quantity</th>
    				<th>Unit</th>
    				<th>Ingredient</th>
    				<th>Notes</th>
    			</tr>

    		</thead>

    		<tbody>

    			<tr class="br-recipe-ingredient">

	    			<td>

	    				<input name="br_recipe_ingredients[0][quantity]" class="ingredients_quantity" id="ingredients_quantity_0" placeholder="" type="text">

	    			</td>

	    				<input name="br_recipe_ingredients[0][unit]" class="ingredients_unit" id="ingredients_unit_0" placeholder="" type="text">

	    			<td>

	    			</td>

	    			<td>

	    			</td>

	    			<td>

	    			</td>
	    		</tr>

    		</tbody>

    	</table>

    	<div id="add-ingredients-box"> 

    		<a href="#" id="add-ingredients">Add an ingredient</a>

    	</div>

    </div>
</div>