<?php

class DSS_TransformableImage extends ET_Builder_Module
{

    public $slug = 'dss_transformable_image';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Transformable Image', 'ds-suit');
    }

    public function get_settings_modal_toggles(){
        return array(
            'general' => [
                'toggles' => [
                    'image' => esc_html__('Image', 'ds-suit'),
                ],
            ],
        );
    }

    public function get_fields()
    {
        return array(
            'image' => array(
                'label' => esc_html__('Image', 'ds-suit'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'description' => esc_html__('upload your image', 'ds-suit'),
                'toggle_slug' => 'image',
                'choose_text' => esc_html__('choose image', 'ds-suit'),
                'upload_button_text' => esc_html__('upload image ', 'ds-suit'),
                'update_text' => esc_html__('update image', 'ds-suit'),
                'data_type' => 'image',
            ),

            'perspective' => array(
                'label' => esc_html__('Perspective', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'image',
                'range_settings' => array(
                    'min' => '1',
                    'max' => '2000',
                    'step' => '1',
                ),
                'fixed_unit' => 'px',
                'validate_unit' => true,
                'default' => '1000px',
                'hover' => 'tabs',
            ),

            'rotate_x' => array(
                'label' => esc_html__('Rotate x', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'image',
                'range_settings' => array(
                    'min' => '-90',
                    'max' => '90',
                    'step' => '1',
                ),
                'fixed_unit' => 'deg',
                'validate_unit' => true,
                'default' => '0deg',
                'hover' => 'tabs',
            ),

            'rotate_y' => array(
                'label' => esc_html__('Rotate y', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'image',
                'range_settings' => array(
                    'min' => '-90',
                    'max' => '90',
                    'step' => '1',
                ),
                'fixed_unit' => 'deg',
                'validate_unit' => true,
                'default' => '0deg',
                'hover' => 'tabs',
                
                'default_unit' => 'deg',
                'default_on_front' => '0deg',
            ),

            'rotate_z' => array(
                'label' => esc_html__('Rotate z', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'image',
                'range_settings' => array(
                    'min' => '-90',
                    'max' => '90',
                    'step' => '1',
                ),
                'fixed_unit' => 'deg',
                'validate_unit' => true,
                'default' => '0deg',
                'hover' => 'tabs',
            ),

            'anim_duration' => array(
                'label' => esc_html__('Animation Duration', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'image',
                'range_settings' => array(
                    'min' => '0',
                    'max' => '1000',
                    'step' => '100',
                ),
                'fixed_unit' => 'ms',
                'validate_unit' => true,
                'default' => '300ms',
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dss_wrapper.dss_wrapper",
                            'border_styles' => "%%order_class%% .dss_wrapper.dss_wrapper",
                        ),
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dss_wrapper.dss_wrapper',
                        'custom_style' => true,
                    ),
                ),
            ),
            'max_width' => array(
                'options' => array(
                    'max_width' => array(
                        'depends_show_if' => 'off',
                    ),
                ),
            ),
            'fonts' => false,
            'text' => false,
            'button' => false,
            'link_options' => false,
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
        );
    }

    public function get_custom_css_fields_config(){
        return [
            'dss_image_wrapper' => [
                'label' => 'Image Wrapper',
                'selector' => '%%order_class%% .dss_wrapper.dss_wrapper',
            ],
            'dss_image' => [
                'label' => 'Image',
                'selector' => '%%order_class%% .dss_wrapper.dss_wrapper img',
            ],
        ];
    }

    public function render($attrs, $content = null, $render_slug)
    {
        $perspective = $this->props["perspective"];
        $rotateX = $this->props["rotate_x"];
        $rotateY = $this->props["rotate_y"];
        $rotateZ = $this->props["rotate_z"];

        $hover_perspective = isset($this->props["rotate_perspective__hover_enabled"]) && $this->props["rotate_perspective__hover_enabled"] === 'on' ? $this->props["rotate_perspective__hover"] : $this->props["perspective"];
        $hover_rotateX = isset($this->props["rotate_x__hover_enabled"]) && $this->props["rotate_x__hover_enabled"] === 'on' ? $this->props["rotate_x__hover"] : $this->props["rotate_x"];
        $hover_rotateY = isset($this->props["rotate_y__hover_enabled"]) && $this->props["rotate_y__hover_enabled"] === 'on' ? $this->props["rotate_y__hover"] : $this->props["rotate_y"];
        $hover_rotateZ = isset($this->props["rotate_z__hover_enabled"]) && $this->props["rotate_z__hover_enabled"] === 'on' ? $this->props["rotate_z__hover"] : $this->props["rotate_z"];

        $anim_duration = $this->props["anim_duration"];

        ET_Builder_Element::set_style($render_slug, array(
            "selector" => "%%order_class%% .dss_wrapper img",
            "declaration" => "display: block;",
        ));

        ET_Builder_Element::set_style($render_slug, array(
            "selector" => "%%order_class%%",
            "declaration" => "-webkit-perspective: {$perspective};",
        ));
        
        ET_Builder_Element::set_style($render_slug, array(
            "selector" => "%%order_class%% .dss_wrapper",
            "declaration" => "-ms-transform: perspective({$perspective}) rotateX({$rotateX}) rotateY({$rotateY}) rotateZ({$rotateZ});
                              -webkit-transform: perspective({$perspective}) rotateX({$rotateX}) rotateY({$rotateY}) rotateZ({$rotateZ}); 
                              transform: perspective({$perspective}) rotateX({$rotateX}) rotateY({$rotateY}) rotateZ({$rotateZ}); 
                              border-style: solid;
                              transition-duration: {$anim_duration}", 
        ));

        ET_Builder_Element::set_style($render_slug, array(
            "selector" => "%%order_class%% .dss_wrapper:hover",
            "declaration" => "-ms-transform: perspective({$hover_perspective}) rotateX({$hover_rotateX}) rotateY({$hover_rotateY}) rotateZ({$hover_rotateZ});
                              -webkit-transform: perspective({$hover_perspective}) rotateX({$hover_rotateX}) rotateY({$hover_rotateY}) rotateZ({$hover_rotateZ});
                              transform: perspective({$hover_perspective}) rotateX({$hover_rotateX}) rotateY({$hover_rotateY}) rotateZ({$hover_rotateZ});",
        ));

        return sprintf(
            '<div class="dss_wrapper">
			    %1$s
			</div>',
            $this->get_image_by_attachment_url($this->props["image"])
        );
    }

    private function get_image_by_attachment_url($url) {

        $id = attachment_url_to_postid($url);
        if($id > 0) {
            $image_title = get_the_title($id);
            $image_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        } else {
            $image_title = '';
            $image_alt = '';
        }
        
        return "<img src='$url' title='$image_title' alt='$image_alt'/>";
    }
}

new DSS_TransformableImage;
