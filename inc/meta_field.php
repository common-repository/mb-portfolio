<?php  


function add_mbpg_portfolio_cpt_data_box(){
    add_meta_box(
        'portfolio_options',
        __( 'Portfolio Options', 'designistan' ),
        'add_mbpg_portfolio_cpt_data_box_callback',//function to display fields
        'mb-portfolio',//name post-types where it will be used
        'side',// where to dispaly (normal,side,advance)
        'high'//priorty
    );
}
add_action( 'add_meta_boxes', 'add_mbpg_portfolio_cpt_data_box' );

function add_mbpg_portfolio_cpt_data_box_callback($post)
{
    wp_nonce_field(basename(__FILE__), "mb-meta-box-nonce");
    
    $data = get_post_meta( $post->ID, 'mb-link', true );
  
    ?>
        <div class="fields_wrapper">
        <p>
            <label>Custom Link</label>
            <input class="widefat" type="text" name="mbpg_link" value="<?php echo esc_url_raw($data); ?>">
        </p>
        
    </div>
    <?php  
}
/////////////////////////////////////////////


function save_custom_mbpg_custom_post_type_data_box($post_id, $post, $update)
{
    if (!isset($_POST["mb-meta-box-nonce"]) || !wp_verify_nonce($_POST["mb-meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "mb-portfolio";
    if($slug != $post->post_type)
        return $post_id;

   if( !$update ){
        return;
    }

    $mbpg_link =   esc_url_raw( $_POST['mbpg_link'] );

    update_post_meta( $post_id, 'mb-link', $mbpg_link );

   
}

add_action("save_post", "save_custom_mbpg_custom_post_type_data_box", 10, 3);



