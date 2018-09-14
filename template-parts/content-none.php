<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GutenZurbWP
 * @author FAPNET
 * @link https://fapnet.com.br
 * @version 0.0.1
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'gutenzurb_lang' ); ?></h1>
	</header>
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
			<?php
				printf(
					// translators: %1$s link to add new post.
					esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gutenzurb_lang' ),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?>
			</p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gutenzurb_lang' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
