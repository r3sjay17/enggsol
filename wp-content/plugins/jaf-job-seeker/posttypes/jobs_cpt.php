<?php

// Register Custom Post Type
function register_job_post_type() {

    $labels = array(
        'name'                  => _x( 'Jobs', 'Post Type General Name', 'jointswp' ),
        'singular_name'         => _x( 'Jobs', 'Post Type Singular Name', 'jointswp' ),
        'menu_name'             => __( 'Jobs', 'jointswp' ),
        'name_admin_bar'        => __( 'Jobs', 'jointswp' ),
        'archives'              => __( 'Job Archives', 'jointswp' ),
        'parent_item_colon'     => __( 'Parent Job:', 'jointswp' ),
        'all_items'             => __( 'All Jobs', 'jointswp' ),
        'add_new_item'          => __( 'Add New Job', 'jointswp' ),
        'add_new'               => __( 'Add New', 'jointswp' ),
        'new_item'              => __( 'New Job', 'jointswp' ),
        'edit_item'             => __( 'Edit Job', 'jointswp' ),
        'update_item'           => __( 'Update Job', 'jointswp' ),
        'view_item'             => __( 'View Job', 'jointswp' ),
        'search_items'          => __( 'Search Job', 'jointswp' ),
        'not_found'             => __( 'Not found', 'jointswp' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'jointswp' ),
        'featured_image'        => __( 'Featured Image', 'jointswp' ),
        'set_featured_image'    => __( 'Set featured image', 'jointswp' ),
        'remove_featured_image' => __( 'Remove featured image', 'jointswp' ),
        'use_featured_image'    => __( 'Use as featured image', 'jointswp' ),
        'insert_into_item'      => __( 'Insert into Job', 'jointswp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Job', 'jointswp' ),
        'items_list'            => __( 'Jobs list', 'jointswp' ),
        'items_list_navigation' => __( 'Jobs list navigation', 'jointswp' ),
        'filter_items_list'     => __( 'Filter Jobs list', 'jointswp' ),
    );
    $capabilities = array(
        'edit_post'             => 'manage_jobs',
        'read_post'             => 'manage_jobs',
        'delete_post'           => 'manage_jobs',
        'edit_posts'            => 'manage_jobs',
        'edit_others_posts'     => 'manage_jobs',
        'publish_posts'         => 'manage_jobs',
        'read_private_posts'    => 'manage_jobs',
    );
    $args = array(
        'label'                 => __( 'Jobs', 'jointswp' ),
        'description'           => __( 'Job Description', 'jointswp' ),
        'labels'                => $labels,
        'supports'              => array( 'thumbnail', 'title', 'editor' ),
        'taxonomies'            => array( 'job_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-widgets-menus',//TEMPLATEURL.'/assets/images/job-icon.png',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capabilities'          => $capabilities,
    );
    register_post_type( 'jobs', $args );

}
add_action( 'init', 'register_job_post_type', 0 );

// Register Custom Taxonomy
function register_job_category() {

    $labels = array(
        'name'                       => _x( 'Job Categories', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Job Category', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Job Category', 'jointswp' ),
        'all_items'                  => __( 'All Categories', 'jointswp' ),
        'parent_item'                => __( 'Parent Category', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Category:', 'jointswp' ),
        'new_item_name'              => __( 'New Category Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Category', 'jointswp' ),
        'edit_item'                  => __( 'Edit Category', 'jointswp' ),
        'update_item'                => __( 'Update Category', 'jointswp' ),
        'view_item'                  => __( 'View Category', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Category with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Category', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Category', 'jointswp' ),
        'search_items'               => __( 'Search Category', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Category', 'jointswp' ),
        'items_list'                 => __( 'Category list', 'jointswp' ),
        'items_list_navigation'      => __( 'Category list navigation', 'jointswp' ),
    );

    $capabilities = array(
        'manage_terms'               => 'manage_jobs',
        'edit_terms'                 => 'manage_jobs',
        'delete_terms'               => 'manage_jobs',
        'assign_terms'               => 'manage_jobs',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'job_category', array( 'jobs' ), $args );

}
//add_action( 'init', 'register_job_category', 0 );
function register_jobs_types() {

    $labels = array(
        'name'                       => _x( 'Job Types', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Job Type', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Job Type', 'jointswp' ),
        'all_items'                  => __( 'All Types', 'jointswp' ),
        'parent_item'                => __( 'Parent Type', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Type:', 'jointswp' ),
        'new_item_name'              => __( 'New Type Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Type', 'jointswp' ),
        'edit_item'                  => __( 'Edit Type', 'jointswp' ),
        'update_item'                => __( 'Update Type', 'jointswp' ),
        'view_item'                  => __( 'View Type', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Type with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Type', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Type', 'jointswp' ),
        'search_items'               => __( 'Search Type', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Category', 'jointswp' ),
        'items_list'                 => __( 'Category list', 'jointswp' ),
        'items_list_navigation'      => __( 'Category list navigation', 'jointswp' ),
    );

    $capabilities = array(
        'manage_terms'               => 'manage_jobs',
        'edit_terms'                 => 'manage_jobs',
        'delete_terms'               => 'manage_jobs',
        'assign_terms'               => 'manage_jobs',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'job_types', array( 'jobs' ), $args );

}
//add_action( 'init', 'register_jobs_types', 0 );
function register_job_level() {

    $labels = array(
        'name'                       => _x( 'Job Levels', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Job Level', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Job Level', 'jointswp' ),
        'all_items'                  => __( 'All Levels', 'jointswp' ),
        'parent_item'                => __( 'Parent Level', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Level:', 'jointswp' ),
        'new_item_name'              => __( 'New Level Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Level', 'jointswp' ),
        'edit_item'                  => __( 'Edit Level', 'jointswp' ),
        'update_item'                => __( 'Update Level', 'jointswp' ),
        'view_item'                  => __( 'View Level', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Level with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Level', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Level', 'jointswp' ),
        'search_items'               => __( 'Search Level', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Category', 'jointswp' ),
        'items_list'                 => __( 'Category list', 'jointswp' ),
        'items_list_navigation'      => __( 'Category list navigation', 'jointswp' ),
    );

    $capabilities = array(
        'manage_terms'               => 'manage_jobs',
        'edit_terms'                 => 'manage_jobs',
        'delete_terms'               => 'manage_jobs',
        'assign_terms'               => 'manage_jobs',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'job_levels', array( 'jobs' ), $args );

}
//add_action( 'init', 'register_job_level', 0 );
function register_job_location() {

    $labels = array(
        'name'                       => _x( 'Job Locations', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Job Location', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Job Location', 'jointswp' ),
        'all_items'                  => __( 'All Locations', 'jointswp' ),
        'parent_item'                => __( 'Parent Location', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Location:', 'jointswp' ),
        'new_item_name'              => __( 'New Location Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Location', 'jointswp' ),
        'edit_item'                  => __( 'Edit Location', 'jointswp' ),
        'update_item'                => __( 'Update Location', 'jointswp' ),
        'view_item'                  => __( 'View Location', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Location with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Location', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Location', 'jointswp' ),
        'search_items'               => __( 'Search Location', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Category', 'jointswp' ),
        'items_list'                 => __( 'Category list', 'jointswp' ),
        'items_list_navigation'      => __( 'Category list navigation', 'jointswp' ),
    );

    $capabilities = array(
        'manage_terms'               => 'manage_jobs',
        'edit_terms'                 => 'manage_jobs',
        'delete_terms'               => 'manage_jobs',
        'assign_terms'               => 'manage_jobs',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'job_locations', array( 'jobs' ), $args );

}
//add_action( 'init', 'register_job_location', 0 );

function add_theme_job_caps() {
    $role = get_role( 'administrator' );
    $role->add_cap( 'manage_jobs' );
}
add_action( 'admin_init', 'add_theme_job_caps');

/*Job Tags*/
// Register Custom Taxonomy
function jobs_tag_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Job Tags', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Job Tag', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Tags', 'jointswp' ),
        'all_items'                  => __( 'All Tags', 'jointswp' ),
        'parent_item'                => __( 'Parent Tag', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Tag:', 'jointswp' ),
        'new_item_name'              => __( 'New Tag Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Tag', 'jointswp' ),
        'edit_item'                  => __( 'Edit Tag', 'jointswp' ),
        'update_item'                => __( 'Update Tag', 'jointswp' ),
        'view_item'                  => __( 'View Tag', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Tags with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Tags', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Tags', 'jointswp' ),
        'search_items'               => __( 'Search Tags', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Tags', 'jointswp' ),
        'items_list'                 => __( 'Tags list', 'jointswp' ),
        'items_list_navigation'      => __( 'Tags list navigation', 'jointswp' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'job_tags', array( 'jobs' ), $args );

}
add_action( 'init', 'jobs_tag_taxonomy', 0 );


/*Metabox*/

function get_job_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function job_meta_add_meta_box() {
    add_meta_box(
        'job_meta-job-meta',
        __( 'Job Information' ),
        'job_meta_html',
        'jobs',
        'normal',
        'high'
    );
    add_meta_box(
        'job_meta-company-meta',
        __( 'Company Information ( optional )' ),
        'job_company_meta_html',
        'jobs',
        'normal',
        'high'
    );
}
//add_action( 'add_meta_boxes', 'job_meta_add_meta_box' );

function job_meta_html( $post) {
    wp_nonce_field( '_job_meta_nonce', 'job_meta_nonce' );
    wp_enqueue_script('jaf-admin-js');
?>
<div class="job-meta-information-wrap">

    <div class="main-descriptions">
        <!--<p>
            <label for="job_meta_title"><?php _e( 'Job Title/Designation', 'job_meta' ); ?></label><br>
            <input class="widefat job-title" id="job_meta_title" name="job_meta_title" value="<?php echo get_job_meta( 'job_meta_title' ); ?>" />
        </p>-->
       <!-- <p>
            <?php
            /*$job_description =  get_job_meta( 'job_description' );
            wp_editor(html_entity_decode($job_description), 'job_description', array(
                'media_buttons' =>  true,
                'textarea_rows' =>  25,
                'wpautop' =>  true,
            ));*/
            ?>
        </p>-->
    </div>

    <p class="description">Set the job details. It is necessary for better candidate searches.</p>

    <div class="meta-fields">
        <!--<p>
            <label for="job_meta_job_type"><?php //_e( 'Job type (required)', 'job_meta' ); ?></label><br>
            <select name="job_meta_job_type[]" id="job_meta_job_type" multiple="yes" >

                <?php
                /*$job_types = get_job_types();

                $selected_job_type = get_job_meta( 'job_meta_job_type' );
                foreach($job_types as $job_type):*/ ?>

                <option  <?php //echo ( is_array($selected_job_type) && in_array( $job_type , $selected_job_type ) ) ? 'selected' : ''; ?> value="<?php //echo $job_type; ?>" ><?php //echo $job_type; ?></option>

                <?php //endforeach; ?>
            </select>
            <br><span class="description">You may select more than one</span>
        </p>-->
        <p>
            <label for="job_meta_location"><?php _e( 'Location', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_location" id="job_meta_location" value="<?php echo get_job_meta( 'job_meta_location' ); ?>">
            <br><span class="description">e.g Ang Mo Kio</span>
        </p>
        <p>
            <label for="job_meta_start_date"><?php _e( 'Start Date (required)', 'job_meta' ); ?></label><br>
            <input type="text" class="is_datepicker required" name="job_meta_start_date" id="job_meta_start_date" value="<?php echo get_job_meta( 'job_meta_start_date' ) ? date("d-m-Y", (int)get_job_meta( 'job_meta_start_date' ) ) : date("d-m-Y", current_time('timestamp', 1)); ?>"  data-field="date" readonly >
            <br><span class="description">This controll when the job <b>start</b> showing on from your front-end</span>
        </p>
        <p>
            <label for="job_meta_end_date"><?php _e( 'End Date (required)', 'job_meta' ); ?></label><br>
            <input type="text" class="is_datepicker required" name="job_meta_end_date" id="job_meta_end_date" value="<?php echo get_job_meta( 'job_meta_end_date' ) ? date("d-m-Y", get_job_meta( 'job_meta_end_date' ) ) : date("d-m-Y", current_time('timestamp', 1) ); ?>"  data-field="date" readonly >
            <br><span class="description">This controll when the job <b>stop</b> showing on from your front-end</span>
        </p>
        <p>
            <label for="job_meta_no_candidates"><?php _e( 'No. Candidates', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_no_candidates" id="job_meta_no_candidates" value="<?php echo get_job_meta( 'job_meta_no_candidates' ); ?>">
            <br><span class="description">No of available slots for this position</span>
        </p>
    </div>
    <div id="dtBox"></div>
    <script>
        /*jQuery(document).ready(function() {
            jQuery("#post").validate();
        });*/
    </script>
</div>
<?php
}

function job_company_meta_html( $post) {
    wp_nonce_field( '_job_company_meta_nonce', 'job_company_meta_nonce' ); ?>
<div class="job-meta-information-wrap">
    <p class="description">Set the Company details. the job belongs</p>
    <div class="meta-fields">
        <p>
            <label for="job_meta_company_name"><?php _e( 'Company Name', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_company_name" id="job_meta_company_name" value="<?php echo get_job_meta( 'job_meta_company_name' ); ?>">
        </p>
        <p>
            <label for="job_meta_job_sender"><?php _e( 'Job Sender', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_job_sender" id="job_meta_job_sender" value="<?php echo get_job_meta( 'job_meta_job_sender' ); ?>">
        </p>
        <p>
            <label for="job_meta_contact_number"><?php _e( 'Contact Number', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_contact_number" id="job_meta_contact_number" value="<?php echo get_job_meta( 'job_meta_contact_number' ); ?>">
        </p>
        <p>
            <label for="job_meta_email_address"><?php _e( 'Email Address', 'job_meta' ); ?></label><br>
            <input type="text" name="job_meta_email_address" id="job_meta_email_address" value="<?php echo get_job_meta( 'job_meta_email_address' ); ?>">
        </p>
        <p>
            <label for="job_meta_sender_message"><?php _e( 'Sender Notes', 'job_meta' ); ?></label><br>
            <textarea type="text" name="job_meta_sender_message" id="job_meta_sender_message" ><?php echo get_job_meta( 'job_meta_sender_message' ); ?></textarea>
        </p>
    </div>
    <script>
        jQuery(function($){
            $('#post').submit(function(){
                _this = $(this);
                /*if(_this.find('#job_meta_title').val() == ''){
                    alert('Please input the job title');
                    return false;
                }*/
                if(_this.find('#job_meta_start_date').val() == ''){
                    alert('Please input the start date');
                    return false;
                }
                if(_this.find('#job_meta_end_date').val() == ''){
                    alert('Please input the end date');
                    return false;
                }
            });
        });
    </script>
</div>
<?php
}

function job_meta_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['job_meta_nonce'] ) || ! wp_verify_nonce( $_POST['job_meta_nonce'], '_job_meta_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    //    update_post_meta( $post_id, 'job_meta_title', get_the_title($post_id) );
    /*if ( isset( $_POST['job_meta_title'] ) ){
        update_post_meta( $post_id, 'job_meta_title', esc_attr( $_POST['job_meta_title'] ) );
    }*/
    if ( isset( $_POST['job_description'] ) )
        update_post_meta( $post_id, 'job_description', ( $_POST['job_description'] ) );
    if ( isset( $_POST['job_meta_job_type'] ) )
        update_post_meta( $post_id, 'job_meta_job_type',  $_POST['job_meta_job_type'] );
    if ( isset( $_POST['job_meta_location'] ) )
        update_post_meta( $post_id, 'job_meta_location', esc_attr( $_POST['job_meta_location'] ) );
    if ( isset( $_POST['job_meta_start_date'] ) )
        update_post_meta( $post_id, 'job_meta_start_date', strtotime( esc_attr( $_POST['job_meta_start_date'] ) . " 00:00:00" ) );
    if ( isset( $_POST['job_meta_end_date'] ) )
        update_post_meta( $post_id, 'job_meta_end_date', strtotime( esc_attr( $_POST['job_meta_end_date'] ) . " 23:59:59" ) );
    if ( isset( $_POST['job_meta_company_name'] ) )
        update_post_meta( $post_id, 'job_meta_company_name', esc_attr( $_POST['job_meta_company_name'] ) );
    if ( isset( $_POST['job_meta_job_sender'] ) )
        update_post_meta( $post_id, 'job_meta_job_sender', esc_attr( $_POST['job_meta_job_sender'] ) );
    if ( isset( $_POST['job_meta_designation'] ) )
        update_post_meta( $post_id, 'job_meta_designation', esc_attr( $_POST['job_meta_designation'] ) );
    if ( isset( $_POST['job_meta_contact_number'] ) )
        update_post_meta( $post_id, 'job_meta_contact_number', esc_attr( $_POST['job_meta_contact_number'] ) );
    if ( isset( $_POST['job_meta_email_address'] ) )
        update_post_meta( $post_id, 'job_meta_email_address', esc_attr( $_POST['job_meta_email_address'] ) );
    if ( isset( $_POST['job_meta_job_description'] ) )
        update_post_meta( $post_id, 'job_meta_job_description', esc_attr( $_POST['job_meta_job_description'] ) );
    if ( isset( $_POST['job_meta_no_candidates'] ) )
        update_post_meta( $post_id, 'job_meta_no_candidates', esc_attr( $_POST['job_meta_no_candidates'] ) );
    if ( isset( $_POST['job_meta_date_needed'] ) )
        update_post_meta( $post_id, 'job_meta_date_needed', strtotime( esc_attr( $_POST['job_meta_date_needed'] ) ) );
    if ( isset( $_POST['job_meta_sender_message'] ) )
        update_post_meta( $post_id, 'job_meta_sender_message', esc_attr( $_POST['job_meta_sender_message'] ) );

}
//add_action( 'save_post', 'job_meta_save' );

function modify_post_title( $data )
{
  if($data['post_type'] == 'jobs' && isset($_POST['job_meta_title'])) {
    $data['post_title'] =  $_POST['job_meta_title'] ;
  }
  return $data;
}
//add_filter( 'wp_insert_post_data' , 'modify_post_title' , '99', 2 );
