<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPTV
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

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'iptv' ); ?></a>

	<!-- <header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$iptv_description = get_bloginfo( 'description', 'display' );
			if ( $iptv_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $iptv_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'iptv' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
	</header> -->

	<?php 
		$sign_in = get_field('sign_in', 'option');  
	?>
	<header>
		<nav class="navbar navbar-expand-lg iptv-header">
			<div class="container">
				<?php the_custom_logo(); ?>
				<div class="header-right">
					<div class="language">
						<a href="#">En</a>
						<a href="#">Ro</a>
					</div>
					<?php if(!empty($sign_in)): ?>
						<div class="login">
							<a href="<?php echo esc_url( $sign_in['url'] ); ?>" target="<?php echo esc_attr( $sign_in['target'] ); ?>"><?php echo esc_html(_e($sign_in['title'], 'iptv')); ?></a>
						</div>
					<?php endif; ?>
				</div>
				</div>
			</div>
		</nav>
	</header>

	
