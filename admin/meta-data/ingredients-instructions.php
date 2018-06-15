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
 
<div id="blossom-recipe-tab-recipe-ingredients-instructions" class="inside hidden">
    

    <div id="br-recipe-ingredients">

    	<h4>Ingredients</h4>

        <?php $ingredients= get_post_meta( get_the_ID(), 'br_recipe', true ); 
        
        if(isset($ingredients['ingredient'])) 
        {
                print_r($ingredients['ingredient']);
        }?>
        
    	<table id="br_recipe_ingredients">

    		<thead>
    			<tr>
    				<th>Quantity</th>
    				<th>Unit</th>
    				<th>Ingredient</th>
    				<th>Notes</th>
    			</tr>

    		</thead>

    		<tbody>

                <?php
                $count=0;

                if(isset($ingredients['ingredient'])) {
                
                    foreach( $ingredients['ingredient'] as $ingredient ) {

                ?>
                               

    			<tr class="br_ingredients">

	    			<td>

	    				<input name="br_recipe[ingredient][<?php echo $count; ?>][quantity]" class="br_ingredients_quantity" id="br_ingredients_quantity_<?php echo $count; ?>" placeholder="1" type="text" value="<?php echo isset ($ingredient['quantity'] ) ? esc_attr( $ingredient['quantity'] ) : '' ; ?>">

	    			</td>

	    			<td>

	    				<input name="br_recipe[ingredient][<?php echo $count; ?>][unit]" class="br_ingredients_unit" id="br_ingredients_unit_<?php echo $count; ?>" placeholder="tblspn" type="text" value="<?php echo isset ( $ingredient['unit'] ) ? esc_attr( $ingredient['unit'] ) : '' ; ?>">

	    			</td>

	    			<td>

	    				<input name="br_recipe[ingredient][<?php echo $count; ?>][ingredient]" class="br_ingredients_name" id="br_ingredients_name_<?php echo $count; ?>" placeholder="oil" type="text" value="<?php echo isset($ingredient['ingredient']) ? esc_attr( $ingredient['ingredient'] ) : '' ; ?>">

	    			</td>

	    			<td>
	    				
	    				<input name="br_recipe[ingredient][<?php echo $count; ?>][notes]" class="br_ingredients_notes" id="br_ingredient_notes_<?php echo $count; ?>" placeholder="" type="text" value="<?php echo isset($ingredient['notes']) ? esc_attr( $ingredient['notes'] ) : '' ; ?>">

	    			</td>

                    <td>

                        <span class="br_ingredients_delete">
                            <img src="<?php echo BLOSSOM_RECIPE_URL?>./admin/images/delete.png" width="16" height="16">
                        </span>

                    </td>

	    		</tr>
                <?php $count++;
                
                }
            }

            else{ ?>

                <tr class="br_ingredients">

                    <td>

                        <input name="br_recipe[ingredient][<?php echo $count; ?>][quantity]" class="br_ingredients_quantity" id="br_ingredients_quantity_<?php echo $count; ?>" placeholder="1" type="text" value="">

                    </td>

                    <td>

                        <input name="br_recipe[ingredient][<?php echo $count; ?>][unit]" class="br_ingredients_unit" id="br_ingredients_unit_<?php echo $count; ?>" placeholder="tblspn" type="text" value="">

                    </td>

                    <td>

                        <input name="br_recipe[ingredient][<?php echo $count; ?>][ingredient]" class="br_ingredients_name" id="br_ingredients_name_<?php echo $count; ?>" placeholder="oil" type="text" value="">

                    </td>

                    <td>
                        
                        <input name="br_recipe[ingredient][<?php echo $count; ?>][notes]" class="br_ingredients_notes" id="br_ingredient_notes_<?php echo $count; ?>" placeholder="" type="text" value="">

                    </td>

                    <td>

                        <span class="br_ingredients_delete">
                            <img src="<?php echo BLOSSOM_RECIPE_URL?>./admin/images/delete.png" width="16" height="16">
                        </span>

                    </td>

                </tr>
            <?php }

            ?>

    		</tbody>

    	</table>

    	<div id="br-add-ingredients-box"> 

    		<a href="#" id="br-add-ingredients">Add an ingredient</a>

    	</div>

    </div>

    <div id="br-recipe-instructions">

    	<h4>Instructions</h4>

        <?php $instructions= get_post_meta( get_the_ID(), 'br_recipe', true );

        if(isset($instructions['instructions'])) 
        {
                print_r($instructions['instructions']);
        }?> 

    	<table id="br_recipe_instructions">

    		<thead>
    			<tr>
    				<th>Instruction</th>
    				<th>Image</th>
    			</tr>

    		</thead>

    		<tbody>

                <?php
                $count=0;

                if(isset($instructions['instructions'])) {
                
                    foreach( $instructions['instructions'] as $instruction ) {

                ?>

    			<tr class="br_instructions">

	    			<td>

	    				<textarea name="br_recipe[instructions][<?php echo $count; ?>][description]" rows="4" id="br_instructions_description_<?php echo $count; ?>" class="br_instructions_description"><?php echo isset ($instruction['description']) ? esc_attr( $instruction['description'] ) : ''; ?></textarea>

	 	    		</td>

	    			<td>

						    <?php $image = wp_get_attachment_image_src( $instruction['image'], 'thumbnail' );?>

                            <input name="br_recipe[instructions][<?php echo $count; ?>][image]" class="br_instructions_image" type="hidden" value="<?php echo isset($instruction['image']) ? $instruction['image'] : ''; ?>" />
	                    
	                    	<input class="br_instructions_add_image" type="button" value="<?php _e( 'Add Image', 'blossom-recipe' ) ?>" />

	                    	<input class="br_instructions_remove_image" type="button" value="<?php _e( 'Remove Image', 'blossom-recipe' ) ?>" />

	                    	<br /><img src="<?php echo isset($image) ? $image[0] : ''; ?>" class="br_instructions_thumbnail" height="64" width="64"/>

	    			</td>

                    <td>

                        <span class="br_instructions_delete">
                            <img src="<?php echo BLOSSOM_RECIPE_URL?>./admin/images/delete.png" width="16" height="16">
                        </span>

                    </td>

		   		</tr>

                <?php $count++;
                
                } 
            }

                else { ?>

                    <tr class="br_instructions">

                    <td>

                        <textarea name="br_recipe[instructions][<?php echo $count; ?>][description]" rows="4" id="br_instructions_description_<?php echo $count; ?>" class="br_instructions_description"></textarea>

                    </td>

                    <td>

                            <input name="br_recipe[instructions][<?php echo $count; ?>][image]" class="br_instructions_image" type="hidden" value="" />
                        
                            <input class="br_instructions_add_image" type="button" value="<?php _e( 'Add Image', 'blossom-recipe' ) ?>" />

                            <input class="br_instructions_remove_image" type="button" value="<?php _e( 'Remove Image', 'blossom-recipe' ) ?>" />

                            <br /><img src="" class="br_instructions_thumbnail" height="64" width="64"/>

                    </td>

                    <td>

                        <span class="br_instructions_delete">
                            <img src="<?php echo BLOSSOM_RECIPE_URL?>./admin/images/delete.png" width="16" height="16">
                        </span>

                    </td>

                </tr>

                <?php } ?>



    		</tbody>

    	</table>

    	<div id="br-add-instructions-box"> 

    		<a href="#" id="br-add-instructions">Add an instruction</a>

    	</div>

    </div>
</div>

