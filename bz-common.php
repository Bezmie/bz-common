<?php
/******************************************************************************
Plugin Name: bz-common
Description: add common functions
Version: 0.0.1
Author: bz
******************************************************************************/

// Add tags taxonomy for pages

if( ! function_exists('tagpages_register_taxonomy') ){
    function tagpages_register_taxonomy()
    {
        register_taxonomy_for_object_type('post_tag', 'page');
    }
    add_action('init', 'tagpages_register_taxonomy');
}

// Display all post_types on the tags archive page.

if( ! function_exists('tagpages_display_tagged_pages_archive') ){
    function tagpages_display_tagged_pages_archive(&$query)
    {
        if ( !is_admin() && $query->is_archive && $query->is_tag ) {
            $q = &$query->query_vars;
            $q['post_type'] = 'any';
        }
    }
    add_action('pre_get_posts', 'tagpages_display_tagged_pages_archive');
}
?>
