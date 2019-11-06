// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class LibraryLayout extends Component {

  static slug = 'dss_library_layout';

  static css(props) {
    const additionalCss = [];

    additionalCss.push([{
      selector: '%%order_class%% .dss_edit_layout_button',
      declaration: 'background: #29c4a9; color: white; padding: 10px 20px; margin-top: 10px; border-radius: 3px; display: inline-block;',
    }]);

    additionalCss.push([{
      selector: '%%order_class%% .et-fb-loader',
      declaration: 'z-index: 2;',
    }]);

    additionalCss.push([{
      selector: '%%order_class%% .et-fb-loader-inline:after',
      declaration: 'content: ""; display: inline-block; background: white; position: absolute; top: 50%; width: 50px; height: 50px;right: 50%; transform: translate(50%, -50%); z-index: 1; border-radius: 100%; box-shadow: 0px 2px 20px 2px rgba(0, 0, 0, 0.3);',
    }]);

    return additionalCss;
  }

  render() {
    var layout = "";
    var button = "";

    if (!this.props.post_id || "0" === this.props.post_id || isNaN(this.props.post_id)) {
      layout = "no layout selected";
    } else {
      layout = this.props.post_id;
      const url = window.DsSuitBuilderData.misc.site_url + "/wp-admin/post.php?post=" + this.props.post_id + "&action=edit";
      button = (<div><a className="dss_edit_layout_button" href={url} target="_blank">Click here to edit</a></div>)
    }

    return (
      <div className="et_vb_supportless_module ">
        <div className="et-vb-supportless-module-inner">
          <div>Library Layout: {layout}</div>
          {button}
        </div>
      </div>
    );
  }
}

export default LibraryLayout;
