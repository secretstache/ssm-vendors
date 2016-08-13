<?php
/**
 * SSM Vendors
 *
 * @package   SSM_Vendors
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Vendors
 */
class SSM_Vendors_Registrations {

	public $post_type = 'vendor';

	public $taxonomies = array( 'vendor-category' );

	public function init() {
		// Add the SSM Vendors and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Vendors_Registrations::register_post_type()
	 * @uses SSM_Vendors_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Vendors', 'ssm-vendors' ),
			'singular_name'      => __( 'Vendor', 'ssm-vendors' ),
			'add_new'            => __( 'Add Vendor', 'ssm-vendors' ),
			'add_new_item'       => __( 'Add Vendor', 'ssm-vendors' ),
			'edit_item'          => __( 'Edit Vendor', 'ssm-vendors' ),
			'new_item'           => __( 'New Vendor', 'ssm-vendors' ),
			'view_item'          => __( 'View Vendor', 'ssm-vendors' ),
			'search_items'       => __( 'Search Vendors', 'ssm-vendors' ),
			'not_found'          => __( 'No vendors found', 'ssm-vendors' ),
			'not_found_in_trash' => __( 'No vendors in the trash', 'ssm-vendors' ),
		);

		$supports = array(
			'title',
			'thumbnail',
			'genesis-layouts',
			'genesis-seo'
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'vendor', ),
			'has_archive'			=> 'vendors',
			'menu_position'   => 30,
			'menu_icon'       => 'dashicons-admin-page',
		);

		$args = apply_filters( 'ssm_vendors_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Vendor Categories', 'ssm-vendors' ),
			'singular_name'              => __( 'Vendor Category', 'ssm-vendors' ),
			'menu_name'                  => __( 'Vendor Categories', 'ssm-vendors' ),
			'edit_item'                  => __( 'Edit Vendor Category', 'ssm-vendors' ),
			'update_item'                => __( 'Update Vendor Category', 'ssm-vendors' ),
			'add_new_item'               => __( 'Add New Vendor Category', 'ssm-vendors' ),
			'new_item_name'              => __( 'New Vendor Category Name', 'ssm-vendors' ),
			'parent_item'                => __( 'Parent Vendor Category', 'ssm-vendors' ),
			'parent_item_colon'          => __( 'Parent Vendor Category:', 'ssm-vendors' ),
			'all_items'                  => __( 'All Vendor Categories', 'ssm-vendors' ),
			'search_items'               => __( 'Search Vendor Categories', 'ssm-vendors' ),
			'popular_items'              => __( 'Popular Vendor Categories', 'ssm-vendors' ),
			'separate_items_with_commas' => __( 'Separate vendor categories with commas', 'ssm-vendors' ),
			'add_or_remove_items'        => __( 'Add or remove vendor categories', 'ssm-vendors' ),
			'choose_from_most_used'      => __( 'Choose from the most used vendor categories', 'ssm-vendors' ),
			'not_found'                  => __( 'No vendor categories found.', 'ssm-vendors' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'vendor-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'ssm_vendors_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}