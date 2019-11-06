// External Dependencies
import React from 'react';
// import { findDOMNode } from 'react-dom';
import $ from 'jquery';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';

class Bucket extends AjaxComponent {

    static slug = 'dss_bucket';

    componentDidUpdate(prevProps) {
        super.componentDidUpdate(prevProps);
        $(".dss_bucket .dss_bucket_link").dss_hover_link_double_tap();
    }

    static css(props) {
        const additionalCss = [];

        if (props.height) {
            const height_responsive_active = props.height_last_edited && props.height_last_edited.startsWith("on");

            additionalCss.push([{
                selector: '%%order_class%% .dss_bucket_wrapper',
                declaration: `height: ${props.height};`,
            }]);


            if (props.height_tablet && height_responsive_active) {
                additionalCss.push([{
                    selector: '%%order_class%% .dss_bucket_wrapper',
                    declaration: `height: ${props.height_tablet};`,
                    device: 'tablet',
                }]);
            }

            if (props.height_phone && height_responsive_active) {
                additionalCss.push([{
                    selector: '%%order_class%% .dss_bucket_wrapper',
                    declaration: `height: ${props.height_phone};`,
                    device: 'phone',
                }]);
            }
        }

        additionalCss.push([{
            selector: '%%order_class%% .dss_bucket_image.tablet, %%order_class%% .dss_bucket_image.phone',
            declaration: "display: none;",
        }]);


        additionalCss.push([{
            selector: '%%order_class%% .dss_bucket_image.desktop, %%order_class%% .dss_bucket_image.phone',
            declaration: "display: none;",
            device: 'tablet',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .dss_bucket_image.tablet',
            declaration: "display: unset;",
            device: 'tablet',
        }]);


        additionalCss.push([{
            selector: '%%order_class%% .dss_bucket_image.desktop, %%order_class%% .dss_bucket_image.tablet',
            declaration: "display: none;",
            device: 'phone',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .dss_bucket_image.phone',
            declaration: "display: unset;",
            device: 'phone',
        }]);


        if (props.background_hover_animation === 'zoom_out') {
            additionalCss.push([{
                selector: '%%order_class%%:hover .dss_bucket_image',
                declaration: "transform: scale(1.0) !important;",
            }]);

            additionalCss.push([{
                selector: '%%order_class%% .dss_bucket_image',
                declaration: "transform: scale(1.1) !important;",
            }]);
        }

        if (props.background_hover_animation === 'zoom_in') {
            additionalCss.push([{
                selector: '%%order_class%%:hover .dss_bucket_image',
                declaration: "transform: scale(1.1) !important;",
            }]);

            additionalCss.push([{
                selector: '%%order_class%% .dss_bucket_image',
                declaration: "transform: scale(1.0) !important;",
            }]);
        }


        if ('on' === props.background_hover_blur) {
            additionalCss.push([{
                selector: '%%order_class%%:hover .dss_bucket_image',
                declaration: `filter: blur(${props.background_hover_blur_radius});`,
            }]);
        }

        return additionalCss;
    }

    _shouldReload(oldProps, newProps) {
        let shouldReload = oldProps.image !== newProps.image ||
            oldProps.image_size_desktop !== newProps.image_size_desktop ||
            oldProps.image_size_tablet !== newProps.image_size_tablet ||
            oldProps.image_size_phone !== newProps.image_size_phone;
        return shouldReload;
    }

    _reloadData(props) {
        return {
            action: 'dss_bucket',
            image: props.image,
            image_size_desktop: props.image_size_desktop,
            image_size_tablet: props.image_size_tablet,
            image_size_phone: props.image_size_phone,
            nonce: window.DsSuitBuilderData.nonces.dss_bucket
        };
    }

    render() {
        return super.render();
    }

    _render() {
        const Content = (
            <div className="dss_bucket_wrapper">
                {this._renderImage()}
                <div className="dss_bucket_text_container">
                    {this._renderTitle()}
                    {this._renderContent()}
                </div>
            </div>
        );
        
        if (this.props.url && '' !== this.props.url) {
            return (
                <a className="dss_bucket_link" href={this.props.url} target={this.props.url_new_window === 'on' ? "_blank" : "_self"}>
                    {Content}
                </a >
            );
        } else {
            return Content;
        }
    }

    _renderTitle() {
        const HeaderLevel = this.props.header_level;
        if(HeaderLevel === undefined) { return null; }
        return (
            <div className="dss_bucket_title_wrapper">
                <HeaderLevel className="dss_bucket_title">
                    {this.props.title}
                </HeaderLevel>
            </div>
        );
    }

    _renderContent() {
        return (
            <div className="dss_bucket_content_wrapper">
                <div className="dss_bucket_content">
                    {this.props.content()}
                </div>
            </div>
        );
    }

    _renderImage() {
        const result = this.state.result;
        if (result.is_svg) {
            return (
                <div className="dss_bucket_image_container" style={{ display: "block" }}>
                    <img className="dss_bucket_image" src={result.image_url} alt={result.image_alt} title={result.image_title} />
                </div>
            );
        } else {
            return (
                <div className="dss_bucket_image_container">
                    <img className="dss_bucket_image desktop" src={result.image_desktop_url} alt={result.image_alt} title={result.image_title} />
                    <img className="dss_bucket_image tablet" src={result.image_tablet_url} alt={result.image_alt} title={result.image_title} />
                    <img className="dss_bucket_image phone" src={result.image_phone_url} alt={result.image_alt} title={result.image_title} />
                </div>
            );
        }
    }

}

export default Bucket;
