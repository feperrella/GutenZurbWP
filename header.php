<?php
/**
 * The template for displaying the Header
 *
 * This is the template that displays all of the <head> section
 * Learn more at: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GutenZurbWP
 * @author  FAPNET
 * @link    https://fapnet.com.br
 * @version 0.0.1
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	/**
	 * Checks if there is an icon defined through the Customizer,
	 * else includes pre-made.
	 */
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		?>
		<link rel="shortcut icon" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicon.ico">
		<link href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/apple-icon-touch.png" rel="apple-touch-icon" />	
		<?php
	}

	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
