<?php

// Register Custom Post Type
function register_applicant_post_type() {

    $labels = array(
        'name'                  => _x( 'Applicants', 'Post Type General Name', 'jointswp' ),
        'singular_name'         => _x( 'Application', 'Post Type Singular Name', 'jointswp' ),
        'menu_name'             => __( 'Applicants', 'jointswp' ),
        'name_admin_bar'        => __( 'Applicants', 'jointswp' ),
        'archives'              => __( 'Application Archives', 'jointswp' ),
        'parent_item_colon'     => __( 'Parent Application:', 'jointswp' ),
        'all_items'             => __( 'All Applicants', 'jointswp' ),
        'add_new_item'          => __( 'Add New Application', 'jointswp' ),
        'add_new'               => __( 'Add New', 'jointswp' ),
        'new_item'              => __( 'New Application', 'jointswp' ),
        'edit_item'             => __( 'Edit Application', 'jointswp' ),
        'update_item'           => __( 'Update Application', 'jointswp' ),
        'view_item'             => __( 'View Application', 'jointswp' ),
        'search_items'          => __( 'Search Application', 'jointswp' ),
        'not_found'             => __( 'Not found', 'jointswp' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'jointswp' ),
        'featured_image'        => __( 'Featured Image', 'jointswp' ),
        'set_featured_image'    => __( 'Set featured image', 'jointswp' ),
        'remove_featured_image' => __( 'Remove featured image', 'jointswp' ),
        'use_featured_image'    => __( 'Use as featured image', 'jointswp' ),
        'insert_into_item'      => __( 'Insert into item', 'jointswp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'jointswp' ),
        'items_list'            => __( 'Items list', 'jointswp' ),
        'items_list_navigation' => __( 'Items list navigation', 'jointswp' ),
        'filter_items_list'     => __( 'Filter items list', 'jointswp' ),
    );
    $capabilities = array(
        'edit_post'             => 'manage_applicants',
        'read_post'             => 'manage_applicants',
        'delete_post'           => 'manage_applicants',
        'edit_posts'            => 'manage_applicants',
        'edit_others_posts'     => 'manage_applicants',
        'publish_posts'         => 'manage_applicants',
        'read_private_posts'    => 'manage_applicants',
    );
    $args = array(
        'label'                 => __( 'Application', 'jointswp' ),
        'description'           => __( 'Application Description', 'jointswp' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', ),
        'taxonomies'            => array( 'applicatant_category' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capabilities'       => $capabilities,
    );
    register_post_type( 'applicants', $args );

}
add_action( 'init', 'register_applicant_post_type', 0 );

// Register Custom Taxonomy
function register_application_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'jointswp' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'jointswp' ),
        'menu_name'                  => __( 'Category', 'jointswp' ),
        'all_items'                  => __( 'All Categories', 'jointswp' ),
        'parent_item'                => __( 'Parent Category', 'jointswp' ),
        'parent_item_colon'          => __( 'Parent Category:', 'jointswp' ),
        'new_item_name'              => __( 'New Category Name', 'jointswp' ),
        'add_new_item'               => __( 'Add New Category', 'jointswp' ),
        'edit_item'                  => __( 'Edit Category', 'jointswp' ),
        'update_item'                => __( 'Update Category', 'jointswp' ),
        'view_item'                  => __( 'View Category', 'jointswp' ),
        'separate_items_with_commas' => __( 'Separate Category with commas', 'jointswp' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'jointswp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jointswp' ),
        'popular_items'              => __( 'Popular Category', 'jointswp' ),
        'search_items'               => __( 'Search Category', 'jointswp' ),
        'not_found'                  => __( 'Not Found', 'jointswp' ),
        'no_terms'                   => __( 'No Category', 'jointswp' ),
        'items_list'                 => __( 'Category list', 'jointswp' ),
        'items_list_navigation'      => __( 'Category list navigation', 'jointswp' ),
    );
    $capabilities = array(
        'manage_terms'               => 'manage_applicants',
        'edit_terms'                 => 'manage_applicants',
        'delete_terms'               => 'manage_applicants',
        'assign_terms'               => 'manage_applicants',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'applicant_category', array( 'applicants' ), $args );

}
add_action( 'init', 'register_application_taxonomy', 0 );

function add_theme_applicant_caps() {
    $role = get_role( 'administrator' );
    $role->add_cap( 'manage_applicants' );
}
add_action( 'admin_init', 'add_theme_applicant_caps');


