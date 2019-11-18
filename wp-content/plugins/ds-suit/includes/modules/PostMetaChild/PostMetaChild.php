<?php

class DSS_Post_Meta_Child extends ET_Builder_Module
{

    public $slug = 'dss_post_meta_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'meta_type';
    public $child_title_fallback_var = 'admin';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {

        $this->name = esc_html__('Sensei Post Meta', 'ds-suit');

        $this->advanced_setting_title_text = esc_html__('New Meta Item', 'ds-suit');

        $this->settings_text = esc_html__('Meta Item Settings', 'ds-suit');

        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'meta' => esc_html__('Meta', 'ds-suit'),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'meta' => esc_html__('Meta', 'ds-suit'),
                    'text' => [
                        'title' => esc_html__('Text', 'ds-suit'),
                        'priority' => 49,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'text' => [
                                'name' => 'Text',
                                'icon' => 'text-left',
                            ],
                            'link' => [
                                'name' => 'Link',
                                'icon' => 'text-link',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->custom_css_fields = array(
            'icon' => array(
                'label' => esc_html__('Icon', 'ds-suit'),
                'selector' => '%%order_class%% span.icon',
            ),
            'prefix' => array(
                'label' => esc_html__('Prefix', 'ds-suit'),
                'selector' => '%%order_class%% span.prefix',
            ),
            'text' => array(
                'label' => esc_html__('Text (e. g. Prefix, Suffix or Date)', 'ds-suit'),
                'selector' => '%%order_class%% span.text',
            ),
            'text_link' => array(
                'label' => esc_html__('Links (e. g. Author, Terms or Comments)', 'ds-suit'),
                'selector' => '%%order_class%% span.link',
            ),
            'suffix' => array(
                'label' => esc_html__('Suffix', 'ds-suit'),
                'selector' => '%%order_class%% span.suffix',
            ),
            'author' => array(
                'label' => esc_html__('Author', 'ds-suit'),
                'selector' => '%%order_class%% span.link.author',
            ),
            'date' => array(
                'label' => esc_html__('Date', 'ds-suit'),
                'selector' => '%%order_class%% span.text.date',
            ),
            'taxonomy' => array(
                'label' => esc_html__('Taxonomy', 'ds-suit'),
                'selector' => '%%order_class%% span.link.taxonomy',
            ),
            'comments' => array(
                'label' => esc_html__('Comments', 'ds-suit'),
                'selector' => '%%order_class%% span.link.comments',
            ),

        );

    }

    public function get_fields()
    {
        $fields = [];

        $fields['meta_type'] = array(
            'label' => esc_html__('Type', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'options' => array(
                // ''     =>  esc_html__( '--Select--', 'ds-suit' ),
                'author' => esc_html__('Author', 'ds-suit'),
                'date' => esc_html__('Publishing Date', 'ds-suit'),
                'taxonomy' => esc_html__('Taxonomy', 'ds-suit'),
                'comments' => esc_html__('Comments', 'ds-suit'),
                'editdate' => esc_html__('Last Edited Date', 'ds-suit'),
                'meta' => esc_html__('Post Meta Field', 'ds-suit'),
            ),
            'default' => 'author',
            'default_on_child' => true,
            'toggle_slug' => 'meta',
            'description' => esc_html__('The type of this meta item.', 'ds-suit'),

        );

        $fields['meta_prefix'] = array(
            'label' => esc_html__('Prefix', 'ds-suit'),
            'type' => 'text',
            'description' => esc_html__('Enter a custom prefix. Whitespaces are not added by default.', 'ds-suit'),
            'toggle_slug' => 'meta',
        );

        $fields['meta_suffix'] = array(
            'label' => esc_html__('Suffix', 'ds-suit'),
            'type' => 'text',
            'description' => esc_html__('Enter a custom suffix. Whitespace are not added by default.', 'ds-suit'),
            'toggle_slug' => 'meta',
        );

        $fields['date_format'] = array(
            'label' => esc_html__('Date Format', 'ds-suit'),
            'type' => 'text',
            'default' => 'M j, Y',
            'description' => sprintf(
                '%1$s <a target="_blank" href="https://www.w3schools.com/php/func_date_date_format.asp">%2$s</a>',
                esc_html__('Enter a custom date format or leave empty to use default. You can learn more about PHP date formats', 'ds-suit'),
                esc_html__('here', 'ds-suit')
            ),
            'toggle_slug' => 'meta',
            'show_if' => [
                'meta_type' => ['date', 'editdate'],
            ],
        );

        global $wp_taxonomies;
        global $wp_post_types;
        $taxonomy_options = array(
            '' => esc_html__('--Select Taxonomy--', 'ds-suit'),
        );
        foreach (get_taxonomies(array('public' => true), 'objects') as $tax) {
            foreach ($wp_taxonomies[$tax->name]->object_type as $post_type) {
                $post_type_obj = $wp_post_types[$post_type];
                $taxonomy_options[$tax->name] = $post_type_obj->labels->name . ' - ' . $tax->labels->name;
            }
        }

        $fields['taxonomy'] = array(
            'label' => esc_html__('Taxonomy', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'options' => $taxonomy_options,
            'toggle_slug' => 'meta',
            'description' => esc_html__('The taxonomy of the terms to display for this item.', 'ds-suit'),
            'show_if' => [
                'meta_type' => 'taxonomy',
            ],
        );

        $fields['taxonomy_separator'] = array(
            'label' => esc_html__('Separator', 'ds-suit'),
            'type' => 'text',
            'description' => esc_html__('Enter a custom separator to use if the post has multiple terms, e. g. ", ". A whitespace is not added by default.', 'ds-suit'),
            'toggle_slug' => 'meta',
            'show_if' => [
                'meta_type' => ['taxonomy'],
            ],
        );



        $meta_field_options = [
            '-' => esc_html__('--Select Meta Field--', 'ds-suit'),
        ];

        global $wpdb;        
        $metas = $wpdb->get_results( "SELECT DISTINCT meta_id, post_id, meta_key FROM {$wpdb->postmeta} WHERE 1");
        foreach ( $metas as $meta ){
            $meta_field_options[$meta->meta_key] = $meta->meta_key;
        }

        $fields['meta_field'] = array(
            'label' => esc_html__('Post Meta Field', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'options' => $meta_field_options,
            'toggle_slug' => 'meta',
            'default' => '-',
            'show_if' => [
                'meta_type' => ['meta'],
            ],
        );

        $fields['use_icon'] = array(
            'label' => esc_html__('Use Icon', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'default' => 'off',
            'toggle_slug' => 'meta',
            'tab_slug' => 'advanced',
            'description' => esc_html__('Whether or not to show an icon in front of this meta field.', 'ds-suit'),
        );
        
        $fields['icon_position'] = array(
            'label' => esc_html__('Icon Position', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'configuration',
            'default' => 'before_prefix',
            'options' => array(
                'before_prefix' => esc_html__('Before Prefix', 'ds-suit'),
                'before_content' => esc_html__('Before Content', 'ds-suit'),
                'after_content' => esc_html__('After Content', 'ds-suit'),
                'after_suffix' => esc_html__('After Suffix', 'ds-suit'),
            ),
            'show_if' => [
                'use_icon' => 'on',
            ],
            'toggle_slug' => 'meta',
            'tab_slug' => 'advanced',
            'description' => esc_html__('Where to show the icon.', 'ds-suit'),
        );

        $fields['use_icon_space'] = array(
            'label' => esc_html__('Add Space to Icon', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'meta',
            'tab_slug' => 'advanced',
            'description' => esc_html__('Whether or not to add a space before or after the icon.', 'ds-suit'),
            'show_if' => [
                'use_icon' => 'on',
            ],
        );

        $fields['icon_color'] = array(
            'label' => esc_html__('Icon Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'meta',
            'show_if' => [
                'use_icon' => ['on'],
            ],
        );

        $fields['icon'] = array(
            'label' => esc_html__('Icon', 'ds-suit'),
            'type' => 'select_icon',
            'option_category' => 'configuration',
            'class' => array('et-pb-font-icon'),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'meta',
            'show_if' => [
                'use_icon' => ['on'],
            ],
        );

        return $fields;
    }

    public function get_advanced_fields_config()
    {
        return array(
            'fonts' => array(
                'link' => array(
                    'label' => esc_html__('Links', 'ds-suit'),
                    'toggle_slug' => 'text',
                    'sub_toggle' => 'link',
                    'css' => array(
                        'main' => "%%order_class%% span.link",
                        'important' => 'all',
                    ),
                    'line_height' => array(
                        'default' => '1em',
                        'range_settings' => array(
                            'min' => '0.1',
                            'max' => '10',
                            'step' => '0.1',
                        ),
                    ),
                    'font_size' => array(
                        'default' => '1em',
                        'range_settings' => array(
                            'min' => '0.1',
                            'max' => '10',
                            'step' => '0.1',
                        ),
                    ),
                ),
                'text' => array(
                    'label' => esc_html__('Text', 'ds-suit'),
                    'toggle_slug' => 'text',
                    'sub_toggle' => 'text',
                    'css' => array(
                        'main' => "%%order_class%% span.icon, %%order_class%% span.text",
                        'important' => 'all',
                    ),
                    'line_height' => array(
                        'default' => '1em',
                        'range_settings' => array(
                            'min' => '0.1',
                            'max' => '10',
                            'step' => '0.1',
                        ),
                    ),
                    'font_size' => array(
                        'default' => '1em',
                        'range_settings' => array(
                            'min' => '0.1',
                            'max' => '10',
                            'step' => '0.1',
                        ),
                    ),
                ),
            ),
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
        );

    }

    public function render($attrs, $content = null, $render_slug)
    {

        $use_icon = $this->props['use_icon'];
        $icon_color = $this->props['icon_color'];
        $icon = $this->props['icon'];
        $meta_type = $this->props['meta_type'];
        $meta_prefix = $this->props['meta_prefix'];
        $meta_suffix = $this->props['meta_suffix'];
        $date_format = $this->props['date_format'];
        $taxonomy = $this->props['taxonomy'];
        $taxonomy_separator = $this->props['taxonomy_separator'];
        $meta_field = $this->props['meta_field'];

        //The output, our finished meta field
        $meta = '';

        $icon_span = '';

        //Append the icon if necessary
        if ('on' === $use_icon && '' !== $icon) {

            $icon_color = sprintf(
                'style="color: %1$s;"',
                esc_html($icon_color)
            );

            $icon_span = sprintf(
                '%3$s<span class="icon"%2$s>%1$s</span>%3$s',
                esc_attr(et_pb_process_font_icon($icon)),
                $icon_color,
                ('on' === $this->props['use_icon_space'] ? ' ' : '')
            );
        }

        if('before_prefix' === $this->props['icon_position']){
            $meta .= $icon_span;
        }
        //Append the prefix if necessary
        if ('' !== $meta_prefix) {
            $meta .= sprintf(
                '<span class="prefix text">%1$s</span>',
                $meta_prefix
            );
        }

        if('before_content' === $this->props['icon_position']){
            $meta .= $icon_span;
        }

        //Append the meta information
        if ('author' === $meta_type) {
            $author = et_pb_get_the_author_posts_link();
            if ('' === $author) {return '';}

            $meta .= sprintf(
                '<span class="author link">%1$s</span>',
                $author
            );
        } else if ('date' === $meta_type) {
            $date = get_the_date($date_format, get_the_ID());
            if ('' === $date) {return '';}

            $meta .= sprintf(
                '<span class="date text">%1$s</span>',
                $date
            );
        } else if ('editdate' === $meta_type) {
            $date = get_the_modified_date($date_format, get_the_ID());
            if ('' === $date) {return '';}

            $meta .= sprintf(
                '<span class="date text">%1$s</span>',
                $date
            );
        } else if ('taxonomy' === $meta_type) {
            if (!has_term(null, $taxonomy, get_the_ID())) {return '';}

            $taxonomies = get_the_term_list(get_the_ID(), $taxonomy, null, $taxonomy_separator, null);

            $meta .= sprintf(
                '<span class="categories link">%1$s</span>',
                $taxonomies
            );
        } else if ('comments' === $meta_type) {
            $comment = dss_get_comments_link();
            if ('' === $comment) {return '';}

            $meta .= sprintf(
                '<span class="comment link">%1$s</span>',
                $comment
            );
        } else if ('meta' === $meta_type) {
            $meta_value = get_post_meta(get_the_ID(), $meta_field, true);
            if ('' === $meta_value) {return '';}

            $meta .= sprintf(
                '<span class="post_meta">%1$s</span>',
                $meta_value
            );
        }

        if('after_content' === $this->props['icon_position']){
            $meta .= $icon_span;
        }

        //Append the suffix if necessary
        if ('' !== $meta_suffix) {
            $meta .= sprintf(
                '<span class="suffix text">%1$s</span>',
                $meta_suffix
            );
        }

        if('after_suffix' === $this->props['icon_position']){
            $meta .= $icon_span;
        }

        

        //Finalize meta field and append to global array so the parent module can use it
        global $meta_items;
        $meta_items[] = sprintf(
            '<div class="dss_post_meta_item">
				%1$s
			</div>',
            $meta
        );

    }
}

new DSS_Post_Meta_Child;
