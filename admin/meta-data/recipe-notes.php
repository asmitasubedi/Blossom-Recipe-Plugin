<?php
 
/**
 * Provides the 'Recipe Notes' view for the corresponding tab in the Post Meta Box.
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin/meta-data
 */

?>
 
<div id="blossom-recipe-tab-recipe-notes" class="inside hidden">

    <div class="br-recipe-notes">

    	<?php $notes= get_post_meta( get_the_ID(), 'br_recipe', true );
    	$content = '';
    	
    	if(isset($notes['notes'])) 
        {
                $content = $notes['notes']; 
    			print_r($content);
        }?>

    <h4><?php _e( 'Recipe notes', 'blossom-recipe' ) ?></h4>
    
    <?php
    $options = array(
        'textarea_rows' => 7,
        'textarea_name' => 'br_recipe[notes]',
    );

    wp_editor( $content, 'br_recipe',  $options );

    ?>

</div>
</div>