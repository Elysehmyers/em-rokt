// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class PostContent extends Component {

    static slug = 'dss_another_post';


    static css(props) {
        const additionalCss = [];

        additionalCss.push([{
        selector: '%%order_class%% .dss_edit_post_button',
        declaration: 'background: #29c4a9; color: white; padding: 10px 20px; margin-top: 10px; border-radius: 3px; display: inline-block;',
        }]);

        return additionalCss;
    }
    
    render() {
        console.log("Ick bins", this.props.__post_title);

        var selected_post = null;
        if (this.props.__post_title && "" !== this.props.__post_title) {
            const selected = (
                <div>{window.DsSuitBuilderData.l10n.selected_post} "{this.props.__post_title}"</div>
            );

            const post = this.props["post_type_" + this.props.post_type];
            const url = `${window.DsSuitBuilderData.misc.site_url}/wp-admin/post.php?post=${post}&action=edit`;
            const button = (<div><a className="dss_edit_post_button" href={url} target="_blank">{window.DsSuitBuilderData.l10n.click_to_edit}</a></div>);
            selected_post = (<div>
                {selected}
                {button}</div>
            );
        } else {
            selected_post = window.DsSuitBuilderData.l10n.no_post_selected;
        }

        return (
            <div className="et_vb_supportless_module ">
                <div className="et-vb-supportless-module-inner">
                    <div>{window.DsSuitBuilderData.l10n.another_post}</div>
                    {selected_post}
                </div>
            </div>
        );
    }

}

export default PostContent;
