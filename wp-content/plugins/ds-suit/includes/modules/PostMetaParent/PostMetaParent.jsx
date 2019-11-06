// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class PostMetaParent extends Component {

    static slug = 'dss_post_meta_parent';

    static css(props) {
        const additionalCss = [];

        additionalCss.push([{
            selector: '%%order_class%%',
            declaration: "text-align: " + props.align + ";",
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .dss_post_meta_child',
            declaration: "display: inline;",
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .dss_post_meta_child > div',
            declaration: "display: inline;",
        }]);

        additionalCss.push([{
            selector: '%%order_class%% .dss_post_meta_direction_horizontal .dss_loading_indicator',
            declaration: "display: inline-block;",
        }]);

        return additionalCss;
    }

    render() {
        
        const props = this.props;

        var classes = 'post-meta dss_post_meta_direction_' + props.direction;

        const prefix = 'horizontal' === props.direction ? (<span className="separator text">{props.prefix_separator}</span>) : '';
        const suffix = 'horizontal' === props.direction ? (<span className="separator text">{props.suffix_separator}</span>) : '';

        var items = [];

        if (props.content && props.content.length > 0) {
            props.content.forEach((child, index) => {
                items.push(child);
                if (index < (props.content.length - 1) && 'horizontal' === props.direction && '' !== props.separator) {
                    items.push((<span key={"separator" + index} className="separator text">{props.separator}</span>));
                }
            });
        }


        return (
            <div className={classes}>
                {prefix}
                {items}
                {suffix}
            </div>
        );
    }

}

export default PostMetaParent;
