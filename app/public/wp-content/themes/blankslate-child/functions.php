<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

function add_admin_link($items, $args) {
    if (is_user_logged_in() && ($args->theme_location=='main-menu' || $args->theme_location=='primary mobile')) {
        $items .= '<li id="ongletAdmin" class="menuWhite"><a href="'. get_admin_url() .'">Admin</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link', 10, 2 );



/*
 * Display confirmation message and form after successful submission.
 * @link  https://wpforms.com/developers/how-to-display-the-confirmation-and-the-form-again-after-submission/
 */
  
function wpf_dev_frontend_output_success(  $form_data, $fields, $entry_id ) {

    // Optional, you can limit to specific forms. Below, we restrict output to form #235.
    if ( absint( $form_data[ 'id' ] ) !== 803 ) {
        return;
    }
                // Reset the fields to blank
        unset(
            $_GET[ 'wpforms_return' ],
            $_POST[ 'wpforms' ][ 'id' ]
        );
 
        // Uncomment this line out if you want to clear the form field values after submission
        unset( $_POST[ 'wpforms' ][ 'fields' ] );
 
        // Actually render the form.
        wpforms()->frontend->output( $form_data[ 'id' ] );
  
}
 
add_action( 'wpforms_frontend_output_success', 'wpf_dev_frontend_output_success', 10, 3 );