<?php
/** Core Theme Framework */
class Infinity {
	
	/** Constructor Method */
	function __construct() {

		/** Define a Global variable Standard Class */
		global $infinity;
		$infinity = new stdClass;
		
		/** Define framework, parent theme, and child theme constants. */
		add_action( 'after_setup_theme', array( &$this, 'constants' ), 1 );
		
		/** Load the core functions required by the rest of the framework. */
		add_action( 'after_setup_theme', array( &$this, 'core' ), 2 );
		
		/** Language functions and translations setup. */
		add_action( 'after_setup_theme', array( &$this, 'i18n' ), 3 );
		
		/** Load the framework functions. */
		add_action( 'after_setup_theme', array( &$this, 'functions' ), 12 );
		
		/** Load admin files. */
		add_action( 'wp_loaded', array( &$this, 'admin' ) );		

	}
	
	/** Define Constant Paths */
	function constants() {

		/** Directory Location Constants */
		
		/** Sets the path to the parent theme directory. */
		define( 'INFINITY_DIR', trailingslashit( get_template_directory() ) );
		define( 'INFINITY_LIB_DIR', trailingslashit( INFINITY_DIR . 'lib' ) );
		
		define( 'INFINITY_FUNCTIONS_DIR', trailingslashit( INFINITY_LIB_DIR . 'functions' ) );
		define( 'INFINITY_ADMIN_DIR', trailingslashit( INFINITY_LIB_DIR . 'admin' ) );
		define( 'INFINITY_JS_DIR', trailingslashit( INFINITY_LIB_DIR . 'js' ) );
		define( 'INFINITY_CSS_DIR', trailingslashit( INFINITY_LIB_DIR . 'css' ) );
		
		/** URI Location Constants */
		
		/** Sets the path to the parent theme directory URI. */
		define( 'INFINITY_URI', trailingslashit( get_template_directory_uri() ) );
		define( 'INFINITY_LIB_URI', trailingslashit( INFINITY_URI . 'lib' ) );
		
		define( 'INFINITY_ADMIN_URI', trailingslashit( INFINITY_LIB_URI . 'admin' ) );
		define( 'INFINITY_JS_URI', trailingslashit( INFINITY_LIB_URI . 'js' ) );
		define( 'INFINITY_CSS_URI', trailingslashit( INFINITY_LIB_URI . 'css' ) );
		
	}
	
	/** Loads the core framework functions. */
	function core() {
		
		/** Load the core framework functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'core.php' );
	
	}
	
	/** Loads translation files */
	function i18n() {

		/** Translations can be filed in the /languages/ directory */
		load_theme_textdomain( 'infinity', INFINITY_DIR . 'languages' );
		
	}
	
	/** Loads the framework functions. */
	function functions() {

		/** Load media-related functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'media.php' );
		
		/** Load utility functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'utility.php' );
		
		/** Load theme settings functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'settings.php' );
		
		/** Load menus functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'menus.php' );		
		
		/** Load sidebars functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'sidebars.php' );
		
		/** Load featured image functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'featured-image.php' );
		
		/** Load custom header functions. */
		require_once( INFINITY_FUNCTIONS_DIR . 'custom-header.php' );
		
	}
	
	/** Load admin files for the framework. */
	function admin() {

		/* Check if in the WordPress admin. */
		if ( is_admin() ) {

			/* Load the main admin file. */
			require_once( INFINITY_ADMIN_DIR . 'admin.php' );

		}
	}	
	
}
?>