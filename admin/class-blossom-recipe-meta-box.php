<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/admin
 * @author     Blossom <test@test.com>
 */
class Blossom_Recipe_Meta_Box {

	/**
     * Register this class with the WordPress API
     *
     * @since    1.0.0
     */
    public function __construct() {

        add_action( 'add_meta_boxes', array( $this, 'add_recipe_options_meta_box' ) );

    }

    /**
     * The function responsible for creating the actual meta box.
     *
     * @since    1.0.0
     */
    public function add_recipe_options_meta_box() {

    	$post_type = array('blossom-recipe');
 
        add_meta_box(
            'blossom-recipe',  // Unique ID
            __( 'Recipe', 'blossom-recipe' ),			// Box title
            array( $this, 'display_recipe_options_meta_box' ),   // Content callback, must be of type callable
            $post_type, 			// Post type
            'normal',
            'high'
        );
 
    }

    /**
     * Renders the content of the meta box.
     *
     * @since    1.0.0
     */
    public function display_recipe_options_meta_box() {

    	include BLOSSOM_RECIPE_BASE_PATH.'/admin/meta-data/blossom-recipe-tabs.php' ;

    }


}
?>