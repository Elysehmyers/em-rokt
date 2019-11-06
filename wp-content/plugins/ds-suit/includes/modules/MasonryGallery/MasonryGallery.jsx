// External Dependencies
import React, { Component } from 'react';
import $ from 'jquery';
import { findDOMNode } from 'react-dom';
import ResizeObserver from 'resize-observer-polyfill';

// Internal Dependencies
import './style.css';


class MasonryGallery extends Component {

    static slug = 'dss_masonry_gallery';

    static css(props) {
        const additionalCss = [];

        const columns = props.columns;
        const columns_responsive_active = props.columns_last_edited && props.columns_last_edited.startsWith("on");
        const columns_tablet = columns_responsive_active ? props.columns_tablet : columns;
        const columns_phone = columns_responsive_active ? props.columns_phone : columns_tablet;

        const gutter = props.gutter;
        const gutter_responsive_active = props.gutter_last_edited && props.gutter_last_edited.startsWith("on");
        const gutter_tablet = gutter_responsive_active && props.gutter_tablet ? props.gutter_tablet : gutter;
        const gutter_phone = gutter_responsive_active && props.gutter_phone ? props.gutter_phone : gutter_tablet;

        //Width of grid items
        additionalCss.push([{
            selector: '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            declaration: `width: calc((100% - ${(columns - 1) * gutter}px) / ${columns});`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            declaration: `width: calc((100% - ${(columns_tablet - 1) * gutter_tablet}px) / ${columns_tablet});`,
            device: 'tablet',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            declaration: `width: calc((100% - ${(columns_phone - 1) * gutter_phone}px) / ${columns_phone});`,
            device: 'phone',
        }]);

        //Gutter of grid items
        additionalCss.push([{
            selector: '%%order_class%% .grid-item',
            declaration: `margin-bottom: ${gutter}px;`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid-item',
            declaration: `margin-bottom: ${gutter_tablet}px;`,
            device: 'tablet',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid-item',
            declaration: `margin-bottom: ${gutter_phone}px;`,
            device: 'phone',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .gutter-sizer',
            declaration: `width: ${gutter}px;`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .gutter-sizer',
            declaration: `width: ${gutter_tablet}px;`,
            device: 'tablet',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .gutter-sizer',
            declaration: `width: ${gutter_phone}px;`,
            device: 'phone',
        }]);

        //Remove gutter from outer grid
        additionalCss.push([{
            selector: '%%order_class%% .grid',
            declaration: `margin-bottom: -${gutter}px;`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid',
            declaration: `margin-bottom: -${gutter_tablet}px;`,
            device: 'tablet',
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .grid',
            declaration: `margin-bottom: -${gutter_phone}px;`,
            device: 'phone',
        }]);

        //Border for Grid Items
        additionalCss.push(window.DSSuit.get_border_css(
            props,
            "grid_item",
            "%%order_class%% .grid .grid-item.et_pb_gallery_image",
            "%%order_class%% .grid .grid-item.et_pb_gallery_image"
        ));

        if ('on' === props.show_overflow) {
            additionalCss.push([{
                selector: '%%order_class%%.dss_masonry_gallery, %%order_class%%.dss_masonry_gallery .grid-item',
                declaration: 'overflow: visible !important;',
            }]);
        }

        if ('on' === props.use_overlay) {
            additionalCss.push([{
                selector: '%%order_class%%.dss_masonry_gallery .grid .grid-item .et_overlay',
                declaration: `background: ${props.overlay_color};`,
            }]);

            additionalCss.push([{
                selector: '%%order_class%%.dss_masonry_gallery .grid .grid-item .et_overlay:before',
                declaration: `color: ${props.overlay_icon_color};`,
            }]);
        }

        return additionalCss;
    }

    componentDidMount() {
        //console.log('MasonryGallery.componentDidMount: start', this.props.moduleInfo.address, this.props);
        if(this.props.__gallery !== null) {
            //console.log('MasonryGallery.componentDidMount: __gallery is already available. Setting up...', this.props.moduleInfo.address);
            this._setup_masonry();
        }
        //console.log('MasonryGallery.componentDidMount: end', this.props.moduleInfo.address);
    }

    componentDidUpdate(prevProps) {
        //console.log("MasonryGallery.componentDidUpdate: start", this.props.moduleInfo.address);
        if (prevProps.__gallery !== this.props.__gallery && this.props.__gallery !== null) {
            //console.log("MasonryGallery.componentDidUpdate: new __gallery", this.props.moduleInfo.address, prevProps, this.props);
            this._setup_masonry();
        }
        
        if(this.masonry){
            this.masonry.masonry('layout');
        }

        this._fix_overlay_icon();
        //console.log("MasonryGallery.componentDidUpdate: end", this.props.moduleInfo.address);
    }

    _setup_masonry(){
        //console.log("MasonryGallery._setup_masonry:  start", this.props.moduleInfo.address);
        const grid = findDOMNode(this.refs.grid);
        if (!grid) return;

        if(this.masonry){
            this.masonry.masonry('destroy');
        }

        this.masonry = $(grid).dss_masonry_gallery();
        
        this.resizeObserver = new ResizeObserver(entries => {
            // //console.log('MasonryGallery.componentDidMount: window-resize: masonry.layout', this.props.moduleInfo.address);
            this.masonry.masonry('layout');
        });
        
        this.resizeObserver.observe(grid);
        this._fix_overlay_icon();
        //console.log("MasonryGallery._setup_masonry:  end", this.props.moduleInfo.address);
    }

    _fix_overlay_icon(){
        if ('on' === this.props.use_overlay) {
            const utils = window.ET_Builder.API.Utils;
            const icon = utils.processFontIcon(this.props.hover_icon);
            $(findDOMNode(this)).find(".et_overlay").attr("data-icon", icon);
            // //console.log("setting icon to ", icon,  $(findDOMNode(this)).find(".et_overlay") );
        }
    }

    componentWillUnmount() {
        //console.log("MasonryGallery.componentWillUnmount", this.props.moduleInfo.address);
        if(this.resizeObserver){
            this.resizeObserver.disconnect();
        }
    }

    render() {
        //console.log("MasonryGallery.render", this.props.moduleInfo.address, this.props);
        return (
            <div className="grid" ref="grid" dangerouslySetInnerHTML={{ __html: this.props.__gallery }}></div>
        );
    }
}

export default MasonryGallery;