function applicant_meta_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function applicant_meta_add_meta_box() {
    add_meta_box(
        'applicant_meta-applicant-meta',
        __( 'Applicant Information', 'jointswp' ),
        'applicant_meta_html',
        'applicants',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'applicant_meta_add_meta_box' );

function applicant_meta_html( $post) {
    wp_nonce_field( '_applicant_meta_nonce', 'applicant_meta_nonce' );
    wp_enqueue_script('jaf-admin-js');
?>
<div class="applicant-meta-information-wrap">
    <div class="meta-fields">
        <?php $applied_job = applicant_meta_get_meta( 'applicant_meta_applied_job' ); ?>
        <h4 class="description">Applied Job: <?php echo $applied_job; ?></h4>
        <p>
            <label for="applicant_meta_first_name"><?php _e( 'First Name', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_first_name" id="applicant_meta_first_name" value="<?php echo applicant_meta_get_meta( 'applicant_meta_first_name' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_last_name"><?php _e( 'Last Name', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_last_name" id="applicant_meta_last_name" value="<?php echo applicant_meta_get_meta( 'applicant_meta_last_name' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_email"><?php _e( 'Email', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_email" id="applicant_meta_email" value="<?php echo applicant_meta_get_meta( 'applicant_meta_email' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_nationality"><?php _e( 'Nationality', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_nationality" id="applicant_meta_nationality">
                <?php foreach(get_gform_choices('Nationality') as $nationality): ?>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_nationality' ) == $nationality) ? 'selected="selected"' : '' ?> value="<?php echo $nationality; ?>"><?php echo $nationality; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="applicant_meta_mobile"><?php _e( 'Mobile', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_mobile" id="applicant_meta_mobile" value="<?php echo applicant_meta_get_meta( 'applicant_meta_mobile' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_home"><?php _e( 'Home', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_home" id="applicant_meta_home" value="<?php echo applicant_meta_get_meta( 'applicant_meta_home' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_highest_education_attainment"><?php _e( 'Highest Education Attainment', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_highest_education_attainment" id="applicant_meta_highest_education_attainment">
                <?php foreach(get_gform_choices('HighestEducationAttainment') as $highestEducationAttainment): ?>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_highest_education_attainment' ) == $highestEducationAttainment) ? 'selected="selected"' : '' ?> value="<?php echo $highestEducationAttainment; ?>"><?php echo $highestEducationAttainment; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="applicant_meta_current_location"><?php _e( 'Current Location', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_current_location" id="applicant_meta_current_location" value="<?php echo applicant_meta_get_meta( 'applicant_meta_current_location' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_specialization"><?php _e( 'Specialization', 'applicant_meta' ); ?></label><br>
            <?php $selected_specialazation = explode(',', strtolower(applicant_meta_get_meta( 'applicant_meta_specialization' ))); ?>
            <select name="applicant_meta_specialization" id="applicant_meta_specialization" multiple>
                <?php foreach(get_gform_choices('Specialization') as $Specialization): ?>
                <option <?php echo in_array(strtolower($Specialization), $selected_specialazation) ? 'selected="selected"' : '' ?> value="<?php echo $Specialization; ?>"><?php echo $Specialization; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <?php $selected_salary = applicant_meta_get_meta( 'applicant_meta_monthly_salary' ); ?>
            <label for="applicant_meta_monthly_salary"><?php _e( 'Monthly Salary', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_monthly_salary" id="applicant_meta_monthly_salary">
                <?php foreach(get_gform_choices('MonthlySalary') as $monthly_salary): ?>
                <option <?php echo ($selected_salary == $monthly_salary) ? 'selected="selected"' : '' ?> value="<?php echo $monthly_salary; ?>"><?php echo $monthly_salary; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="applicant_meta_expected_monthly_salary"><?php _e( 'Expected Monthly Salary', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_expected_monthly_salary" id="applicant_meta_expected_monthly_salary" value="<?php echo applicant_meta_get_meta( 'applicant_meta_expected_monthly_salary' ); ?>">
        </p>
        <p>
            <label for="applicant_meta_availability"><?php _e( 'Availability', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_availability" id="applicant_meta_availability">
                <?php foreach(get_gform_choices('Availability') as $availability): ?>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_availability' ) == $availability) ? 'selected="selected"' : '' ?> value="<?php echo $availability; ?>"><?php echo $availability; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="applicant_meta_job_type"><?php _e( 'Job Type', 'applicant_meta' ); ?></label><br>
            <?php $app_job_types = applicant_meta_get_meta( 'applicant_meta_job_type' ); ?>
            <select name="applicant_meta_job_type" id="applicant_meta_job_type" multiple>
                <?php foreach(get_job_types() as $job_type): ?>
                <option <?php echo in_array($job_type, $app_job_types) ? 'selected="selected"' : '' ?> value="<?php echo $job_type; ?>"><?php echo $job_type; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="applicant_meta_birth_date"><?php _e( 'Birth Date', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_birth_date" id="applicant_meta_birth_date" value="<?php echo date("F j Y", applicant_meta_get_meta( 'applicant_meta_birth_date' ) ); ?>" data-field="date" readonly>
        </p>
        <p>
            <label for="applicant_meta_gender"><?php _e( 'Gender', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_gender" id="applicant_meta_gender">
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_gender' ) == 'Male' ) ? 'selected' : '' ?>>Male</option>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_gender' ) == 'Female' ) ? 'selected' : '' ?>>Female</option>
            </select>
        </p>
        <p>
            <label for="applicant_meta_marital_status"><?php _e( 'Marital Status', 'applicant_meta' ); ?></label><br>
            <select name="applicant_meta_marital_status" id="applicant_meta_marital_status">
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_marital_status' ) == 'Single' ) ? 'selected' : '' ?>>Single</option>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_marital_status' ) == 'Married' ) ? 'selected' : '' ?>>Married</option>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_marital_status' ) == 'Divorced' ) ? 'selected' : '' ?>>Divorced</option>
                <option <?php echo (applicant_meta_get_meta( 'applicant_meta_marital_status' ) == 'Widowed' ) ? 'selected' : '' ?>>Widowed</option>
            </select>
        </p>
        <p>
            <label for="applicant_meta_resume"><?php _e( 'Resume', 'applicant_meta' ); ?></label><br>
            <input type="text" name="applicant_meta_resume" id="applicant_meta_resume" value="<?php echo applicant_meta_get_meta( 'applicant_meta_resume' ); ?>">
            <br/><a href="<?php echo applicant_meta_get_meta( 'applicant_meta_resume' ); ?>" target="_blank" >Download</a>
        </p>
    </div>
    <div id="dtBox"></div>
</div><?php
}

function applicant_meta_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['applicant_meta_nonce'] ) || ! wp_verify_nonce( $_POST['applicant_meta_nonce'], '_applicant_meta_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['applicant_meta_first_name'] ) )
        update_post_meta( $post_id, 'applicant_meta_first_name', esc_attr( $_POST['applicant_meta_first_name'] ) );
    if ( isset( $_POST['applicant_meta_last_name'] ) )
        update_post_meta( $post_id, 'applicant_meta_last_name', esc_attr( $_POST['applicant_meta_last_name'] ) );
    if ( isset( $_POST['applicant_meta_email'] ) )
        update_post_meta( $post_id, 'applicant_meta_email', esc_attr( $_POST['applicant_meta_email'] ) );
    if ( isset( $_POST['applicant_meta_nationality'] ) )
        update_post_meta( $post_id, 'applicant_meta_nationality', esc_attr( $_POST['applicant_meta_nationality'] ) );
    if ( isset( $_POST['applicant_meta_mobile'] ) )
        update_post_meta( $post_id, 'applicant_meta_mobile', esc_attr( $_POST['applicant_meta_mobile'] ) );
    if ( isset( $_POST['applicant_meta_home'] ) )
        update_post_meta( $post_id, 'applicant_meta_home', esc_attr( $_POST['applicant_meta_home'] ) );
    if ( isset( $_POST['applicant_meta_highest_education_attainment'] ) )
        update_post_meta( $post_id, 'applicant_meta_highest_education_attainment', esc_attr( $_POST['applicant_meta_highest_education_attainment'] ) );
    if ( isset( $_POST['applicant_meta_current_location'] ) )
        update_post_meta( $post_id, 'applicant_meta_current_location', esc_attr( $_POST['applicant_meta_current_location'] ) );
    if ( isset( $_POST['applicant_meta_specialization'] ) )
        update_post_meta( $post_id, 'applicant_meta_specialization', esc_attr( $_POST['applicant_meta_specialization'] ) );
    if ( isset( $_POST['applicant_meta_monthly_salary'] ) )
        update_post_meta( $post_id, 'applicant_meta_monthly_salary', esc_attr( $_POST['applicant_meta_monthly_salary'] ) );
    if ( isset( $_POST['applicant_meta_expected_monthly_salary'] ) )
        update_post_meta( $post_id, 'applicant_meta_expected_monthly_salary', esc_attr( $_POST['applicant_meta_expected_monthly_salary'] ) );
    if ( isset( $_POST['applicant_meta_availability'] ) )
        update_post_meta( $post_id, 'applicant_meta_availability', esc_attr( $_POST['applicant_meta_availability'] ) );
    if ( isset( $_POST['applicant_meta_job_type'] ) )
        update_post_meta( $post_id, 'applicant_meta_job_type', esc_attr( $_POST['applicant_meta_job_type'] ) );
    if ( isset( $_POST['applicant_meta_birth_date'] ) )
        update_post_meta( $post_id, 'applicant_meta_birth_date', strtotime( esc_attr( $_POST['applicant_meta_birth_date'] ) ) );
    if ( isset( $_POST['applicant_meta_gender'] ) )
        update_post_meta( $post_id, 'applicant_meta_gender', esc_attr( $_POST['applicant_meta_gender'] ) );
    if ( isset( $_POST['applicant_meta_marital_status'] ) )
        update_post_meta( $post_id, 'applicant_meta_marital_status', esc_attr( $_POST['applicant_meta_marital_status'] ) );
    if ( isset( $_POST['applicant_meta_resume'] ) )
        update_post_meta( $post_id, 'applicant_meta_resume', esc_attr( $_POST['applicant_meta_resume'] ) );
}
add_action( 'save_post', 'applicant_meta_save' );
