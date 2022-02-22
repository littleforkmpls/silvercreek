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

// Remove tags support from posts
add_action(
    'init',
    function() {
        unregister_taxonomy_for_object_type('post_tag', 'post');
    }
);

// tweak script & style output
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

// disable block editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// custom image sizes(s)
add_image_size('project-card', 400, 320, true );
add_image_size('bio-headshot', 500, 333, true );

/* ====================================================================================================
   Cleanup the Head
==================================================================================================== */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');

add_action(
    'wp_print_styles',
    function(): void {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
);

/* ====================================================================================================
   WordPress 5.9 cleanup .... what were you thinking
==================================================================================================== */
add_action(
    'after_setup_theme',
    function() {

        // remove SVG and global styles
        remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');

        // remove wp_footer actions which add's global inline styles
        remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

        // remove render_block filters which adding unnecessary stuff
        remove_filter('render_block', 'wp_render_duotone_support');
        remove_filter('render_block', 'wp_restore_group_inner_container');
        remove_filter('render_block', 'wp_render_layout_support_flag');
    }
);

/* ====================================================================================================
   Disable Rest API for non-admin users
   https://developer.wordpress.org/rest-api/frequently-asked-questions/#can-i-disable-the-rest-api
==================================================================================================== */
add_filter(
    'rest_authentication_errors',
    function($result) {
        if (true === $result || is_wp_error($result)) {
            return $result;
        }

        if (!is_user_logged_in()) {
            return new WP_Error(
                'rest_not_logged_in',
                __('You are not currently logged in.'),
                array('status' => 401)
            );
        }

        return $result;
    }
);

/* ====================================================================================================
   Enqueue Scripts and Styles
==================================================================================================== */
add_action(
    'wp_enqueue_scripts',
    function () {
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
);

/* ====================================================================================================
   Enable ACF Functionality
==================================================================================================== */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

/* ====================================================================================================
   Enable Support for uploading SVGs to Media Library
==================================================================================================== */
add_filter(
    'wp_check_filetype_and_ext',
    function($data, $file, $filename, $mimes) {

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

    }, 10, 4
);

add_filter(
    'upload_mimes',
    function($mimes){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
);

add_action(
    'admin_head',
    function() {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                 width: 100% !important;
                 height: auto !important;
            }
            </style>';
    }
);

/* ====================================================================================================
   Register Menus
==================================================================================================== */
add_action(
    'init',
    function() {
        register_nav_menus(
            array(
                'primary-navigation' => 'Primary Navigation'
            )
        );
    }
);

/* ====================================================================================================
   Gravity Forms
==================================================================================================== */

/* change submit button markup */
add_filter(
    'gform_submit_button',
    function($button, $form) {
        return "<button class='btn' id='gform_submit_button_{$form['id']}'><span class='btn__txt'>{$form['button']['text']}</span><span class='btn__icon'></span></button>";
    },
    10, 2
);

/* use a transparent spinner for ajax submits - new spinner handled with CSS */
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

}

/* ====================================================================================================
 Custom Post Type - Galleries
==================================================================================================== */
add_action(
    'init',
    function() {
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
                'supports' => array('title', 'author', 'thumbnail')
            )
        );
    }
);

