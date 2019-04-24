<?php


function assetsPath($cat) {
	return get_template_directory_uri() . "/assets/" . $cat . "/";
}




/*
function getCurrentURI(){
    $scheme = is_ssl() ? 'https' : 'http';
    return "$scheme://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

function resolveAssetURI($subpath='') {
    return esc_url(rtrim(get_template_directory_uri(), '/') .'/assets/'. ltrim($subpath, '/'));
}

function resolveURI($path=''){
    return esc_url(get_home_url(null, $path));
}

function resolveArchiveURI($post_type){
    if(false === $url = get_post_type_archive_link($post_type)){
        throw new BadMethodCallException("Unsupported/unarchivable post_type [$post_type]");
    }
    return $url;
}
*/


