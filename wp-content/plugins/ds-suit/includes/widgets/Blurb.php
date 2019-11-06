<?php

namespace DiviSenseiSuit;

// Creating the widget
class DSS_Blurb_Widget extends \WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'ds_suit_blurb',
            __('Blurb', 'ds-suit'),
            array('description' => __('Blurb widget to show image and text.', 'ds-suit'))
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $image = $instance['image'];
        $url = $instance['link_url'];
        $url_new_window = $instance['link_new_window'];
        $description = $instance['description'];

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if (!empty($url)) {
            $target = !empty($url_new_window) ? ' target="_blank"' : '';
            echo '<a href="' . $url . '"' . $target . '>';
        }

        if (!empty($image)) {
            echo '<img src="' . esc_url($image) . '" alt="">';
        }

        if (!empty($description)) {
            echo '<p>' . $description . '</p>';
        }

        if (!empty($url)) {
            echo '</a>';
        }

        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'ds-suit');
        $image = !empty($instance['image']) ? $instance['image'] : '';
        $link_url = !empty($instance['link_url']) ? $instance['link_url'] : '';
        $link_new_window = !empty($instance['link_new_window']) ? $instance['link_new_window'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';

        ?>

        <p>
           <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:');?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_url($image); ?>" />
           <button class="upload_image_button button button-primary"><?php echo esc_html__("Upload Image", "ds-suit"); ?></button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('link_url'); ?>"><?php _e('Link URL:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" type="text" value="<?php echo esc_attr($link_url); ?>" />
        </p>
        
        <p>            
            <input class="widefat" id="<?php echo $this->get_field_id('link_new_window'); ?>" name="<?php echo $this->get_field_name('link_new_window'); ?>" type="checkbox" value="1" <?php checked( $link_new_window, 1, true ); ?> />
            <label for="<?php echo $this->get_field_name('link_new_window'); ?>"><?php _e('Open link in new window');?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('description'); ?>"><?php _e('Description:');?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" ><?php echo esc_attr($description); ?></textarea>
        </p>

    <?php }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['image'] = !empty($new_instance['image']) ? $new_instance['image'] : '';
        $instance['link_url'] = !empty($new_instance['link_url']) ? $new_instance['link_url'] : '';
        $instance['link_new_window'] = !empty($new_instance['link_new_window']) ? $new_instance['link_new_window'] : '';
        $instance['description'] = !empty($new_instance['description']) ? $new_instance['description'] : '';
        return $instance;
    }
}