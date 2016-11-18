<?php

abstract class klabCustomPostType
{
    public static function initiate() {
        static::createPostType();
        static::setTaxonomies();
        static::createMetaboxes();
    }

    public static function createMetaBox ($metaBoxProps, $postTypeName) {
        $metaBoxConstructor = new Klab_metaBoxConstructor($metaBoxProps, $postTypeName);
        $savePostHookName = 'save_post_'.$postTypeName;

        add_action( 'add_meta_boxes', array( $metaBoxConstructor, 'klabMetaConstructor_addMetabox') );
        add_action( $savePostHookName, array( $metaBoxConstructor, 'klabMetaConstructor_saveMetaBox_cb') );
    }

    abstract protected static function createPostType();
    abstract protected static function setTaxonomies();
    abstract protected static function createMetaboxes();

}

?>