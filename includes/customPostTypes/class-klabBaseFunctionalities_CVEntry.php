<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 12.11.2016
 * Time: 15:15
 */
class KlabBaseFunctionalities_CVEntry  extends klabCustomPostType
{
    protected static function createPostType()
    {
        $labels = array(
            'name' => _x('CV entries', 'post type general name', 'klab'),
            'singular_name' => _x('CV entry', 'post type singular name', 'klab'),
            'menu_name' => _x('CV entries', 'admin menu', 'klab'),
            'name_admin_bar' => _x('CV entries', 'add new on admin bar', 'klab'),
            'add_new' => _x('Add New', 'CV entry', 'klab'),
            'add_new_item' => __('Add New CV entry', 'klab'),
            'new_item' => __('New CV entry', 'klab'),
            'edit_item' => __('Edit CV entries', 'klab'),
            'view_item' => __('View CV entries', 'klab'),
            'all_items' => __('All CV entries', 'klab'),
            'search_items' => __('Search CV entries', 'klab'),
            'parent_item_colon' => __('Parent CV entry:', 'klab'),
            'not_found' => __('No CV entries found.', 'klab'),
            'not_found_in_trash' => __('No CV entries found in Trash.', 'klab')
        );
        $postTypeConstructor = new KlabBaseFunctionalities_CustomPostTypeConstructor('klab_CV_entry');
        $postTypeConstructor->initiateUsingDefaultArgs('klab_cv_entry', $labels);
    }

    protected static function setTaxonomies()
    {
        return;
    }

    protected static function createMetaboxes()
    {
        return;
    }
}
