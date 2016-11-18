<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 22.9.2016
 * Time: 22:09
 */
class KlabBaseFunctionalities_research_topic extends klabCustomPostType
{
    protected static function createPostType()
    {
        $labels = array(
            'name'               => _x( 'Research topics', 'post type general name', 'klab' ),
            'singular_name'      => _x( 'Research topic', 'post type singular name', 'klab' ),
            'menu_name'          => _x( 'Research topics', 'admin menu', 'klab' ),
            'name_admin_bar'     => _x( 'Research topics', 'add new on admin bar', 'klab' ),
            'add_new'            => _x( 'Add New', 'research topic', 'klab' ),
            'add_new_item'       => __( 'Add New research topic', 'klab' ),
            'new_item'           => __( 'New research topic', 'klab' ),
            'edit_item'          => __( 'Edit research topics', 'klab' ),
            'view_item'          => __( 'View research topics', 'klab' ),
            'all_items'          => __( 'All research topics', 'klab' ),
            'search_items'       => __( 'Search research topica', 'klab' ),
            'parent_item_colon'  => __( 'Parent research topic:', 'klab' ),
            'not_found'          => __( 'No research topic found.', 'klab' ),
            'not_found_in_trash' => __( 'No research topic found in Trash.', 'klab' )
        );
        $postTypeConstructor = new KlabBaseFunctionalities_CustomPostTypeConstructor('klab_research_topic');
        $postTypeConstructor->initiateUsingDefaultArgs('klab_research_topic', $labels);
    }

    protected static function setTaxonomies() {
        return;
    }
    protected static function createMetaboxes() {
        return;
    }
}