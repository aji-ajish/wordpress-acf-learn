<?php
class InfinityAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'infinity-admin-css-style', esc_url( INFINITY_ADMIN_URI . 'style.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'infinity-admin-js-infinity', esc_url( INFINITY_ADMIN_URI . 'common.js' ), array( 'jquery-ui-tabs' ) );
			wp_register_script( 'infinity-admin-js-jquery-cookie', esc_url( INFINITY_JS_URI . 'jquery-cookie/jquery.cookie.js' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $infinity;
			
			/** Register theme settings. */
			register_setting( 'infinity_options_group', 'infinity_options', array( &$this, 'infinity_options_validate' ) );
			
			/* Create the theme settings page. */
			$infinity->settings_page = add_theme_page( 
				esc_html( __( 'Infinity Options', 'infinity' ) ),	/** Settings page name. */
				esc_html( __( 'Infinity Options', 'infinity' ) ),	/** Menu item name. */
				$this->settings_page_capability(),				/** Required capability */
				'infinity-options', 								/** Screen name */
				array( &$this, 'settings_page' )				/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $infinity->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $infinity->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( INFINITY_ADMIN_DIR . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = infinity_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Add theme reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'infinity-theme',
				'title' => __( 'Theme Support', 'infinity' ),
				'content' => implode( '', file( INFINITY_ADMIN_DIR . 'help/support.html' ) ),				
				
				)
			);
			
			/** Add license reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'infinity-license',
				'title' => __( 'License', 'infinity' ),
				'content' => implode( '', file( INFINITY_ADMIN_DIR . 'help/license.html' ) ),				
				
				)
			);
			
			/** Add changelog reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'infinity-changelog',
				'title' => __( 'Changelog', 'infinity' ),
				'content' => implode( '', file( INFINITY_ADMIN_DIR . 'help/changelog.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'infinity' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Infinity Project', 'infinity' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Infinity Official Page', 'infinity' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Infinity Options Page */
			if( $hook === 'appearance_page_infinity-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'infinity-admin-css-style' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'infinity-admin-js-jquery-cookie' );
				wp_enqueue_script( 'infinity-admin-js-infinity' );				
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'infinity_section_blog', 'Blog Options', array( &$this, 'infinity_section_blog_fn' ), 'infinity_section_blog_page' );			
			
			add_settings_field( 'infinity_field_nav_style', __( 'Navigation Style', 'infinity' ), array( &$this, 'infinity_field_nav_style_fn' ), 'infinity_section_blog_page', 'infinity_section_blog' );
			
			/** Post Section */
			add_settings_section( 'infinity_section_post', 'Post Options', array( &$this, 'infinity_section_post_fn' ), 'infinity_section_post_page' );
			
			add_settings_field( 'infinity_field_post_style', __( 'Post Style', 'infinity' ), array( &$this, 'infinity_field_post_style_fn' ), 'infinity_section_post_page', 'infinity_section_post' );
			add_settings_field( 'infinity_field_featured_image_control', __( 'Post Featured Image', 'infinity' ), array( &$this, 'infinity_field_featured_image_control_fn' ), 'infinity_section_post_page', 'infinity_section_post' );
			
			/** Footer Section */
			add_settings_section( 'infinity_section_footer', 'Footer Options', array( &$this, 'infinity_section_footer_fn' ), 'infinity_section_footer_page' );
			
			add_settings_field( 'infinity_field_copyright_control', __( 'Use Copyright', 'infinity' ), array( &$this, 'infinity_field_copyright_control_fn' ), 'infinity_section_footer_page', 'infinity_section_footer' );
			add_settings_field( 'infinity_field_copyright', __( 'Enter Copyright Text', 'infinity' ), array( &$this, 'infinity_field_copyright_fn' ), 'infinity_section_footer_page', 'infinity_section_footer' );
			
			/** General Section */
			add_settings_section( 'infinity_section_general', 'General Options', array( &$this, 'infinity_section_general_fn' ), 'infinity_section_general_page' );
			
			add_settings_field( 'infinity_field_reset_control', __( 'Reset Theme Options', 'infinity' ), array( &$this, 'infinity_field_reset_control_fn' ), 'infinity_section_general_page', 'infinity_section_general' );
		
		}
		
		/** Configure default settings. */	
		function get_settings_default()  {
			
			$default = array(
					
				'infinity_nav_style' => 'numeric',
				
				'infinity_post_style' => 'content',
				'infinity_featured_image_control' => 'manual',
				
				'infinity_copyright_control' => 0,
				'infinity_copyright' => '',
				
				'infinity_reset_control' => 0
				
			);
			
			return $default;
			
		}
		function settings_default() {
			global $infinity;
			
			$infinity_reset_control = false;
			$infinity_options = infinity_get_settings();
			
			/** Infinity Reset Logic */
			if ( !is_array( $infinity_options ) ) {			
				$infinity_reset_control = true;			
			} 						
			elseif ( $infinity_options['infinity_reset_control'] == 1 ) {			
				$infinity_reset_control = true;			
			}			
			
			/** Let Reset Infinity */
			if( $infinity_reset_control == true ) {				
				$default = $this->get_settings_default();				
				update_option( 'infinity_options' , $default );			
			}
		
		}
		
		/** Infinity Pre-defined Range */
		
		/* Boolean Yes | No */		
		function infinity_boolean_pd() {			
			return array( 1 => __( 'yes', 'infinity' ), 0 => __( 'no', 'infinity' ) );		
		}
		
		/* Nav Style Range */		
		function infinity_nav_style_pd() {			
			return array( 'numeric' => __( 'Numeric', 'infinity' ), 'older-newer' => __( 'Older / Newer', 'infinity' ) );			
		}
		
		/* Post Style Range */		
		function infinity_post_style_pd() {			
			return array( 'content' => __( 'Content', 'infinity' ), 'excerpt' => __( 'Excerpt', 'infinity' ) );			
		}
		
		/* Featured Image Range */		
		function infinity_featured_image_pd() {			
			return array( 'manual' => __( 'Use Featured Image', 'infinity' ), 'auto' => __( 'Use Featured Image Automatically', 'infinity' ), 'no' => __( 'No Featured Image', 'infinity' ) );			
		}		
		
		/** Infinity Options Validation */				
		function infinity_options_validate( $input ) {
			
			/** Infinity Predefined */
			$default = $this->get_settings_default();
			$infinity_boolean_pd = $this->infinity_boolean_pd();
			$infinity_nav_style_pd = $this->infinity_nav_style_pd();
			$infinity_post_style_pd = $this->infinity_post_style_pd();
			$infinity_featured_image_pd = $this->infinity_featured_image_pd();						
			
			/* Validation: infinity_nav_style */
			if ( ! array_key_exists( $input['infinity_nav_style'], $infinity_nav_style_pd ) ) {
				 $input['infinity_nav_style'] = $default['infinity_nav_style'];
			}
			
			/* Validation: infinity_post_style */			
			if ( ! array_key_exists( $input['infinity_post_style'], $infinity_post_style_pd ) ) {
				 $input['infinity_post_style'] = $default['infinity_post_style'];
			}
			
			/* Validation: infinity_featured_image_control */			
			if ( ! array_key_exists( $input['infinity_featured_image_control'], $infinity_featured_image_pd ) ) {
				 $input['infinity_featured_image_control'] = $default['infinity_featured_image_control'];
			}										
			
			/* Validation: infinity_copyright_control */			
			if ( ! array_key_exists( $input['infinity_copyright_control'], $infinity_boolean_pd ) ) {
				 $input['infinity_copyright_control'] = $default['infinity_copyright_control'];
			}
			
			/* Validation: infinity_copyright */
			if( !empty( $input['infinity_copyright'] ) ) {
				$input['infinity_copyright'] = htmlspecialchars ( $input['infinity_copyright'] );
			}
			
			/* Validation: infinity_reset_control */
			if ( ! array_key_exists( $input['infinity_reset_control'], $infinity_boolean_pd ) ) {
				 $input['infinity_reset_control'] = $default['infinity_reset_control'];
			}
			
			add_settings_error( 'infinity_options', 'infinity_options', __( 'Settings Saved.', 'infinity' ), 'updated' );
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function infinity_section_blog_fn() {
			echo '<div class="infinity-section-desc">
			  <p class="description">'. __( 'Customize your blog by using the following settings.', 'infinity' ) .'</p>
			</div>';
		}
		
		/* Nav Style Callback */		
		function infinity_field_nav_style_fn() {
			
			$infinity_options = get_option( 'infinity_options' );
			$items = $this->infinity_nav_style_pd();
			
			echo '<select id="infinity_nav_style" name="infinity_options[infinity_nav_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $infinity_options['infinity_nav_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select navigation style.', 'infinity' ) .'</small></div>';
		
		}
		
		/** Post Section Callback */				
		function infinity_section_post_fn() {
			echo '<div class="infinity-section-desc">
			  <p class="description">'. __( 'Customize your posts by using the following settings.', 'infinity' ) .'</p>
			</div>';
		}
		
		/* Post Style Callback */		
		function infinity_field_post_style_fn() {
			
			$infinity_options = get_option( 'infinity_options' );
			$items = $this->infinity_post_style_pd();
			
			echo '<select id="infinity_post_style" name="infinity_options[infinity_post_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $infinity_options['infinity_post_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select post style.', 'infinity' ) .'</small></div>';
		
		}
		
		/* Featured Image Callback */		
		function infinity_field_featured_image_control_fn() {
			
			$infinity_options = get_option( 'infinity_options' );
			$items = $this->infinity_featured_image_pd();
			
			echo '<select id="infinity_featured_image_control" name="infinity_options[infinity_featured_image_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $infinity_options['infinity_featured_image_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( '<strong>Use Featured Image:</strong> which is set in the post.', 'infinity' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>Use Featured Image Automatically:</strong> from the images uploaded to the post.', 'infinity' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>No Featured Image:</strong> for the post.', 'infinity' ) .'</small></div>';
		
		}
		
		/** Footer Section Callback */				
		function infinity_section_footer_fn() {
			echo '<div class="infinity-section-desc">
			  <p class="description">'. __( 'Customize your footer by using the following settings.', 'infinity' ) .'</p>
			</div>';
		}
		
		/* Copyright Control Callback */		
		function  infinity_field_copyright_control_fn() {
			
			$infinity_options = get_option( 'infinity_options' );
			$items = $this->infinity_boolean_pd();
			
			echo '<select id="infinity_copyright_control" name="infinity_options[infinity_copyright_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $infinity_options['infinity_copyright_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to override default copyright text.', 'infinity' ) .'</small></div>';
		
		}
		
		/* Copyright Callback */
		function infinity_field_copyright_fn() {
			
			$infinity_options = get_option('infinity_options');
			echo '<textarea type="textarea" id="infinity_copyright" name="infinity_options[infinity_copyright]" rows="7" cols="50">'. esc_html ( $infinity_options['infinity_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the copyright text.', 'infinity' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. home_url( '/' ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}
		
		/** General Section Callback */				
		function infinity_section_general_fn() {
			echo '<div class="infinity-section-desc">
			  <p class="description">'. __( 'Here are the general settings to customize your blog.', 'infinity' ) .'</p>
			</div>';
		}
		
		/* Reset Congrol Callback */		
		function infinity_field_reset_control_fn() {
			
			$infinity_options = get_option('infinity_options');			
			$items = $this->infinity_boolean_pd();			
			echo '<label><input type="checkbox" id="infinity_reset_control" name="infinity_options[infinity_reset_control]" value="1" /> '. __( 'Reset Theme Options.', 'infinity' ) .'</label>';
		
		}
}

/** Initiate Admin */
new InfinityAdmin();
?>