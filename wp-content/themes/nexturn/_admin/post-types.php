<?php

/*
 * All Post-types definitions & Post-type specific functions
 * */

add_action( 'init', 'team_init' );

function team_init() {
    $labels = array(
        'name'               => _x( 'Team Members', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Team Member', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Team Members', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Team Members', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'image', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Team Member', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Team Member', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Team Member', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Team Member', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Team Members', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Team Members', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Team Members:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Team Members found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Team Members found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Manage Nexturn Team Members.', 'your-plugin-textdomain' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => array( 'slug' => 'nexturn-team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title'),
        'exclude_from_search' => true
    );

    register_post_type( 'nexturn_team', $args );
}


add_action( 'init', 'testimonial_init' );

function testimonial_init() {
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New Testimonial', 'image', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Testimonial', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Testimonial', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Testimonial', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Testimonial', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Testimonials', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Testimonials', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Testimonials:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Testimonials found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Manage Nexturn Team Testimonials.', 'your-plugin-textdomain' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => array('title')
    );

    register_post_type( 'nexturn_testimonial', $args );
}


add_action( 'init', 'job_post_init');

function job_post_init() {
    $labels = array(
        'name'               => _x( 'Job Posts', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Job Post', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Job Posts', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Job Posts', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New Job Post', 'image', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Job Post', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Job Post', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Job Post', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Job Post', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Job Post', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Job Posts', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Job Posts:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Job Posts found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Job Posts found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Manage Nexturn Job Posts.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'job' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title')
    );

    register_post_type( 'nexturn_job_posts', $args );
}

add_action( 'init', 'impact_stories_init');

function impact_stories_init() {
    $labels = array(
        'name'               => _x( 'Impact Stories', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Impact Story', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Impact Stories', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Impact Stories', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New Impact Story', 'image', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Impact Story', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Impact Story', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Impact Story', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Impact Story', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Impact Stories', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Impact Stories', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Impact Story:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Impact Stories.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Impact Stories found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Manage Impact Stories.', 'your-plugin-textdomain' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array('title'),
        'show_in_admin_bar'  => false
    );

    register_post_type( 'nex_impact_stories', $args );
}
add_action( 'init', 'impact_story_taxonomy_init' );
function impact_story_taxonomy_init() {
    $labels = array(
        'name'              => _x( 'Groups', 'taxonomy general name' ),
        'singular_name'     => _x( 'Group', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Groups' ),
        'all_items'         => __( 'All Groups' ),
        'parent_item'       => __( 'Parent Group' ),
        'parent_item_colon' => __( 'Parent Group:' ),
        'edit_item'         => __( 'Edit Group' ),
        'update_item'       => __( 'Update Group' ),
        'add_new_item'      => __( 'Add New Group' ),
        'new_item_name'     => __( 'New Group Name' ),
        'menu_name'         => __( 'Groups' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'group' ],
    );
    register_taxonomy( 'nex_impact_group', [ 'nex_impact_stories' ], $args );
}

function nexturn_change_title_text( $title ){
    $screen = get_current_screen();

    if  ( 'nexturn_team' == $screen->post_type ) {
        $title = 'Enter member name';
    }
    if  ( 'nexturn_testimonial' == $screen->post_type ) {
        $title = 'Enter member name';
    }
    if  ( 'nexturn_job_posts' == $screen->post_type ) {
        $title = 'Enter job title';
    }
    if  ( 'nex_impact_stories' == $screen->post_type ) {
        $title = 'Enter impact story title';
    }


    return $title;
}

add_filter( 'enter_title_here', 'nexturn_change_title_text' );

add_action('init', 'resource_init');
function resource_init() {
    $labels = array(
        'name'               => _x('Resources', 'post type general name', 'your-plugin-textdomain'),
        'singular_name'      => _x('Resource', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name'          => _x('Resources', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar'     => _x('Resource', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new'            => _x('Add New Resource', 'resource', 'your-plugin-textdomain'),
        'add_new_item'       => __('Add New Resource', 'your-plugin-textdomain'),
        'new_item'           => __('New Resource', 'your-plugin-textdomain'),
        'edit_item'          => __('Edit Resource', 'your-plugin-textdomain' ),
        'view_item'          => __('View Resource', 'your-plugin-textdomain' ),
        'all_items'          => __('All Resources', 'your-plugin-textdomain' ),
        'search_items'       => __('Search Resources', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __('Parent Resource:', 'your-plugin-textdomain' ),
        'not_found'          => __('No Resources found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __('No Resources found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Manage Resources.', 'your-plugin-textdomain'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'resources', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => 'resources',
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title'),
        'show_in_admin_bar'  => true
    );

    register_post_type('resource', $args );
}

// Register taxonomy "resource_group" for Resource (like "group" for impact stories)
add_action('init', 'resource_group_taxonomy_init');
function resource_group_taxonomy_init() {
    $labels = array(
        'name'              => _x('Resource Groups', 'taxonomy general name'),
        'singular_name'     => _x('Resource Group', 'taxonomy singular name'),
        'search_items'      => __('Search Resource Groups'),
        'all_items'         => __('All Resource Groups'),
        'parent_item'       => __('Parent Resource Group'),
        'parent_item_colon' => __('Parent Resource Group:'),
        'edit_item'         => __('Edit Resource Group'),
        'update_item'       => __('Update Resource Group'),
        'add_new_item'      => __('Add New Resource Group'),
        'new_item_name'     => __('New Resource Group Name'),
        'menu_name'         => __('Resource Groups'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'resource-group'),
    );
    register_taxonomy('resource_group', array('resource'), $args );
}



