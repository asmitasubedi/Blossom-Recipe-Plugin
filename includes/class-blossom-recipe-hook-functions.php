<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The template loader of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin
 * @author     Blossom <test@test.com>
 */
class Blossom_Recipe_Hook_Functions {

	/**
	 * Hook in methods.
	 */
	public function __construct() {

		add_action( 'br_recipe_details_action', array( $this, 'br_recipe_details' ) );
		add_action( 'br_recipe_ingredients_action', array( $this, 'br_recipe_ingredients' ) );
		add_action( 'br_recipe_instructions_action', array( $this, 'br_recipe_instructions' ) );
		add_action( 'br_recipe_notes_action', array( $this, 'br_recipe_notes' ) );

		//add AJAX action for all users (logged in as well as non users)
		add_action( 'wp_ajax_nopriv_adjust_recipe_servings', array( $this, 'adjust_recipe_servings' ));
		add_action( 'wp_ajax_adjust_recipe_servings', array( $this, 'adjust_recipe_servings' ));

		
	}

	function br_recipe_details()
	{ ?>
		<div id="br-recipe-details">
            <?php

            if ( empty( $post_id ) ) {
				global $post;
				$post_id = $post->ID;
			}

			$details = get_post_meta( $post_id, 'br_recipe', true ); 

			if(isset($details['details']) && ($details['details']['servings']!='')) 
			{
					?>
					<h4><?php _e( $details['details']['name'], 'blossom-recipe' ) ?></h4>
					
					<div id="br_recipe_servings">
						<?php _e( 'Yield:', 'blossom-recipe' ) ?>

						<?php echo '<span class="recipe_servings">' . esc_html( $details['details']['servings']) . '</span>';

						echo '<span class="recipe_servings_unit">' . esc_html( $details['details']['servings_unit'] ) . '</span>';					
					?></div>

					<div id="br_recipe_prep_time">
						<?php _e( 'Prep Time:', 'blossom-recipe' ) ?>

						<?php echo '<span class="recipe_prep_time">' . esc_html( $details['details']['prep_time'] ) . '</span>';

						echo '<span class="min">' . _e( 'Mins', 'blossom-recipe' ) .'</span>';
					?></div>

					<div id="br_recipe_cook_time">
						<?php _e( 'Cook Time:', 'blossom-recipe' ) ?>

						<?php echo '<span class="recipe_cook_time">' . esc_html( $details['details']['cook_time'] ) . '</span>';

						echo '<span class="min">' . _e( 'Mins', 'blossom-recipe' ) .'</span>';
					?></div>

					<div id="br_recipe_passive_time">
						<?php _e( 'Passive Time:', 'blossom-recipe' ) ?>

						<?php echo '<span class="recipe_passive_time">' . esc_html( $details['details']['passive_time'] ) . '</span>';

						echo '<span class="min">' . _e( 'Mins', 'blossom-recipe' ) .'</span>';
					?></div>

		<?php }
			?>
		</div>
		<?php
	}

