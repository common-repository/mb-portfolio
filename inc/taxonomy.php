<?php  
// Register Custom Taxonomy
function mbpg_portfolio_category_taxomony_register_function() {

    $labels = array(
        'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'Portfolio Category' ),
        'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'Portfolio Category' ),
        'menu_name'                  => __( 'Portfolio Category', 'Portfolio Category' ),
        'all_items'                  => __( 'All Items', 'Portfolio Category' ),
        'parent_item'                => __( 'Parent Item', 'Portfolio Category' ),
        'parent_item_colon'          => __( 'Parent Item:', 'Portfolio Category' ),
        'new_item_name'              => __( 'New Portfolio Category Name', 'Portfolio Category' ),
        'add_new_item'               => __( 'Add New Portfolio Category', 'Portfolio Category' ),
        'edit_item'                  => __( 'Edit Portfolio Category', 'Portfolio Category' ),
        'update_item'                => __( 'Update Portfolio Category', 'Portfolio Category' ),
        'view_item'                  => __( 'View Portfolio Category', 'Portfolio Category' ),
        'separate_items_with_commas' => __( 'Separate Portfolio Category with commas', 'Portfolio Category' ),
        'add_or_remove_items'        => __( 'Add or remove Portfolio Category', 'Portfolio Category' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'Portfolio Category' ),
        'popular_items'              => __( 'Popular Portfolio Category', 'Portfolio Category' ),
        'search_items'               => __( 'Search Portfolio Category', 'Portfolio Category' ),
        'not_found'                  => __( 'Not Found', 'Portfolio Category' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'mb-portfolio-category', array( 'mb-portfolio' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'mbpg_portfolio_category_taxomony_register_function', 0 );

///////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Adding font awesome Field
 * @return void 
 */
function mbpg_portfolio_add_extra_field_function( $term ) {
    
    ?>
    <div class="form-field">
        <label for="mb-font-class"><?php _e( 'Font Awesome Class', 'designistan' ); ?></label>

        <input type="text" name="mb-font-class" id="mb-font-class" value="">
    </div>
<?php
}
add_action( 'mb-portfolio-category_add_form_fields', 'mbpg_portfolio_add_extra_field_function', 10, 2 );
//add_action( '{$taxonomy}_add_form_fields', 'function', 10, 2 );


/**
 * Saving taxonomy extra fields
 */
function mbpg_portfolio_save_extra_field_function( $term_id ) {
    
    if ( isset( $_POST['mb-font-class'] ) ) {
        $term_icon = sanitize_html_class($_POST['mb-font-class']);
        if( $term_icon ) {
             update_term_meta( $term_id, 'mb-font-class', $term_icon );
        }

    } 
        
}  
add_action( 'edited_mb-portfolio-category', 'mbpg_portfolio_save_extra_field_function' );  
add_action( 'create_mb-portfolio-category', 'mbpg_portfolio_save_extra_field_function' );
/*
do_action( "edited_{$taxonomy}", int $term_id, int $tt_id );
do_action( "created_{$taxonomy}", int $term_id, int $tt_id );
*/


/**
 * Edit font awesome Field
 * @return void 
 */
function mbpg_porfolio_edit_extra_fields_function( $term ) {
    
    // put the term ID into a variable
    $t_id = $term->term_id;
 
    $term_icon = get_term_meta( $t_id, 'mb-font-class', true ); 
    ?>
    <tr class="form-field">
        <th><label for="mb-font-class"><?php _e( 'Font Awesome Class', 'designistan' ); ?></label></th>
         
        <td>     
            <input type="text" name="mb-font-class" id="mb-font-class" value="<?php echo esc_attr( $term_icon ) ? esc_attr( $term_icon ) : ''; ?>">
        </td>
    </tr>
<?php
}
add_action( 'mb-portfolio-category_edit_form_fields', 'mbpg_porfolio_edit_extra_fields_function', 10 );

//do_action( "{$taxonomy}_edit_form_fields", object $tag, string $taxonomy );

///$term_icon = get_term_meta( $t_id, 'icon', true ); for front end 

