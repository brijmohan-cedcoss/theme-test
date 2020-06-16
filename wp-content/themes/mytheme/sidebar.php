<?php
/**
 * The main template file
 *
 * This is the sidebar file in a WordPress theme
 * and one of the required files for a theme.
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

<!-- Sidebar Widgets Column -->
<div class="col-md-4">

	<div id="sidebar-primary" class="sidebar">
		<?php if ( is_active_sidebar( 'primary' ) ) : ?>
			<?php dynamic_sidebar( 'primary' ); ?>
		<?php else : ?>
			<?php echo 'No widgets in sidebar'; ?>
		<?php endif; ?>
	</div>

</div>
