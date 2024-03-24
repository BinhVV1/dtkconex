<?php 
defined( 'ABSPATH' ) || exit;

/*
 * Return fallback plugin version by slug
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function groffer_fallback_plugin_version($plugin_slug = ''){
	$plugins = array(
	    "modeltheme-framework-groffer" => "1.9.1",
	    "js_composer" => "6.10.0",
	    "revslider" => "6.6.7"
	);

	return $plugins[$plugin_slug];
}


/*
 * Return plugin version by slug from remote json
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function groffer_plugin_version($plugin_slug = ''){

    $request = wp_remote_get('https://modeltheme.com/json/plugin_versions.json');
    $plugin_versions = json_decode(wp_remote_retrieve_body($request), true);

	if( is_wp_error( $request ) ) {
		return groffer_fallback_plugin_version($plugin_slug);
	}else{
    	return $plugin_versions[0][$plugin_slug];
	}

}