<?php
function host_replace_filter($buffer) {
//	$result = str_replace("//{$GLOBALS['CANONICAL_HOST']}", "//{$GLOBALS['REQUESTED_HOST']}", $buffer);
	$result = str_replace([
		"//{$GLOBALS['CANONICAL_HOST']}",
		"\\/\\/{$GLOBALS['CANONICAL_HOST']}"
	], [
		"//{$GLOBALS['REQUESTED_HOST']}",
		"\\/\\/{$GLOBALS['REQUESTED_HOST']}"
	], $buffer);
    return ($result);
}
if( $GLOBALS['REPLACE_CANONICAL_HOST'] )
    ob_start("host_replace_filter");
?><?php
/*
 * Header Section of Publisho
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>


<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<?php
	$GLOBALS['CUSTOM_BG_COLOR'] = null;
	if( isset( $_GET['CUSTOM_BG_COLOR'] ) ) {
		$GLOBALS['CUSTOM_BG_COLOR'] = $_GET['CUSTOM_BG_COLOR'];
	}
?>
<body <?php body_class(); ?> style='<?php echo $GLOBALS["CUSTOM_BG_COLOR"] ? "background-color: #". $GLOBALS["CUSTOM_BG_COLOR"] ." !important;" : ""; ?>'>



<?php
/* GOOGLE TAG MANAGER */
if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); }
?>


<div id="page" class="site">
	<div class="0-publisho-top-mobile-nav clear"></div>
	<nav id="site-navigation" class="themonic-nav" role="navigation">
		<div class="th-topwrap clear">
			<?php if ( has_nav_menu( 'tophead' ) ) { ?>	
				<div class="topheadmenu">
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'publisho' ); ?>"><?php esc_html_e( 'Skip to content', 'publisho' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'tophead', 'menu_id' => 'head-top', 'menu_class' => 'top-menu' ) ); ?>
				</div>
			<?php } ?>
			<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
				<?php publisho_social_icons() ?>	
			<?php } ?>
		</div>	
	</nav><!-- #site-navigation -->
	<div class="clear"></div>
	<header id="masthead" class="site-header" role="banner">
		<?php if( is_front_page() && $GLOBALS['FP_SHOW_HERO'] ) { ?>
			<?php get_template_part( 'partials/frontpage', 'header' ); ?>
		<?php } else { ?>

			<!--div><?php // if ( function_exists( 'the_msls' ) ) the_msls(); ?></div-->
	
				<?php //if ( get_theme_mod( 'custom_logo' ) ) : ?>
			
			<div class="themonic-logo">

			<?php
//				$devel_logo = 1;
//				if( isset( $_GET['DEVEL_LOGO'] ) ) {
//					$devel_logo = $_GET['DEVEL_LOGO'];
//				}
			?>

			<?php /* if($devel_logo) { */ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php get_template_part( 'partials/logo/logo', '1' ); ?>
				</a>
			<?php /* } else { ?>
				<?php publisho_the_custom_logo(); ?>
				<div style="-border: thin solid red; display: inline-block; -height: 100%; vertical-align: middle;">
					<h1 style="margin: auto 5px; -display: inline-block; -margin: 40px 0;">
						<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
					</h1>
				</div>
			<?php } */ ?>
			</div>
			<div id="publisho-head-widget" class="head-widget-area">
					<div class="pmt-head-widget">
	                <?php if( is_active_sidebar( 'pmt-tophead-banner' ) ) dynamic_sidebar( 'pmt-tophead-banner' ); ?>
					</div>
			</div>


			<?php /* else : ?>
				<div class="th-title-description">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<a class="site-description clear"><?php bloginfo( 'description' ); ?></a>
				</div>
			<?php endif; */ ?>

		<?php } ?>

	<div class="0-publisho-mobile-nav clear"></div>
		<!--nav id="ssite-navigation" class="themonic-nav" role="navigation">
			<?php // wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav-->

		<nav id="site-navigation" class="themonic-nav" role="navigation" style="-border: thin solid red; position: relative;">
			<div class="menu-primary-container">
<?php //if(  is_front_page() /*is_home()*/ ) { ?>
				<div class="lang_flag lang_flag_desktop" style="bborder: thin solid green; position: absolute; right: 20px; top: 16px;"><?php if ( function_exists( 'the_msls' ) ) the_msls(); ?></div>
<?php //} ?>
				<?php wp_nav_menu(array('container'=>false, 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu')) ?>
			</div>
		</nav>

		<!-- #site-navigation -->

		<div class="clear"></div>

<?php /*if(function_exists('bcn_display') && !is_front_page() ) { */ ?>
<?php if(function_exists('bcn_display') && !isset($GLOBALS['IS_FRONTPAGE']) ) { ?>
<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) { ?>
<div id="breadcrumbs" class="breadcrumbs" style="background-color: #eee; ccolor: white;">
<div class="-container -themonic-nav" style="padding: 10px 20px; ffont-size: 80%; bborder: thin solid red; position: relative;">
	<!--div class="lang_flag lang_flag_desktop" style="bborder: thin solid green; position: absolute; right: 20px; top: 10px;"><?php //if ( function_exists( 'the_msls' ) ) the_msls(); ?></div-->
	<?php bcn_display(); ?>
	<?php //yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>

<?php
//$post = $GLOBALS['post'];
//echo $post->ID;
//echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
//echo get_post_meta($post->ID, '_yoast_wpseo_title', true); 
//print_r( get_post_meta($post->ID, null, true) );
//print get_post_meta($post->ID, '_yoast_wpseo_bctitle', true);
//print_r( get_post_meta($post->ID, '_yoast_wpseo_bctitle', true) );
?>

</div>
</div>
<?php } ?>
<?php } ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper <?= is_front_page() ? "frontpage" :"" ?>">