// External Dependencies
import React from 'react';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';


class PostTitle extends AjaxComponent {

    static slug = 'dss_post_title';

    static css(props) {
        const css = [];

        if ('on' === props.featured_image_background) {
            css.push([{
                selector: '%%order_class%% .dss_post_title_title',
                declaration: `background-position: ${props.title_background_position}; background-size: ${props.title_background_size};`,
            }]);
        }

        css.push([{
            selector: '%%order_class%% .dss_post_title_title',
            declaration: `display: ${props.title_display};`,
        }]);

        css.push(window.DSSuit.get_responsive_css(props, "title_margin", "%%order_class%% .dss_post_title_title", "margin"));
        css.push(window.DSSuit.get_responsive_css(props, "title_padding", "%%order_class%% .dss_post_title_title", "padding"));

        return css
    }

    componentDidUpdate(prevProps) {
        super.componentDidUpdate(prevProps);
    }

    _shouldReload(oldProps, newProps) {
        return false;
    }

    _reloadData(props) {
        return {
            action: 'dss_get_post_title',
            post_id: window.ETBuilderBackend.postId,
            nonce: window.DsSuitBuilderData.nonces.dss_get_post_title
        };
    }

    render() {
        return super.render();
    }

    _render() {
        const TitleElement = this.props.title_level;
        if (TitleElement === undefined) { return null; }

        var title = this.state.result.title;
        var styles = {};

        if ('on' === this.props.featured_image_background) {
            styles.backgroundImage = `url(${this.state.result.featured_image})`;
        }

        if ('on' === this.props.title_link) {
            title = (<a href={this.state.result.permalink}>{title}</a>);
        }


        return (<TitleElement style={styles} className="dss_post_title_title">{title}</TitleElement>
        );
    }

}

export default PostTitle;
