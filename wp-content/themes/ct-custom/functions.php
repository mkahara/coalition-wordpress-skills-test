<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {
	wp_enqueue_style( 'ct-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Enqueue custom scripts and styles.
 */
function coalition_test_custom_scripts() {
    wp_enqueue_style( 'coalition-test-custom-style', get_template_directory_uri() . '/css/custom.css' );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome_5.15.3_css_all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'coalition_test_custom_scripts' );

/**
 * Disable Gutenberg editor.
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Add a theme options page to the WordPress admin menu
 */
function theme_settings_page() {
    add_menu_page(
        'Theme Settings',
        'Theme Settings',
        'manage_options',
        'theme-settings',
        'theme_settings_page_content',
        'dashicons-admin-generic',
        99
    );
}
add_action('admin_menu', 'theme_settings_page');

/*
 * Callback function to display theme options page content
 */
function theme_settings_page_content() {
    ?>
    <div class="wrap">
        <h1>Theme Settings</h1>
        <form method="post" action="options.php">
            <?php
            // Display the settings fields
            settings_fields('theme_settings_group');
            do_settings_sections('theme-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/*
 * Register the settings and fields
 */
function theme_settings_init() {
    // Register a settings group
    register_setting('theme_settings_group', 'theme_settings');

    // Add a section to the settings page
    add_settings_section(
        'theme_settings_section',
        'General Settings',
        'theme_settings_section_callback',
        'theme-settings'
    );

    // Add fields to the section
    add_settings_field(
        'logo_image',
        'Logo Image',
        'theme_logo_image_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'phone_number',
        'Phone Number',
        'theme_phone_number_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'address_info',
        'Address Information',
        'theme_address_info_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'fax_number',
        'Fax Number',
        'theme_fax_number_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'facebook_link',
        'Facebook',
        'theme_facebook_link_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'twitter_link',
        'Twitter',
        'theme_twitter_link_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'linkedin_link',
        'LinkedIn',
        'theme_linkedin_link_callback',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'pinterest_link',
        'Pinterest',
        'theme_pinterest_link_callback',
        'theme-settings',
        'theme_settings_section'
    );
}
add_action('admin_init', 'theme_settings_init');

/*
 * Callback function to display the section description
 */
function theme_settings_section_callback() {
    echo 'Customize your theme settings below:';
}

/*
 * Callback functions to display the fields
 */
function theme_logo_image_callback() {
    $options = get_option('theme_settings');
    $logo_image = $options['logo_image'] ?? '';

    // Enqueue necessary scripts for media uploader
    wp_enqueue_media();

    ?>
    <input type="text" name="theme_settings[logo_image]" value="<?php echo esc_attr($logo_image); ?>" class="regular-text" id="theme-settings-logo-image">
    <input type="button" class="button" value="Upload" id="theme-settings-upload-logo-button">
    <div id="theme-settings-logo-preview" style="margin-top: 10px;">
        <?php if (!empty($logo_image)) : ?>
            <img src="<?php echo esc_url($logo_image); ?>" alt="Logo Preview" width="100" height="100">
        <?php endif; ?>
    </div>
    <script>
        jQuery(document).ready(function($) {
            // Handle logo image upload
            $('#theme-settings-upload-logo-button').click(function(e) {
                e.preventDefault();
                var mediaUploader = wp.media({
                    title: 'Upload Logo Image',
                    button: {
                        text: 'Insert'
                    },
                    multiple: false
                });

                // When a file is selected, set the URL and preview the image
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#theme-settings-logo-image').val(attachment.url);
                    $('#theme-settings-logo-preview').html('<img src="' + attachment.url + '" alt="Logo Preview" style="width: auto; height: auto;">');
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}


function theme_phone_number_callback() {
    $options = get_option('theme_settings');
    $phone_number = $options['phone_number'] ?? '';
    ?>
    <input type="text" name="theme_settings[phone_number]" value="<?php echo esc_attr($phone_number); ?>" class="regular-text">
    <?php
}

function theme_address_info_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[address_info]" value="<?php echo esc_attr($options['address_info']); ?>" class="regular-text">
    <?php
}

function theme_fax_number_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[fax_number]" value="<?php echo esc_attr($options['fax_number']); ?>" class="regular-text">
    <?php
}

function theme_facebook_link_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[facebook_link]" value="<?php echo esc_attr($options['facebook_link']); ?>" class="regular-text">
    <?php
}

function theme_twitter_link_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[twitter_link]" value="<?php echo esc_attr($options['twitter_link']); ?>" class="regular-text">
    <?php
}

function theme_linkedin_link_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[linkedin_link]" value="<?php echo esc_attr($options['linkedin_link']); ?>" class="regular-text">
    <?php
}

function theme_pinterest_link_callback() {
    $options = get_option('theme_settings');
    ?>
    <input type="text" name="theme_settings[pinterest_link]" value="<?php echo esc_attr($options['pinterest_link']); ?>" class="regular-text">
    <?php
}

// Sanitize and validate the options
function theme_settings_validate($input) {
    $valid_input = array();

    // Logo image
    if (isset($input['logo_image'])) {
        $valid_input['logo_image'] = sanitize_text_field($input['logo_image']);
    }

    // Phone number
    if (isset($input['phone_number'])) {
        $valid_input['phone_number'] = sanitize_text_field($input['phone_number']);
    }

    // Address information
    if (isset($input['address_info'])) {
        $valid_input['address_info'] = sanitize_textarea_field($input['address_info']);
    }

    // Fax number
    if (isset($input['fax_number'])) {
        $valid_input['fax_number'] = sanitize_text_field($input['fax_number']);
    }

    // Social media links
    if (isset($input['facebook_link'])) {
        $valid_input['facebook_link'] = esc_url_raw($input['facebook_link']);
    }
    if (isset($input['twitter_link'])) {
        $valid_input['twitter_link'] = esc_url_raw($input['twitter_link']);
    }
    if (isset($input['linkedin_link'])) {
        $valid_input['linkedin_link'] = esc_url_raw($input['linkedin_link']);
    }
    if (isset($input['pinterest_link'])) {
        $valid_input['pinterest_link'] = esc_url_raw($input['pinterest_link']);
    }

    return $valid_input;
}
add_filter('pre_update_option_theme_settings', 'theme_settings_validate');
