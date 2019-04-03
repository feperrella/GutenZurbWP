<?php
/**
 * The template for displaying the default right Sidebar
 *
 * This is the template that displays the right sidebar
 * Learn more at: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GutenZurbWP
 * @author  FAPNET
 * @link    https://www.fapnet.com.br
 * @version 0.0.1
 */

if ( function_exists( dynamic_sidebar( 'sidebar-right' ) ) && is_active_sidebar( 'sidebar-right' ) ) :
	dynamic_sidebar( 'sidebar-right' );
endif;
