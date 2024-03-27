<?php
/** Function for setting the content width of a theme. */
function infinity_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's content width. */
function infinity_get_content_width() {
	global $content_width;
	return $content_width;
}

/** Function for getting the theme's data */
function infinity_theme_data() {
	global $infinity;
	
	/** If the parent theme data isn't set, let grab it. */
	if ( empty( $infinity->theme_data ) ) {
		
		$infinity_theme_data = array();
		$theme_data = wp_get_theme( 'infinity' );
		$infinity_theme_data['Name'] = $theme_data->get( 'Name' );
		$infinity_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
		$infinity_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
		$infinity_theme_data['Description'] = $theme_data->get( 'Description' );
		
		$infinity->theme_data = $infinity_theme_data;
	
	}

	/** Return the parent theme data. */
	return $infinity->theme_data;
}
?>