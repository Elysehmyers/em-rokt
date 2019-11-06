import React, { Component } from 'react';
import './style.css';
import $ from 'jquery';
import { findDOMNode } from 'react-dom';

class VideoLightbox extends Component {

    static slug = 'dss_video_lightbox';

    componentDidUpdate() {
        const lightbox = findDOMNode(this.refs.lightbox);

        if (!lightbox) {
            return;
        }

        $(lightbox).magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            disableOn: 'on' === this.props.lightbox_on_mobile ? 0 : 768,
        });
    }

    static css(props) {
        var css = [];

        if('off' === props.image_as_element) {
            css.push([{
                selector: "%%order_class%% .wrapper",
                declaration: `background-image: url(${props.thumbnail}); cursor: pointer;`
            }]);

            const mobile = props.height_last_edited && props.height_last_edited.startsWith('on');
            const height = props.height;
            const height_tablet = mobile && props.height_tablet ? props.height_tablet : height;
            const height_phone = mobile && props.height_phone ? props.height_phone : height_tablet;
    
            css.push([{
                selector: "%%order_class%% .wrapper",
                declaration: `height: ${height}`
            }]);
    
            css.push([{
                selector: "%%order_class%% .wrapper",
                declaration: `height: ${height_tablet}`,
                device: 'tablet',
            }]);
    
            css.push([{
                selector: "%%order_class%% .wrapper",
                declaration: `height: ${height_phone}`,
                device: 'phone',
            }]);

        } else {
            css.push([{
                selector: "%%order_class%% .wrapper img",
                declaration: `width: 100%;`
            }]);
        }

        css.push([{
            selector: "%%order_class%% .wrapper .play-button:after",
            declaration: `border-left-color: ${props.play_button_icon_color}`
        }]);

        css.push([{
            selector: "%%order_class%% .wrapper:hover .play-button:after",
            declaration: `border-left-color: ${props.play_button_icon_color_hover}`
        }]);

        css.push([{
            selector: "%%order_class%% .wrapper .play-button",
            declaration: `background: ${props.play_button_background_color}`
        }]);

        css.push([{
            selector: "%%order_class%% .wrapper:hover .play-button",
            declaration: `background: ${props.play_button_background_color_hover}`
        }]);


        

        return css;
    }

    render() {
        var image = null;
        if('on' === this.props.image_as_element) {
            image = (<img src={this.props.thumbnail} alt="videoligthbox thumbnail"/>)
        }

        const target = 'on' === this.props.open_new_tab ? '_blank' : '';
        const video = this.props.video.replace("youtu.be/", "youtube.com/watch?v=");
        return (
            <div className="wrapper">
                {image}
                <div ref="lightbox" className="video" href={video} target={target}></div>
                <div className="play-button"></div>
            </div>
        );
    }
}

export default VideoLightbox;
