// External Dependencies
import React, { Component } from 'react';


// Internal Dependencies
import './style.css';


class TransformableImage extends Component {

    static slug = 'dss_transformable_image';


    static css(props) {
        let perspective = props.perspective;
        let rotateX = props.rotate_x;
        let rotateY = props.rotate_y;
        let rotateZ = props.rotate_z;

        let hover_perspective = props.rotate_perspective__hover_enabled === 'on' ? props.rotate_perspective__hover : props.perspective;
        let hover_rotateX = props.rotate_x__hover_enabled === 'on' ? props.rotate_x__hover : props.rotate_x;
        let hover_rotateY = props.rotate_y__hover_enabled === 'on' ? props.rotate_y__hover : props.rotate_y;
        let hover_rotateZ = props.rotate_z__hover_enabled === 'on' ? props.rotate_z__hover : props.rotate_z;

        let anim_duration = props.anim_duration;

        var css = [];

        css.push([{
            selector: "%%order_class%% .dss_wrapper",
            declaration: `transform: perspective(${perspective}) rotateX(${rotateX}) rotateY(${rotateY}) rotateZ(${rotateZ});`
        }]);

        css.push([{
            selector: "%%order_class%% .dss_wrapper:hover",
            declaration: `transform: perspective(${hover_perspective}) rotateX(${hover_rotateX}) rotateY(${hover_rotateY}) rotateZ(${hover_rotateZ});`
        }]);

        css.push([{
            selector: "%%order_class%% .dss_wrapper",
            declaration: `transition-duration: ${anim_duration};`
        }]);

        css.push(window.DSSuit.get_border_css(
            props,
            "default",
            "%%order_class%% .dss_wrapper",
            "%%order_class%% .dss_wrapper"
        ));

        console.log("Props sind ", props);

        return css;
    };

    render() {
        return (
            <div className='dss_wrapper'>
                <img src={this.props.image} alt=""></img>
            </div>
        );
    }
}

export default TransformableImage;
