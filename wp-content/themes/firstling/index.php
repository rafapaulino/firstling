<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
				carrossel
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			conteúdo
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
//get_sidebar();
get_footer();
