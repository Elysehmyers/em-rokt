<?php

class DSS_Another_Post extends ET_Builder_Module
{

    public $slug = 'dss_another_post';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Another Post', 'ds-suit');
    }

    public function get_custom_css_fields_config()
    {
        $fields = [];

        // $fields['dss_countdown_flip_clock_time'] = [
        //     'label' => 'Flip Clock Time',
        //     'selector' => '%%order_class%% .flip_clock .time',
        // ];

        return $fields;
    }

    public function get_settings_modal_toggles()
    {
        $toggles = [];

        $toggles['general'] = [
            'toggles' => [
                'content' => esc_html__('Content', 'ds-suit'),
            ],
        ];

        return $toggles;
    }

    public function get_fields()
    {
        $fields = [];
        $posts = [];

        $post_types = [
            'off' => esc_html__('Select Post Type...', 'ds-suit'),
        ];

        foreach (get_post_types(array('public' => true, '_builtin' => true), 'objects', 'and') as $post_type) {
            if ('attachment' === $post_type->name) {continue;}
            $post_types[$post_type->name] = $post_type->label;
        }

        foreach (get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and') as $post_type) {
            $post_types[$post_type->name] = $post_type->label;
        }

        $fields['post_type'] = [
            'label' => esc_html__('Post Type', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'toggle_slug' => 'content',
            'options' => $post_types,
            'default' > 'off',
            'computed_affects'   => [
                '__post_title',
            ],
        ];

        $computed_depends_on = ['post_type'];

        foreach ($post_types as $post_type => $post_label) {
            $posts_of_post_type = [
                'off' => esc_html__('Select Post...', 'ds-suit'),
            ];

            $query = new WP_Query(['post_type' => $post_type]);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $posts_of_post_type[get_the_ID()] = get_the_title();
                }
            }
            wp_reset_postdata();

            $fields['post_type_' . $post_type] = [
                'label' => $post_label,
                'type' => 'select',
                'option_category' => 'basic_option',
                'toggle_slug' => 'content',
                'options' => $posts_of_post_type,
                'default' > 'off',
                'show_if' => [
                    'post_type' => $post_type,
                ],
                'computed_affects'   => [
                    '__post_title',
                ],
            ];

            $computed_depends_on[] = 'post_type_' . $post_type;
        }

        $fields['__post_title'] = [
            'type'                => 'computed',
            'computed_callback'   => array( 'DSS_Another_Post', 'get_post_title' ),
            'computed_depends_on' => $computed_depends_on,
            // 'computed_minimum' => array(
            //     'audio',
            // ),
        ];
        return $fields;
    }

    function get_post_title($args = array(), $conditional_tags = array(), $current_page = array()) {
        $defaults = array(
            'post_type' => 'off',
		);

        if('off' === $args["post_type"]) {
            return;
        }

        $post_type = $args["post_type"];
        if('off' === $args["post_type_" . $post_type] || '' === $args["post_type_" . $post_type]) {
            return;
        }

        $post = $args["post_type_" . $post_type];

        return get_the_title($post);
    }

    public function get_advanced_fields_config()
    {
        $fields = [];

        //Disable Text settings because we add our own
        $fields["text"] = false;
        $fields["text_shadow"] = false;
        $fields['fonts'] = false;
        $fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];
        return $fields;
    }

    public function render($attrs, $content = null, $render_slug)
    {

        $post_type = $this->props['post_type'];
        
        if('off' === $post_type) {
            return esc_html__('No Post Type selected.', 'ds-suit');
        }

        $post_id = $this->props['post_type_' . $post_type];

        if($post_id <= 0) {
            return esc_html__('No Post selected.', 'ds-suit');
        }
        
        return apply_filters('dss_another_post', get_post_field('post_content', $post_id));
        // if (in_the_loop() && $post_type) {
        // } else if (get_post_meta(get_the_ID(), "_views_template", true) > 0) {
        //     return apply_filters('dss_another_post', get_the_content());
        // } else {
        //     return esc_html__('Another Post Content module cannot be displayed on this post because it would cause a infinite rendering loop. Please use Post Content modules only on inside The Loop or in Post Templates.', 'ds-suit');
        // }
    }

    public function dss_clean_field_name($name)
    {
        return str_replace('-', "__dash__", $name);
    }

    public function dss_unclean_field_name($name)
    {
        return str_replace("__dash__", '-', $name);
    }

}

new DSS_Another_Post;
