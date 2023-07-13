<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */
// Get the theme settings
$theme_settings = get_option('theme_settings');

// Phone number
$phone_number = $theme_settings['phone_number'] ?? '';

// Logo image
$logo_image = $theme_settings['logo_image'] ?? '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<header id="masthead" class="site-header">
        <!-- Introduce hello bar -->
        <div class="header-top">
            <div class="container">
                <p class="content-left">CALL US NOW!<span class="white"><?php echo $phone_number; ?></span></p>
                <p class="content-right">LOGIN<span class="white">SIGNUP</span></p>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="site-branding">
                    <a href="<?php echo site_url(); ?>">
                        <img src="<?php echo esc_url($logo_image); ?>" class="custom-logo" alt="<?php echo bloginfo('name'); ?>" decoding="async">
                    </a>

                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
