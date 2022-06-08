<?php
/**
 * Understrap Child Theme Custom Post Types
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
 * Hook to register custom post types of this theme
 *
 * @return void
 */
function cptui_register_my_cpts() {

    /**
     * Post Type: Members.
     */

    $labels = [
        "name" => __( "Members", "instant-understrap-child" ),
        "singular_name" => __( "Member", "instant-understrap-child" ),
        "menu_name" => __( "My Members", "instant-understrap-child" ),
        "all_items" => __( "All Members", "instant-understrap-child" ),
        "add_new" => __( "Add new", "instant-understrap-child" ),
        "add_new_item" => __( "Add new Member", "instant-understrap-child" ),
        "edit_item" => __( "Edit Member", "instant-understrap-child" ),
        "new_item" => __( "New Member", "instant-understrap-child" ),
        "view_item" => __( "View Member", "instant-understrap-child" ),
        "view_items" => __( "View Members", "instant-understrap-child" ),
        "search_items" => __( "Search Members", "instant-understrap-child" ),
        "not_found" => __( "No Members found", "instant-understrap-child" ),
        "not_found_in_trash" => __( "No Members found in trash", "instant-understrap-child" ),
        "parent" => __( "Parent Member:", "instant-understrap-child" ),
        "featured_image" => __( "Featured image for this Member", "instant-understrap-child" ),
        "set_featured_image" => __( "Set featured image for this Member", "instant-understrap-child" ),
        "remove_featured_image" => __( "Remove featured image for this Member", "instant-understrap-child" ),
        "use_featured_image" => __( "Use as featured image for this Member", "instant-understrap-child" ),
        "archives" => __( "Member archives", "instant-understrap-child" ),
        "insert_into_item" => __( "Insert into Member", "instant-understrap-child" ),
        "uploaded_to_this_item" => __( "Upload to this Member", "instant-understrap-child" ),
        "filter_items_list" => __( "Filter Members list", "instant-understrap-child" ),
        "items_list_navigation" => __( "Members list navigation", "instant-understrap-child" ),
        "items_list" => __( "Members list", "instant-understrap-child" ),
        "attributes" => __( "Members attributes", "instant-understrap-child" ),
        "name_admin_bar" => __( "Member", "instant-understrap-child" ),
        "item_published" => __( "Member published", "instant-understrap-child" ),
        "item_published_privately" => __( "Member published privately.", "instant-understrap-child" ),
        "item_reverted_to_draft" => __( "Member reverted to draft.", "instant-understrap-child" ),
        "item_scheduled" => __( "Member scheduled", "instant-understrap-child" ),
        "item_updated" => __( "Member updated.", "instant-understrap-child" ),
        "parent_item_colon" => __( "Parent Member:", "instant-understrap-child" ),
    ];

    $args = [
        "label" => __( "Members", "instant-understrap-child" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "member", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-businessman",
        "supports" => [ "title", "editor", "thumbnail", "revisions" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "member", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
