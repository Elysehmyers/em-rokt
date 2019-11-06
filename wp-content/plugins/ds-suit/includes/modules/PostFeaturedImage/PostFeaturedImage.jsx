// External Dependencies
import React from 'react';
import $ from 'jquery';
import { findDOMNode } from 'react-dom';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';


class PostFeaturedImage extends AjaxComponent {

    static slug = 'dss_post_featured_image';

    static css(props) {
        const additionalCss = [];

        additionalCss.push([{
            selector: '%%order_class%% .dss_svg_image',
            declaration: "display: block;",
        }]);

        if ('on' === props.force_fullwidth) {

            additionalCss.push([{
                selector: '%%order_class%%',
                declaration: "max-width: 100% !important;",
            }]);

            additionalCss.push([{
                selector: '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
                declaration: "width: 100%;",
            }]);
        }

        if ('' !== props.align) {
            additionalCss.push([{
                selector: '%%order_class%%',
                declaration: "text-align: " + props.align + ";",
            }]);
        }

        if ('center' !== props.align) {
            additionalCss.push([{
                selector: '%%order_class%%',
                declaration: "margin-" + props.align + ": 0;",
            }]);
        }

        if ('on' === props.use_overlay) {
            if ('' !== props.overlay_icon_color) {
                additionalCss.push([{
                    selector: '%%order_class%% .et_overlay:before',
                    declaration: "color: " + props.overlay_icon_color + ";",
                }]);
            }

            if ('' !== props.hover_overlay_color) {
                additionalCss.push([{
                    selector: '%%order_class%% .et_overlay',
                    declaration: "background-color: " + props.hover_overlay_color + ";",
                }]);
            }
        }

        return additionalCss;
    }

    componentDidUpdate(prevProps) {
        super.componentDidUpdate(prevProps)
        
        const lightbox = findDOMNode(this.refs.lightbox);

        if (!lightbox) return;

        $(lightbox).magnificPopup({
            type: 'image',
            removalDelay: 500,
            mainClass: 'mfp-fade',
            zoom: {
                enabled: true,
                duration: 500,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    }

    _shouldReload(oldProps, newProps) {
        return oldProps.image_size !== newProps.image_size;
    }

    _reloadData(props) {
        return {
            action: 'dss_get_post_featured_image',
            post_id: window.ETBuilderBackend.postId,
            image_size: props.image_size,
            nonce: window.DsSuitBuilderData.nonces.dss_get_post_featured_image
        };
    }

    render() {
        return super.render();
    }

    _render() {

        const props = this.props;
        const result = this.state.result;
        const utils = window.ET_Builder.API.Utils;

        if (!result.src) return null;

        var overlay_output = null;
        if ('on' === props.use_overlay) {
            const hover_icon = props.hover_icon ? utils.processFontIcon(props.hover_icon) : false;
            overlay_output = (<span className={'' !== hover_icon ? "et_overlay et_pb_inline_icon" : "et_overlay"} data-icon={hover_icon}></span>);
        }

        var classNames = "et_pb_image_wrap"
        classNames += result.is_svg ? ' dss_svg_image' : '';

        var output = (
            <span className={classNames}>
                <img className="dss_post_featured_image_image" src={result.src} alt={result.alt} title={result.title} />
                {overlay_output}
            </span>
        )

        if ('post' === props.image_link) {
            output = (<a href={result.permalink}>{output}</a>);
        } else if ('lightbox' === props.image_link) {
            output = (<a ref="lightbox" href={result.src} className="et_pb_lightbox_image" title={result.title}>{output}</a>);
        } else if ('custom' === props.image_link) {
            output = (<a href={props.url}>{output}</a>);
        }

        var wrapper_classes = "et_pb_module et_pb_image";
        wrapper_classes += 'on' === props.use_overlay ? ' et_pb_has_overlay' : '';
        wrapper_classes += 'on' === props.always_center_on_mobile ? ' et_always_center_on_mobile' : '';

        return (<div className={wrapper_classes}>{output}</div>);
    }

}

export default PostFeaturedImage;
