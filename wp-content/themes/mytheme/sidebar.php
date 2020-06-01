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

	<!-- Search Widget -->
	<div class="card my-4">
		<h5 class="card-header">Search</h5>
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="button">Go!</button>
				</span>
			</div>
		</div>
	</div>

	<!-- Categories Widget -->
	<div class="card my-4">
		<h5 class="card-header">Categories</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">Web Design</a>
						</li>
						<li>
							<a href="#">HTML</a>
						</li>
						<li>
							<a href="#">Freebies</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">JavaScript</a>
						</li>
						<li>
							<a href="#">CSS</a>
						</li>
						<li>
							<a href="#">Tutorials</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Side Widget -->
	<div class="card my-4">
		<h5 class="card-header">Side Widget</h5>
		<div class="card-body">
			You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
		</div>
	</div>

</div>
