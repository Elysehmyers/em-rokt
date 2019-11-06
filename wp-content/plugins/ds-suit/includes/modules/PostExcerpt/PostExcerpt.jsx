// External Dependencies
import React from 'react';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';


class PostExcerpt extends AjaxComponent {

    static slug = 'dss_post_excerpt';

    static css(props) {
        const additionalCss = [];

        // additionalCss.push([{
        //     selector: '%%order_class%% .dss_post_excerpt_text',
        //     declaration: "margin-bottom: " + props.read_more_distance + " !important;",
        // }]);

        return additionalCss;
    }

    _shouldReload(oldProps, newProps) {
        return oldProps.limit !== newProps.limit || oldProps.more !== newProps.more;
    }

    _reloadData(props) {
        return {
            action: 'dss_get_post_excerpt',
            post_id: window.ETBuilderBackend.postId,
            limit: props.limit || '',
            more: props.more || '',
            nonce: window.DsSuitBuilderData.nonces.dss_get_post_excerpt
        };
    }

    render() {
        return super.render();
    }

    _render() {
        return (
            <div className="dss_post_excerpt_wrapper">
                <div className="dss_post_excerpt_text">{this.state.result.excerpt}</div>
                {this._readMore()}
            </div>
        );
    }

    _readMore() {
        if ('on' === this.props.read_more) {
            return (<a className="dss_post_excerpt_read_more" href={this.state.result.permalink}>{this.props.read_more_text}</a>);
        } else {
            return '';
        }
    }

}

export default PostExcerpt;
