// External Dependencies
import React from 'react';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';

class Footer extends AjaxComponent {

    static slug = 'dss_footer';

    static css(props) {
        const additionalCss = [];

        additionalCss.push([{
            selector: '%%order_class%% footer#main-footer ',
            declaration: `background-color: ${props.footer_bg_color};`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% footer#main-footer #footer-widgets',
            declaration: `background-color: ${props.sidebar_bg_color};`,
        }]);

        additionalCss.push([{
            selector: '%%order_class%% footer#main-footer #et-footer-nav',
            declaration: `background-color: ${props.nav_menu_bg_color};`,
        }]);
        
        additionalCss.push([{
            selector: '%%order_class%% footer#main-footer #footer-bottom',
            declaration: `background-color: ${props.bottom_bar_bg_color};`,
        }]);

        return additionalCss;
    }

    _shouldReload(oldProps, newProps) {
        return oldProps.show_sidebar !== newProps.show_sidebar ||
            oldProps.show_nav_menu !== newProps.show_nav_menu;
    }

    _reloadData(props) {
        var data = {
            action: 'dss_footer',
            show_nav_menu: props.show_nav_menu,
            show_sidebar: props.show_sidebar,
            nonce: window.DsSuitBuilderData.nonces.dss_footer
        };

        if ("number" === props.count_type) {
            data.count_to = props.count_to_number;
            data.count_from = props.count_from_number;
        } else {
            data.count_to = props.count_to_date;
            data.count_from = props.count_from_date;
        }

        return data;
    }

    render() {
        return super.render();
    }

    _render() {
        return (<div dangerouslySetInnerHTML={{ __html: this.state.result.footer }}></div>);
    }

}

export default Footer;
