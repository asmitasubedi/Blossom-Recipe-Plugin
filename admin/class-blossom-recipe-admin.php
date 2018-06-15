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
class Blossom_Recipe_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blossom_Recipe_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blossom_Recipe_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blossom-recipe-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blossom_Recipe_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blossom_Recipe_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blossom-recipe-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register post types.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	function br_register_recipe_post_types() {
		
		$labels = array(
			'name'                  => _x( 'Blossom Recipes', 'Post Type General Name', 'blossom-recipe' ),
			'singular_name'         => _x( 'Blossom Recipe', 'Post Type Singular Name', 'blossom-recipe' ),
			'menu_name'             => __( 'Blossom Recipes', 'blossom-recipe' ),
			'name_admin_bar'        => __( 'Blossom Recipe', 'blossom-recipe' ),
			'archives'              => __( 'Blossom Recipe Archives', 'blossom-recipe' ),
			'attributes'            => __( 'Blossom Recipe Attributes', 'blossom-recipe' ),
			'parent_item_colon'     => __( 'Parent Blossom Recipe:', 'blossom-recipe' ),
			'all_items'             => __( 'All Recipes', 'blossom-recipe' ),
			'add_new_item'          => __( 'Add New Recipe', 'blossom-recipe' ),
			'add_new'               => __( 'Add New', 'blossom-recipe' ),
			'new_item'              => __( 'New Blossom Recipe', 'blossom-recipe' ),
			'edit_item'             => __( 'Edit Blossom Recipe', 'blossom-recipe' ),
			'update_item'           => __( 'Update Blossom Recipe', 'blossom-recipe' ),
			'view_item'             => __( 'View Blossom Recipe', 'blossom-recipe' ),
			'view_items'            => __( 'View Blossom Recipes', 'blossom-recipe' ),
			'search_items'          => __( 'Search Blossom Recipe', 'blossom-recipe' ),
			'not_found'             => __( 'Not found', 'blossom-recipe' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'blossom-recipe' ),
			'featured_image'        => __( 'Featured Image', 'blossom-recipe' ),
			'set_featured_image'    => __( 'Set featured image', 'blossom-recipe' ),
			'remove_featured_image' => __( 'Remove featured image', 'blossom-recipe' ),
			'use_featured_image'    => __( 'Use as featured image', 'blossom-recipe' ),
			'insert_into_item'      => __( 'Insert into Blossom Recipe', 'blossom-recipe' ),
			'uploaded_to_this_item' => __( 'Uploaded to Blossom Recipe', 'blossom-recipe' ),
			'items_list'            => __( 'Blossom Recipes list', 'blossom-recipe' ),
			'items_list_navigation' => __( 'Blossom Recipes list navigation', 'blossom-recipe' ),
			'filter_items_list'     => __( 'Filter Blossom Recipes list', 'blossom-recipe' ),
	);
	$args = array(
		'label'                 => __( 'Blossom Recipe', 'blossom-recipe' ),
		'description'           => __( 'Blossom Recipe Post Type', 'blossom-recipe' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomy'				=> 'blossom_recipe_categories',
		'taxonomy_slug'			=> 'blossom-recipes',
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'               => array('slug' => 'blossom-recipe'),
	);
		register_post_type( 'blossom-recipe', $args );
	    //flush_rewrite_rules();
		
	}

	/**
	 * Register a taxonomy, post_types_categories for the post types.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
	 */

	function br_create_categories_type_taxonomies() {
		// Add new taxonomy, make it hierarchical
				$labels = array(
					'name'              => _x( 'Blossom Recipe Categories', 'taxonomy general name', 'blossom-recipe' ),
					'singular_name'     => _x( 'Blossom Recipe Categories', 'taxonomy singular name', 'blossom-recipe' ),
					'search_items'      => __( 'Search Categories', 'blossom-recipe' ),
					'all_items'         => __( 'All Categories', 'blossom-recipe' ),
					'parent_item'       => __( 'Parent Categories', 'blossom-recipe' ),
					'parent_item_colon' => __( 'Parent Categories:', 'blossom-recipe' ),
					'edit_item'         => __( 'Edit Categories', 'blossom-recipe' ),
					'update_item'       => __( 'Update Categories', 'blossom-recipe' ),
					'add_new_item'      => __( 'Add New Categories', 'blossom-recipe' ),
					'new_item_name'     => __( 'New Categories Name', 'blossom-recipe' ),
					'menu_name'         => __( 'Recipe Categories', 'blossom-recipe' ),
				);

				$args = array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_nav_menus' => true,
					'rewrite'           => array( 'slug' => 'recipe-category', 'hierarchical' => true ),
				);
				register_taxonomy( 'blossom_recipe_categories', array('blossom-recipe'), $args );
	}

}
