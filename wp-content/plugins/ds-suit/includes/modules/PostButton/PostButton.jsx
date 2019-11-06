// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class PostButton extends Component {

    static slug = 'dss_post_button';

    static css(props) {
        const additionalCss = [];

        // Apply button margin if necessary
        if (props.button_margin) {
            const button_margin = props.button_margin.split("|");
            const button_margin_last_edited = props.button_margin_last_edited;
            const button_margin_responsive_active = button_margin_last_edited && button_margin_last_edited.startsWith("on");

            additionalCss.push([{
                selector: '%%order_class%%.et_pb_module .et_pb_button',
                declaration: `margin-top: ${button_margin[0]}; margin-right: ${button_margin[1]}; margin-bottom: ${button_margin[2]}; margin-left: ${button_margin[3]};`,
            }]);


            if (props.button_margin_tablet && button_margin_responsive_active && props.button_margin_tablet && '' !== props.button_margin_tablet) {
                const button_margin_tablet = props.button_margin_tablet.split("|");
                additionalCss.push([{
                    selector: '%%order_class%%.et_pb_module .et_pb_button',
                    declaration: `margin-top: ${button_margin_tablet[0]}; margin-right: ${button_margin_tablet[1]}; margin-bottom: ${button_margin_tablet[2]}; margin-left: ${button_margin_tablet[3]};`,
                    device: 'tablet',
                }]);
            }

            if (props.button_margin_phone && button_margin_responsive_active && props.button_margin_phone && '' !== props.button_margin_phone) {
                const button_margin_phone = props.button_margin_phone.split("|");
                additionalCss.push([{
                    selector: '%%order_class%%.et_pb_module .et_pb_button',
                    declaration: `margin-top: ${button_margin_phone[0]}; margin-right: ${button_margin_phone[1]}; margin-bottom: ${button_margin_phone[2]}; margin-left: ${button_margin_phone[3]};`,
                    device: 'phone',
                }]);
            }
        }

        // Apply button padding if necessary
        if (props.button_padding) {
            const button_padding = props.button_padding.split("|");
            const button_padding_last_edited = props.button_padding_last_edited;
            const button_padding_responsive_active = button_padding_last_edited && button_padding_last_edited.startsWith("on");

            additionalCss.push([{
                selector: '%%order_class%%.et_pb_module .et_pb_button',
                declaration: `padding-top: ${button_padding[0]}; padding-right: ${button_padding[1]} !important; padding-bottom: ${button_padding[2]}; padding-left: ${button_padding[3]} !important;`,
            }]);


            if (props.button_padding_tablet && button_padding_responsive_active && props.button_padding_tablet && '' !== props.button_padding_tablet) {
                const button_padding_tablet = props.button_padding_tablet.split("|");
                additionalCss.push([{
                    selector: '%%order_class%%.et_pb_module .et_pb_button',
                    declaration: `padding-top: ${button_padding_tablet[0]}; padding-right: ${button_padding_tablet[1]} !important; padding-bottom: ${button_padding_tablet[2]}; padding-left: ${button_padding_tablet[3]} !important;`,
                    device: 'tablet',
                }]);
            }

            if (props.button_padding_phone && button_padding_responsive_active && props.button_padding_phone && '' !== props.button_padding_phone) {
                const button_padding_phone = props.button_padding_phone.split("|");
                additionalCss.push([{
                    selector: '%%order_class%%.et_pb_module .et_pb_button',
                    declaration: `padding-top: ${button_padding_phone[0]}; padding-right: ${button_padding_phone[1]} !important; padding-bottom: ${button_padding_phone[2]}; padding-left: ${button_padding_phone[3]} !important;`,
                    device: 'phone',
                }]);
            }
        }

        return additionalCss;
    }

    render() {
        const props = this.props;
        const utils = window.ET_Builder.API.Utils;
        const buttonTarget = 'on' === props.url_new_window ? '_blank' : '';
        const buttonIcon = props.button_icon ? utils.processFontIcon(props.button_icon) : false;
        const buttonClassName = {
            et_pb_button: true,
            et_pb_custom_button_icon: props.button_icon,
        };
        const url = window.location.origin + window.location.pathname;

        if (!props.button_text || !url) {
            return '';
        }

        return (
            <div className='et_pb_button_wrapper'>
                <a
                    className={utils.classnames(buttonClassName)}
                    href={url}
                    target={buttonTarget}
                    rel={utils.linkRel(props.button_rel)}
                    data-icon={buttonIcon}
                >
                    {props.button_text}
                </a>
            </div>
        );
    }
}

export default PostButton;
