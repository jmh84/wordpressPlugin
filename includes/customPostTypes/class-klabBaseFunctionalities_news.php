<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 22.9.2016
 * Time: 22:09
 */
class KlabBaseFunctionalities_news extends KlabBaseFunctionalities_CustomPostTypeConstructor
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'News', 'post type general name', 'klab' ),
            'singular_name'      => _x( 'News', 'post type singular name', 'klab' ),
            'menu_name'          => _x( 'News', 'admin menu', 'klab' ),
            'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'klab' ),
            'add_new'            => _x( 'Add New', 'book', 'klab' ),
            'add_new_item'       => __( 'Add New News', 'klab' ),
            'new_item'           => __( 'New News', 'klab' ),
            'edit_item'          => __( 'Edit News', 'klab' ),
            'view_item'          => __( 'View News', 'klab' ),
            'all_items'          => __( 'All News', 'klab' ),
            'search_items'       => __( 'Search News', 'klab' ),
            'parent_item_colon'  => __( 'Parent News:', 'klab' ),
            'not_found'          => __( 'No news found.', 'klab' ),
            'not_found_in_trash' => __( 'No news found in Trash.', 'klab' )
        );
        parent::__construct('klab_news');

        parent::initiateUsingDefaultArgs('klab_news', 'klab_news', $labels);
    }
}