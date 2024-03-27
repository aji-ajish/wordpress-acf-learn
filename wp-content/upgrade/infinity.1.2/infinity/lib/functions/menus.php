<?php
/** Register nav menus. */
add_action( 'init', 'infinity_register_menus' );

/** Registers the the core menus */
function infinity_register_menus() {

	/* Register the 'primary' menu. */
	register_nav_menu( 'infinity-primary-menu', __( 'Infinity Primary Menu', 'infinity' ) );
	
}
?>