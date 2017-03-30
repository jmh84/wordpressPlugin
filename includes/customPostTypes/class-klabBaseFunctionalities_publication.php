<?php

/**
 * Created by PhpStorm.
 * User: aino
 * Date: 22.9.2016
 * Time: 22:09
 */
class KlabBaseFunctionalities_publication extends klabCustomPostType
{
    const SLUG = 'klab_publication';

    protected static function createPostType()
    {
        $labels = array(
        	'show_in_rest' => true,
            'name'               => _x( 'Publications', 'post type general name', 'klab' ),
            'singular_name'      => _x( 'Publication', 'post type singular name', 'klab' ),
            'menu_name'          => _x( 'Publications', 'admin menu', 'klab' ),
            'name_admin_bar'     => _x( 'Publications', 'add new on admin bar', 'klab' ),
            'add_new'            => _x( 'Add New', 'publication', 'klab' ),
            'add_new_item'       => __( 'Add New publication', 'klab' ),
            'new_item'           => __( 'New publication', 'klab' ),
            'edit_item'          => __( 'Edit publications', 'klab' ),
            'view_item'          => __( 'View publications', 'klab' ),
            'all_items'          => __( 'All publications', 'klab' ),
            'search_items'       => __( 'Search publications', 'klab' ),
            'parent_item_colon'  => __( 'Parent publication:', 'klab' ),
            'not_found'          => __( 'No publications found.', 'klab' ),
            'not_found_in_trash' => __( 'No publications found in Trash.', 'klab' )
        );


        $supports = array( 'title');
        $titleHint = 'Insert publication title';

        parent::createPostTypeUsingConstructor(static::SLUG, $labels, $supports, $titleHint);

    }


    protected static function setTaxonomies() {
        return;
    }
    protected static function createMetaboxes() {
    	 
        /*"25081398": {
            "uid": "25081398",
            "pubdate": "2014 Jul-Aug",
            "epubdate": "2014 May 20",
            "source": "Prog Cardiovasc Dis",
            "authors": [
                {
                    "name": "Villarraga HR",
                    "authtype": "Author",
                    "clusterid": ""
                }
            ],
            "lastauthor": "Nkomo VT",
            "title": "Cardio-oncology: role of echocardiography.",
            "sorttitle": "cardio oncology role of echocardiography",
            "volume": "57",
            "issue": "1",
            "pages": "10-8",
            "lang": [
                "ENG"
            ],
            "nlmuniqueid": "0376442",
            "issn": "0033-0620",
            "essn": "1873-1740",
            "pubtype": [
                "Journal Article",
                "Review"
            ],
            "recordstatus": "PubMed - indexed for MEDLINE",
            "pubstatus": "4",
            "articleids": [
                {
                    "idtype": "pubmed",
                    "idtypen": 1,
                    "value": "25081398"
                }
            ],
            "history": [
                {
                    "pubstatus": "entrez",
                    "date": "2014/08/02 06:00"
                },
                {
                    "pubstatus": "pubmed",
                    "date": "2014/08/02 06:00"
                },
                {
                    "pubstatus": "medline",
                    "date": "2014/10/24 06:00"
                }
            ],
            "references": [
            ],
            "attributes": [
                "Has Abstract"
            ],
            "pmcrefcount": 5,
            "fulljournalname": "Progress in cardiovascular diseases",
            "elocationid": "doi: 10.1016/j.pcad.2014.05.002",
            "doctype": "citation",
            "srccontriblist": [
            ],
            "booktitle": "",
            "medium": "",
            "edition": "",
            "publisherlocation": "",
            "publishername": "",
            "srcdate": "",
            "reportnumber": "",
            "availablefromurl": "",
            "locationlabel": "",
            "doccontriblist": [
            ],
            "docdate": "",
            "bookname": "",
            "chapter": "",
            "sortpubdate": "2014/01/01 00:00",
            "sortfirstauthor": "Villarraga HR",
            "vernaculartitle": ""
        },*/
        $publicationDetailsMetaboxProps = (object) [
            'metaboxTitle' => 'Publication details',
            'metaboxId' => 'klab_publicationDetails',
            'nonceName' => 'publicationDetailsNonce',
            'inputFields' =>
                array(
                    (object) [
                        'inputId' => 'uid',
                        'inputLabelText' => 'Pubmed uid',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'pubdate',
                        'inputLabelText' => 'Publication date',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'source',
                        'inputLabelText' => 'Pubmed source',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'authors',
                        'inputLabelText' => 'Authors',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'volume',
                        'inputLabelText' => 'Volume',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'issue',
                        'inputLabelText' => 'Issue',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'pages',
                        'inputLabelText' => 'Pages',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'fulljournalname',
                        'inputLabelText' => 'Full journal name',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'booktitle',
                        'inputLabelText' => 'Book title',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'medium',
                        'inputLabelText' => 'Medium',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'edition',
                        'inputLabelText' => 'Edition',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'publisherlocation',
                        'inputLabelText' => 'Publisher location',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],
                    (object) [
                        'inputId' => 'publishername',
                        'inputLabelText' => 'Publisher name',
                        'inputAttributes' => (object) [
                            'type' => 'text',
                        ]
                    ],

                )
        ];

        $abstractMetaBoxProps = (object) [
            'metaboxTitle' => 'Publication abstract',
            'metaboxId' => 'abstractMetaBox',
            'nonceName' => 'publicationAbstractNonce',
            'inputFields' =>
                array(
                    (object) [
                        'inputAttributes' => (object) [
                            'type' => 'textarea',
                        ],
                        'inputId' => 'abstract',
                        'inputLabelText' => 'Abstract'
                    ]
                )
        ];

        parent::createMetaBox($publicationDetailsMetaboxProps, STATIC::SLUG);
        parent::createMetaBox($abstractMetaBoxProps, STATIC::SLUG);
        $addBoxes = 'add_meta_boxes_'.STATIC::SLUG;
        add_action('edit_form_top', 'KlabBaseFunctionalities_publication::testi');

        return;
    }
    

    public static function testi(){
    	wp_enqueue_script( 'test', plugins_url( '/klabBaseFunctionalities-admin.js', __FILE__ ), array('jquery'), '1.0', true );
    	/*wp_localize_script( test, 'test', array(
    	 'root' => esc_url_raw( rest_url() ),
    	 'nonce' => wp_create_nonce( 'wp_rest' ),
    	 'jee' => 'jotain',
    	 'current_user_id' => get_current_user_id(),
    	 'url' => admin_url( 'admin-ajax.php' ))
    	
    	);*/
    	$test= wp_create_nonce( 'test_nonce' );
    	wp_localize_script( 'test', 'test', array(
    			'current_user_id' => get_current_user_id(),
    			'root' => esc_url_raw( rest_url() ),
    			'nonce' => wp_create_nonce( 'test_nonce' ),
    			'url' => admin_url( 'admin-ajax.php' )
    	));
    	echo '<p onclick="jee()"><input type="checkbox"     
		name="checkbox1" onclick = "jee()" />
    			Testii</p>';
    }
}