<?php
/**
 * The main template file
 *
 * This is the footer file in a WordPress theme
 * and one of the  required files for a theme.
 * php version 7.3.5
 *
 * @category   null
 * @package    WordPress
 * @subpackage Mytheme
 * @author     brij1234 <brijmohan11.1996@gmail.com>
 * @license    GNU General Public License version 2 or later; see LICENSE
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      Mytheme 1.0
 */

?>
	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<div class="Button" align="center">
				<?php $option = get_option( 'wporg_options' ); ?>
				<a href="<?php echo esc_html( $option['wporg_field_facebook'] ); ?>"><span class="iconify" data-icon="dashicons:facebook-alt" data-inline="false" data-width="50" data-height="50"></span></a>
				<a href="<?php echo esc_html( $option['wporg_field_twitter'] ); ?>"><span class="iconify" data-icon="dashicons:twitter" data-inline="false" data-width="50" data-height="50"></span></a>
			</div>
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->

	<?php wp_footer(); ?>

</body>

</html>
