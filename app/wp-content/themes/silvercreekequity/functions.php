<?php
/* ====================================================================================================
   Theme Support Configuration
==================================================================================================== */
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
remove_theme_support('automatic-feed-links');
remove_theme_support('custom-background');
remove_theme_support('custom-header');
remove_theme_support('custom-line-height');
remove_theme_support('custom-custom-logo');
remove_theme_support('customize-selective-refresh-widgets');
remove_theme_support('html5');
remove_theme_support('post-formats');
remove_theme_support('starter-content');

// hide editor in favor of ACF fields
add_action(
    'admin_init',
    function() {
        remove_post_type_support('page', 'editor');
        remove_post_type_support('post', 'editor');
    }
);

// tweak script & style output
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

/* ====================================================================================================
   Cleanup the Head
==================================================================================================== */


/* ====================================================================================================
   Disable Block Editor
==================================================================================================== */
add_filter('use_block_editor_for_post', '__return_false', 10);

/* ====================================================================================================
   Enqueue Scripts and Styles
==================================================================================================== */
function include_scripts_and_styles() {
    wp_enqueue_style(
        'sce-style',
        get_template_directory_uri() . '/assets/styles/app.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/styles/app.css'),
        'screen and (min-width: 1em)'
    );

   wp_enqueue_script(
        'sce-script',
        get_template_directory_uri() . '/assets/scripts/app.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scripts/app.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'include_scripts_and_styles');

/* ====================================================================================================
   Enable ACF Functionality
==================================================================================================== */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/* ====================================================================================================
   Enable Support for uploading SVGs to Media Library
==================================================================================================== */
add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;

    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4);

function cc_mime_types($mimes){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

/* ====================================================================================================
   Register Menus
==================================================================================================== */
function custom_menus() {
    register_nav_menus(
        array(
            'primary-navigation' => 'Primary Navigation'
        )
    );
}
add_action( 'init', 'custom_menus' );

/* ====================================================================================================
 Custom Post Type - Galleries
==================================================================================================== */
add_action('init', 'create_post_type_projects');

function create_post_type_projects() {
    register_post_type('scequity_projects',
        array(
            'labels' => array(
                'name' => __('Projects'),
                'singular_name' => __('Project'),
                'add_new_item' => __('Add New Project'),
                'edit_item' => __('Edit Project'),
                'new_item' => __('New Project'),
                'view_item' => __('View Project'),
                'view_items' => __('View Projects'),
                'search_items' => __('Search Projects'),
                'not_found' => __('No Projects Found'),
                'not_found_in_trash' => __('No Projects Found in Trash'),
                'all_items' => __('All Projects'),
                'archives' => __('Project Archives'),
                'attributes' => __('Project Attributes'),
                'insert_into_item' => __('Insert into Project'),
                'uploaded_to_this_item' => __('Uploaded to this Project'),
                'filter_items_list' => __('Filter Projects list'),
                'items_list_navigation' => __('Project list navigation'),
                'items_list' => __('Projects list'),
                'item_published' => __('Project published.'),
                'item_published_privately' => __('Project published privately.'),
                'item_reverted_to_draft' => __('Project reverted to draft.'),
                'item_scheduled' => __('Project scheduled.'),
                'item_updated' => __('Project updated.'),
                'item_link' => __('Project Link'),
                'item_link_description' => __('A link to a project.'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-bank',
            'rewrite' => array(
                'slug' => 'projects'
            ),
            'taxonomies' => array('category'),
            'supports' => array('title', 'author', 'thumbnail')
        )
    );
}
