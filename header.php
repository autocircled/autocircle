<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autocircle
 */

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
<?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'autocircle' ); ?></a>

    <header id="masthead" class="site-header" itemtype="https://schema.org/WPHeader" itemscope="">
        <div class="header-wrapper container">	
            <div class="site-branding">
                    <?php
                    $get_option = get_option('autocircle_theme_settings');
                    if( $get_option['show_logo'] == 'yes' ) the_custom_logo();
                    if( $get_option['title'] == 'yes' ) :
                        if ( is_front_page() && is_home() ) :
                                ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php
                        else :
                                ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php
                        endif;
                    endif;
                    if( $get_option['description'] == 'yes' ) :
                        $autocircle_description = get_bloginfo( 'description', 'display' );
                        if ( $autocircle_description || is_customize_preview() ) :
                                ?>
                                <p class="site-description"><?php echo $autocircle_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
            </div><!-- .site-branding -->
        </div>


    </header><!-- #masthead -->
    <nav id="site-navigation" class="main-navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="">
        <div class="navigation-wrapper container">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'autocircle' ); ?></button>
            <?php
            wp_nav_menu(
                    array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                    )
            );
            ?>
        </div>
    </nav><!-- #site-navigation -->
    <div id="page" class="site">
