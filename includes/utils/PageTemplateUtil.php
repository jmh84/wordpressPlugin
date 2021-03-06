<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 26.11.2016
 * Time: 8:11
 */

/**temporary code, to be refactored**/
class PageTemplateUtil
{
    const PAGE_TEMPLATE_NAME = "template-bio.php";
    const POST_TYPE_NAME = "page";

    public static function addTemplateMetaboxes() {

            $bioDetailsMetaBoxProps = (object)[
                'metaboxTitle' => 'Bio details',
                'metaboxId' => 'bioDetails',
                'nonceName' => 'bioDetailsNonce',
                'inputFields' =>
                    array(
                        (object)[
                            'inputAttributes' => (object)[
                                'type' => 'textarea',
                            ],
                            'inputId' => 'bioDetails',
                            'inputLabelText' => 'Bio details'
                        ]
                    )
            ];
            $bioCVMetaBoxProps = (object)[
                'metaboxTitle' => 'CV',
                'metaboxId' => 'CV',
                'nonceName' => 'CVNonce',
                'inputFields' =>
                    array(
                        (object)[
                            'inputAttributes' => (object)[
                                'type' => 'textarea',
                            ],
                            'inputId' => 'CV',
                            'inputLabelText' => 'CV'
                        ]
                    )
            ];

            $metaBoxConstructor = new Klab_metaBoxConstructor($bioDetailsMetaBoxProps, static::POST_TYPE_NAME, static::PAGE_TEMPLATE_NAME);
            $metaBoxConstructor->createAndSaveMetas();

            $metaBoxConstructor = new Klab_metaBoxConstructor($bioCVMetaBoxProps, static::POST_TYPE_NAME, static::PAGE_TEMPLATE_NAME);
            $metaBoxConstructor->createAndSaveMetas();
            add_action( 'edit_form_after_title', 'PageTemplateUtil::klab_pageTemplate_topicForEditor_cb' );

    }

    public static function klab_pageTemplate_topicForEditor_cb() {
        global $post;
        $currentPageTemplate = get_post_meta( $post->ID, '_wp_page_template', true );
        if(!empty($post) && STATIC::POST_TYPE_NAME === $post->post_type && $currentPageTemplate === STATIC::PAGE_TEMPLATE_NAME) {

            echo '<div class="editorTitle"><h4>Short quote:</h4></div>';
        }
    }


}