	function br_recipe_ingredients()
	{ ?>
		<div id="br-recipe-ingredients">
            <?php

            if ( empty( $post_id ) ) {
				global $post;
				$post_id = $post->ID;
			}

			$ingredients= get_post_meta( $post_id, 'br_recipe', true );
			$ingredients['details']['servings'];

			if(isset($ingredients['ingredient'])) 
			{
				$total_ingredients = count($ingredients['ingredient']);
				?>
				<h4><?php _e( 'Ingredients', 'blossom-recipe' ) ?></h4>

				<div id="br_ingredients_counter">
					<?php echo '<span class="ingredient_checked">0</span>';
					echo '<span class="slash">' . _e( '/', 'blossom-recipe' ) .'</span>';
					echo '<span class="ingredient_total">' . esc_html( $total_ingredients) .'</span>';
					echo '<span class="ingre">' . _e( ' Ingredients', 'blossom-recipe' ) .'</span>';
					?>
				</div>

				<div class="progressbar-container">
				  <div class="progressbar-bar"></div>
				</div>

				<div id="adjust_recipe_servings">

						<?php _e( 'Adjust Servings:', 'blossom-recipe' ) ?>

						<input min="1" class="br_adjust-recipe-servings" data-original="<?php echo esc_attr($ingredients['details']['servings']);?>" value="<?php echo esc_attr($ingredients['details']['servings']);?>" type="number" style="width:40px !important;padding:2px !important;background:white !important;border:1px solid #bbbbbb !important;">

						<?php echo '<span class="recipe_servings_unit">' . esc_html( $ingredients['details']['servings_unit'] ) . '</span>';	

				?></div>

				<div>

				<ul style="list-style-type:none">
				<?php 
					foreach( $ingredients['ingredient'] as $ingredient ) {

	                ?>
	                	<li>
						 <input type="checkbox" class="ingredients_checkcounter">
							<?php echo '<span class="ingredient_quantity" data-original="'.esc_html( $ingredient['quantity']).'">' . esc_html( $ingredient['quantity']) .'</span>';

							echo '<span class="ingredient_unit">' . esc_html($ingredient['unit']). '</span>';

							echo '<span class="ingredient_name">' . esc_html($ingredient['ingredient']). '</span>';
							
							echo '<span class="ingredient_note">' . esc_html($ingredient['notes']). '</span>';	
							?>
						</li>
					<?php }
				?></ul>
				</div>
			<?php }
			?>
		</div>
		<?php
	}

	function br_recipe_instructions()
	{ ?>
		<div id="br-recipe-instructions">
            <?php

            if ( empty( $post_id ) ) {
				global $post;
				$post_id = $post->ID;
			}

			$instructions= get_post_meta( $post_id, 'br_recipe', true );
			

			if(isset($instructions['instructions'])) 
			{
				$total_instructions = count($instructions['instructions']);

				?>
				<h4><?php _e( 'Instructions', 'blossom-recipe' ) ?></h4>

				<div id="br_instructions_counter">
					<?php echo '<span class="instructions_checked">0</span>';
					echo '<span class="slash">' . _e( '/', 'blossom-recipe' ) .'</span>';
					echo '<span class="instructions_total">' . esc_html( $total_instructions) .'</span>';
					echo '<span class="instructions">' . _e( ' Instructions', 'blossom-recipe' ) .'</span>';
					?>
				</div>

				<div class="instruction-progressbar-container">
				  <div class="instruction-progressbar-bar"></div>
				</div>

				<ol>
					<?php 
					$count=1;
					foreach( $instructions['instructions'] as $instruction ) {

	                
	                	$image = wp_get_attachment_image_src( $instruction['image'], 'thumbnail' );

	                	?>
						<li>
							<input type="checkbox" name="instruction[]" class="instructions_checkcounter" data-count="<?php echo $count;?>">

							<?php echo '<span class="instruction_description">' . esc_html( $instruction['description']) .'</span>';
							?>
						</br>
							<img src="<?php echo isset($image) ? $image[0] : ''; ?>" class="br_instructions_thumbnail" height="64" width="64"/>

							
						</li>
					<?php
					$count++;
					}
				?> </ol>
			<?php }
			?>
		</div>
		<?php
	}

	function br_recipe_notes()
	{ ?>
		<div id="br-recipe-notes">
            <?php

            if ( empty( $post_id ) ) {
				global $post;
				$post_id = $post->ID;
			}

			$notes= get_post_meta( $post_id, 'br_recipe', true );
			

			if(isset($notes['notes'])) 
			{
				?>
				<h4><?php _e( 'Notes', 'blossom-recipe' ) ?></h4>

					<?php echo '<span class="recipe_notes">' . html_entity_decode( $notes['notes']) .'</span>';
					
			}
				
			?>
		</div>
		<?php
	}


	function adjust_recipe_servings(){

		check_ajax_referer( 'recipe_adjust_servings', 'security');

		  $servings = intval( $_POST['servings'] );
		  echo $servings;

		  $return = array(
			'servings' => $servings,
			);

		 
		  wp_send_json_success( $return );
		  wp_die(); // this is required to return a proper result

	}

}
new Blossom_Recipe_Hook_Functions();
?>

