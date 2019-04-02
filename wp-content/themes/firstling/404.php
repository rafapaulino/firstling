<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- 404 -->
			<div class="page-404">
				
				<div class="notfound">
					<div class="notfound-404">
						<h2>Página Não Encontrada</h2>
						<h3><span>4</span><span>0</span><span>4</span></h3>
					</div>
					<h4>A página que você procura não foi encontrada, por favor utilize o formulário abaixo para fazer uma busca no site.</h4>
					<?php get_search_form(); ?>
				</div>

			</div>
			<!-- /404 -->
		</div>
	</div>
</div>
<?php
get_footer();
