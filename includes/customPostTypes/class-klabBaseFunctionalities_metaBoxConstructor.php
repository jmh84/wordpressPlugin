<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 17.11.2016
 * Time: 22:04
 */
class Klab_metaBoxConstructor
{
    private $metaBoxProps;
    private $postTypeName;
    private $nonceName;

    public function __construct ($metaBoxProps, $postTypeName) {

        $this->metaBoxProps = $metaBoxProps;
        $this->postTypeName = $postTypeName;
        if (!property_exists ($metaBoxProps, 'nonceName')) {
            throw new InvalidArgumentException("Metabox needs to have nonce.");
        }
        $this->nonceName = $metaBoxProps->nonceName;
    }

    public function klabMetaConstructor_addMetabox() {
        /*example props */
        /*$labMemberMetaBoxProps = (object) [
            'metaboxTitle' => 'Lab member info',
            'metaboxId' => 'klab_labMemberInfo',
            'inputFields' =>
                array(
                    (object) [
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ],
                        'inputId' => 'klabMemberName',
                        'inputLabelText' => 'Name',
                    ],
                    (object) [
                        'inputAttributes' => (object) [
                            'type' => 'textarea',
                        ],
                        'inputId' => 'klabMemberDescription',
                        'inputLabelText' => 'Description',
                    ]
                )
        ];*/

        add_meta_box($this->metaBoxProps->metaboxId, $this->metaBoxProps->metaboxTitle, array($this, 'klabMetaConstructor_addMetaboxes_cb'), $this->postTypeName);

    }

    public function klabMetaConstructor_addMetaboxes_cb($post)
    {

        MetaboxUtil::echoNonce($this->nonceName);
        foreach ($this->metaBoxProps->inputFields as $input) {

            MetaboxUtil::echoMetaBox($post, $input);

        }

    }

    public function klabMetaConstructor_saveMetaBox_cb($post_id ) {



        foreach ($this->metaBoxProps->inputFields as $input) {

            MetaBoxUtil::klab_saveBoxMeta($post_id, $this->nonceName, $input->inputId);

        }
    }
}