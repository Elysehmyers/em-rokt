import React, { Component } from 'react';
import $ from 'jquery';

class AjaxComponent extends Component {

    constructor(props) {
        super(props);
        this.state = {
            isLoaded: false,
            result: null,
            error: null,
        };
    }

    componentDidMount() {
        this._reload(this.props);
    }

    componentWillUnmount(){
        this._abortRunningAjaxCall();
    }

    componentDidUpdate(prevProps) {
        const newProps = this.props;
        const oldProps = prevProps;

        if(!this.props || !prevProps){
            return;
        }

        if (this._shouldReload(oldProps, newProps)) {
            this.setState({
                isLoaded: false
            });
            this._reload(newProps);
        }
    }

    _shouldReload(oldProps, newProps) {
        throw new Error('You must implement the method _shouldReload(oldProps, newProps)');
        //Example
        //return oldProps.value_which_needs_to_be_changed_to_cause_reload != newProps.value_which_needs_to_be_changed_to_cause_reload
    }

    _reloadData(props) {
        throw new Error('You must implement the method _reloadData(props)');
        //Example:
        // return {
        //     action: 'dss_action',
        //     post_id: window.ETBuilderBackend.postId,
        //     toolset_field: props.some_prop,
        //     nonce: window.DsSuitBuilderData.nonces.dss_nonce_field
        // };
    }

    _reload(props) {
        //Cancel running Ajax call if any
        this._abortRunningAjaxCall();

        //Make new Ajax call
        const component = this;
        this.ajaxCall = $.ajax({
            url: window.et_fb_options.ajaxurl,
            type: 'POST',
            data: this._reloadData(props),
            success: function (response) {
                if (response.success === false) {
                    component.setState({
                        isLoaded: true,
                        error: "Error: Failed to load"
                    });
                } else {
                    component.setState({
                        isLoaded: true,
                        result: response,
                    });
                }
            },
            complete: function() {
                component.ajaxCall = null;
            }
        });
    }

    _abortRunningAjaxCall(){
        if(this.ajaxCall !== undefined && this.ajaxCall !== null && this.ajaxCall.readyState !== 4){
            this.ajaxCall.abort();
        }
    }

    _render() {
        throw new Error('You must implement the method _render()');
    }

    render() {
        if (this.state.error) {
            return (<div>{this.state.error.message}</div>);
        } else if (!this.state.isLoaded) {
            return (
                <div
                    className="dss_loading_indicator"
                    style={{
                        height: 100 + 'px',
                        minWidth: 100 + 'px'
                    }}
                >
                    <div className="et-fb-loader-wrapper">
                        <div className="et-fb-loader"></div>
                    </div>
                </div>
            );
        } else {
            return this._render();
        }
    }
}

export default AjaxComponent;
