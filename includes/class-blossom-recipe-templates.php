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
class Blossom_Recipe_Templates {

	/**
	 * Hook in methods.
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'include_recipe_template_function' ) );
	}

	/**
	 * Template over-ride for single trip.
	 *
	 * @since    1.0.0
	 */
	function include_recipe_template_function( $template ) {
	    if ( get_post_type() === 'blossom-recipe' ) {
	    	
	        if ( is_single()) {
	        	//echo "test";
	        	//die();
	            if ( $theme_file = locate_template( array ( 'single-blossom-recipe.php' ) ) ) {
	                $template = $theme_file;
	            } else {
	                $template = BLOSSOM_RECIPE_TEMPLATE_PATH . '/single-blossom-recipe.php';
	            }
	        }
	        if( is_archive() ) {

	        	if ( $theme_file = locate_template( array ( 'archive-blossom-recipe.php' ) ) ) {
	                $template = $theme_file;
	            } else {
	                $template = BLOSSOM_RECIPE_TEMPLATE_PATH . '/archive-blossom-recipe.php';
	            }
	        }
	        
	    }
	    return $template;
	 }
}

new Blossom_Recipe_Templates();