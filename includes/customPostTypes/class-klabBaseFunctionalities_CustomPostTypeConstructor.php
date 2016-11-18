<?php
/*
 *
 * User: aino
 * Date: 17.9.2016
 * Time: 11:22
 */

class KlabBaseFunctionalities_CustomPostTypeConstructor
{

    // default arguments.
    const DEFAULT_ARGS = [
        'public' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'query_var' => false,
        'delete_with_user' => false,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
    ];


    /**@param string $post_type Post type name. (max. 20 characters, cannot contain capital letters or spaces)*/
    private $post_type;
    /**@param array $args An array of arguments for register_post_type.*/
    private $args;
    /**@param input fields to be removed from default*/
    private $fieldsToBeRemoved;
    private $postTitleHint;


    /**
     * CustomPostTypeBuilder constructor.
     * @param string $post_type_name gives the name for post_type
     */
    public function __construct($post_type_name)
    {
        if( post_type_exists($post_type_name)) {
            throw new InvalidArgumentException("post type name exists");
        }
        $this->post_type = $post_type_name;
    }

    /**
     * @param $args
     * @param bool $useDefaultArgs if true uses default args as base.
     */
    public function init($args, $useDefaultArgs = true)
    {

        if ($useDefaultArgs) {
            //note that when using this as args override settings from defaul_args
            $args = array_replace(self::DEFAULT_ARGS, $args);
        }
        $this->args = $args;

        add_action( 'init', array (&$this, 'register_post_type_cb'));
        //$this->add_meta_box();
    }

    public function initiateUsingDefaultArgs ($slug, $labels)
    {
        $args = array('labels' => $labels,
                      'rewrite' => array( 'slug' => $slug )
                                            );
        $this->init($args);
    }

    public function register_post_type_cb(){
        register_post_type($this->post_type, $this->args);
    }

    /**removes inputs from post edit admin view **/
    public function removeInputFields($arrayOfFields) {
        $this->fieldsToBeRemoved = $arrayOfFields;
        add_action('init', array($this, 'removeSupport'));


    }

    public function removeSupport() {
        foreach ($this->fieldsToBeRemoved as $fieldName) {
            remove_post_type_support($this->post_type, $fieldName);
        }
    }

    public function klab_changeTitleHint ( $postTitleHint) {
        $this->postTitleHint = $postTitleHint;
        add_filter( 'enter_title_here', array ($this, 'klab_changeTitleHint_cb' ));
    }

    public function klab_changeTitleHint_cb(){

        if  ( $this->post_type === get_current_screen()->post_type && $this->postTitleHint != null) {
            return $this->postTitleHint;
        }

    }


/*
    public function add_meta_box( $title, $inputAttributesByFieldName = array(), $context = 'normal', $priority = 'default' ) {

        $post_type_name = $this->post_type_name;
        $box_title      = ucwords( str_replace( '_', ' ', $title ) );

        // Make the fields global
        global $custom_fields;
        $custom_fields[$title] = $fields;

        add_action( 'admin_init', function() use( $box_id, $box_title, $post_type_name, $box_context, $box_priority, $fields ) {

            add_meta_box( $box_id, $box_title, function( $post, $data ) {
                global $post;

                // Nonce field for some validation
                wp_nonce_field( plugin_basename( __FILE__ ), 'custom_post_type' );

                // Get all inputs from $data
                $custom_fields = $data['args'][0];

                // Get the saved values
                $meta = get_post_custom( $post->ID );

                // Check the array and loop through it
                if( ! empty( $custom_fields ) ) {
                    /* Loop through $custom_fields
                    foreach( $custom_fields as $label => $type ) {
                        $field_id_name  = strtolower( str_replace( ' ', '_', $data['id'] ) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );

                        echo '<label for="' . $field_id_name . '">' . $label . '</label><input type="text" name="custom_meta[' . $field_id_name . ']" id="' . $field_id_name . '" value="' . $meta[$field_id_name][0] . '" />';
                    }
                }},
                $post_type_name,
                $box_context,
                $box_priority,
                array( $fields )
            );
        });

    }


    /*
    register_meta_box_cb
    (callback ) (optional) Provide a callback function that will be called when setting up the meta boxes
    for the edit form. The callback function takes one argument $post, which contains the WP_Post object for
    the currently edited post. Do remove_meta_box() and add_meta_box() calls in the callback.

    taxonomies
        (array) (optional) An array of registered taxonomies like category or post_tag that will be used with this post type. This can be used in lieu of calling register_taxonomy_for_object_type() directly. Custom taxonomies still need to be registered with register_taxonomy().

            Default: no taxonomies


    rewrite
    (boolean or array) (optional) Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.

            Default: true and use $post_type as slug

        $args array

        'slug' => string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
    'with_front' => bool Should the permalink structure be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
            'feeds' => bool Should a feed permalink structure be built for this post type. Defaults to has_archive value.
    'pages' => bool Should the permalink structure provide for pagination. Defaults to true
    'ep_mask' => const As of 3.4 Assign an endpoint mask for this post type (example). For more info see Rewrite API/add_rewrite_endpoint, and Make WordPress Plugins summary of endpoints.
                If not specified, then it inherits from permalink_epmask(if permalink_epmask is set), otherwise defaults to EP_PERMALINK.


    const DEFAULT_NUMBER_INPUT_ARGS = [
        'type' => 'number',
        'name' => 'quantity',
        'min' => '1',
        'max' => '100'
    ];
*/

}

