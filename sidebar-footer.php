<?php
/**
 * The template for displaying the default footer Sidebar
 *
 * This is the template that displays the footer sidebar above the copyright
 * Learn more at: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GutenZurbWP
 * @author  FAPNET
 * @link    https://www.fapnet.com.br
 * @version 0.0.1
 */

if ( function_exists( dynamic_sidebar( 'sidebar-footer' ) ) && is_active_sidebar( 'sidebar-footer' ) ) :
	dynamic_sidebar( 'sidebar-footer' );
endif;
