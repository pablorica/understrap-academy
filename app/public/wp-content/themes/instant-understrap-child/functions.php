<?php
/**
 * Understrap Child Theme functions and definitions
 * php version 7.4.1
 *
 * @category   Category
 * @package    Understrap
 * @subpackage UnderstrapChild
 * @author     Pablo Rica <pablo@codigo.co.uk>
 * @license    MIT 
 * @version    GIT: @1.0.0@
 * @link       link
 * @since      UnderstrapChild 1.0
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;


/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 *
 * @return void
 */
function Understrap_Remove_scripts() 
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'Understrap_Remove_scripts', 20);


/**
 * Enqueue our stylesheet and javascript file
 *
 * @return void
 */
function Theme_Enqueue_styles()
{
    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style(
        'child-understrap-styles', 
        get_stylesheet_directory_uri() . $theme_styles, 
        array(), 
        $the_theme->get('Version')
    );
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'child-understrap-scripts', 
        get_stylesheet_directory_uri() . $theme_scripts, 
        array(), 
        $the_theme->get('Version'), 
        true
    );
    if (is_singular() 
        && comments_open() 
        && get_option('thread_comments')
    ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'Theme_Enqueue_styles');

/**
 * Load the child theme's text domain
 *
 * @return void
 */
function Add_Child_Theme_textdomain()
{
    load_child_theme_textdomain(
        'instant-understrap-child', 
        get_stylesheet_directory() . '/languages'
    );
}
add_action('after_setup_theme', 'Add_Child_Theme_textdomain');

/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * 
 * @return string
 */
function Understrap_Default_Bootstrap_version( $current_mod ) 
{
    return 'bootstrap5';
}
add_filter(
    'theme_mod_understrap_bootstrap_version', 
    'Understrap_Default_Bootstrap_version', 
    20
);

/**
 * Loads javascript for showing customizer warning dialog.
 *
 * @return void
 */
function Understrap_Child_Customize_Controls_js() 
{
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array( 'customize-preview' ),
        '20130508',
        true
    );
}
add_action(
    'customize_controls_enqueue_scripts', 
    'Understrap_Child_Customize_Controls_js'
);



// Array of files to include.
$child_includes = array(
	'/child-custom-post-types.php',        
);

// Include files.
foreach ( $child_includes  as $file ) {
	require_once get_theme_file_path( 'inc' . $file );
}