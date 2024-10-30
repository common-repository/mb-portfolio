<?php  

// Register Custom Post Type
function mb_portfolio_custom_post_type_function() {

    $labels = array(
        'name'                  => _x( 'MB Portfolio', 'Post Type General Name', 'designistan' ),
        'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'designistan' ),
        'menu_name'             => __( 'MB Portfolio', 'designistan' ),
        'name_admin_bar'        => __( 'Post Type', 'designistan' ),
        'archives'              => __( 'Item Archives', 'designistan' ),
        'attributes'            => __( 'Item Attributes', 'designistan' ),
        'parent_item_colon'     => __( 'Parent Item:', 'designistan' ),
        'all_items'             => __( 'All Items', 'designistan' ),
        'add_new_item'          => __( 'Add New Item', 'designistan' ),
        'add_new'               => __( 'Add New', 'designistan' ),
        'new_item'              => __( 'New Item', 'designistan' ),
        'edit_item'             => __( 'Edit Item', 'designistan' ),
        'update_item'           => __( 'Update Item', 'designistan' ),
        'view_item'             => __( 'View Item', 'designistan' ),
        'view_items'            => __( 'View Items', 'designistan' ),
        'search_items'          => __( 'Search Item', 'designistan' ),
        'not_found'             => __( 'Not found', 'designistan' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'designistan' ),
        'featured_image'        => __( 'Featured Image', 'designistan' ),
        'set_featured_image'    => __( 'Set featured image', 'designistan' ),
        'remove_featured_image' => __( 'Remove featured image', 'designistan' ),
        'use_featured_image'    => __( 'Use as featured image', 'designistan' ),
        'insert_into_item'      => __( 'Insert into item', 'designistan' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'designistan' ),
        'items_list'            => __( 'Items list', 'designistan' ),
        'items_list_navigation' => __( 'Items list navigation', 'designistan' ),
        'filter_items_list'     => __( 'Filter items list', 'designistan' ),
    );
    $rewrite = array(
        'slug'                  => 'mb-portfolio',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Portfolio Item', 'designistan' ),
        'description'           => __( 'Portfolio', 'designistan' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
        'taxonomies'            => array( 'portfolio_category', 'portfolio_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type( 'mb-portfolio', $args );

}
add_action( 'init', 'mb_portfolio_custom_post_type_function', 0 );



