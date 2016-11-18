<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 22.9.2016
 * Time: 22:09
 */
class KlabBaseFunctionalities_article extends klabCustomPostType
{
    protected static function createPostType()
    {
        $labels = array(
            'name'               => _x( 'Articles', 'post type general name', 'klab' ),
            'singular_name'      => _x( 'Article', 'post type singular name', 'klab' ),
            'menu_name'          => _x( 'Articles', 'admin menu', 'klab' ),
            'name_admin_bar'     => _x( 'Articles', 'add new on admin bar', 'klab' ),
            'add_new'            => _x( 'Add New', 'article', 'klab' ),
            'add_new_item'       => __( 'Add New article', 'klab' ),
            'new_item'           => __( 'New article', 'klab' ),
            'edit_item'          => __( 'Edit articles', 'klab' ),
            'view_item'          => __( 'View articles', 'klab' ),
            'all_items'          => __( 'All articles', 'klab' ),
            'search_items'       => __( 'Search articles', 'klab' ),
            'parent_item_colon'  => __( 'Parent article:', 'klab' ),
            'not_found'          => __( 'No articles found.', 'klab' ),
            'not_found_in_trash' => __( 'No articles found in Trash.', 'klab' )
        );

        $postTypeConstructor = new KlabBaseFunctionalities_CustomPostTypeConstructor('klab_article');
        $postTypeConstructor->initiateUsingDefaultArgs('klab_article', $labels);
    }

    protected static function setTaxonomies() {
        return;
    }
    protected static function createMetaboxes() {
        return;
    }
}