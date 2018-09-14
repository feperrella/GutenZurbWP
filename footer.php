<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GutenZurbWP
 * @author FAPNET
 * @link https://fapnet.com.br
 * @version 0.0.1
 */

?>

	<footer class="footer grid-x grid-padding-x grid-padding-y" role="contentinfo">
		<div class="cell small-6">
			<small class="source-org copyright">&copy; <?php echo date( 'Y' ); // WPCS: xss ok. ?> <?php bloginfo( 'name' ); ?>.</small>
		</div>
		<div class="cell small-6 text-right">
			<small class="developer">Developed by <a href="https://fapnet.com.br" title="Developed by FAPNET">FAPNET</a></small>
		</div>
	</footer><!-- .footer -->

	<?php wp_footer(); ?>
</body>
</html>
