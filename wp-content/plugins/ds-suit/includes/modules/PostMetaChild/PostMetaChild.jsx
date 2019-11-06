// External Dependencies
import React, {Fragment} from 'react';

// Internal Dependencies
import AjaxComponent from './../base/AjaxComponent';
import './style.css';


class PostMetaChild extends AjaxComponent {

    static slug = 'dss_post_meta_child';

    _shouldReload(oldProps, newProps) {
        return oldProps.meta_type !== newProps.meta_type ||
        oldProps.taxonomy !== newProps.taxonomy ||
        oldProps.taxonomy_separator !== newProps.taxonomy_separator ||
        oldProps.date_format !== newProps.date_format;
    }

    _reloadData(props) {
        var data = {
            action: 'dss_get_post_meta',
            meta_type: props.meta_type || 'author',
            post_id: window.ETBuilderBackend.postId,
            nonce: window.DsSuitBuilderData.nonces.dss_get_post_meta
        };

        if(props.meta_type === "taxonomy") {
            data.taxonomy = props.taxonomy;
            data.separator = props.taxonomy_separator;
        }

        if(props.meta_type === "date" || props.meta_type === "editdate"){
            data.format = props.date_format;
        }

        if(props.meta_type === "meta") {
            data.meta_field = props.meta_field;
        }

        return data;
    }
    
    render(){
        return super.render();
    }

    _render() {
        const utils = window.ET_Builder.API.Utils;
        const props = this.props;
        const result = this.state.result;

        var prefix = null;
        var icon = null;
        var content = null;
        var suffix = null;

        //Append the icon if necessary
        if ('on' === props.use_icon && '' !== props.icon) {
            const font_icon = utils.processFontIcon(props.icon);
            const style = '' !== props.icon_color ? { color: props.icon_color } : {};
            const space = 'on' === props.use_icon_space ? ' ' : '';
            icon = (<Fragment>{space}<span className="icon" style={style}>{font_icon}</span>{space}</Fragment>);
        }

        //Append the prefix if necessary
        if ('' !== props.meta_prefix) {
            prefix = (<span className="prefix text">{props.meta_prefix}</span>);
        }

        var no_value = false;

        // //Append the meta information
        switch (props.meta_type) {
            case 'author':
                if(!result.author){
                    no_value = true;
                }
                content = (<span className="author link" dangerouslySetInnerHTML={{ __html: result.author }}></span>);
                break;
            case 'date':
            case 'editdate':
                if(!result.date){
                    no_value = true;
                }
                content = (<span className="date text">{result.date}</span>);
                break;
            case 'taxonomy':
                if(!result.taxonomy){
                    no_value = true;
                }
                content = (<span className="categories link" dangerouslySetInnerHTML={{ __html: result.taxonomy }}></span>);
                break;
            case 'comments':
                if(!result.comments){
                    no_value = true;
                }
                content = (<span className="comment link" dangerouslySetInnerHTML={{ __html: result.comments }}></span>);
                break;
            case 'meta':
                if(!result.meta_field){
                    no_value = true;
                }
                content = (<span className="post_meta" dangerouslySetInnerHTML={{ __html: result.meta_field }}></span>);
                break;
            default:
                break
        }

        //Append the suffix if necessary
        if ('' !== props.meta_suffix) {
            suffix = (<span className="suffix text">{props.meta_suffix}</span>);
        }

        var output = [];        

        if('before_prefix' === props.icon_position){
            output.push(icon);
        }

        output.push(prefix);
        
        if('before_content' === props.icon_position){
            output.push(icon);
        }
        
        output.push(content);

        if(no_value){
            output.push((<div className="dss_post_meta_item">No value found. This child will not be displayed on the frontend.</div>));
        }

        if('after_content' === props.icon_position){
            output.push(icon);
        }
        
        output.push(suffix);

        if('after_suffix'  === props.icon_position){
            output.push(icon);
        }

        //Finalize meta field and append to global array so the parent module can use it
        return (
            <div className="dss_post_meta_item">
                {output}
            </div>
        );
    }
}

PostMetaChild.defaultProps = {
    meta_type: 'author',
};


export default PostMetaChild;
