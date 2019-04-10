<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<aside id="sidebar" class="col-md-4">
	
	<!-- redes sociais -->
	<aside id="redes-sociais-sidebar" class="widget">
		<ul class="redes-sociais-mini">
			<li><a class="facebook" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o Facebook"><i class="fab fa-facebook"></i></a></li>
			<li><a class="twitter" href="https://www.twitter.com/" target="_blank" title="Clique aqui para acessar o Twitter"><i class="fab fa-twitter"></i></a></li>
			<li><a class="youtube" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o YouTube"><i class="fab fa-youtube"></i></a></li>
			<li><a class="instagram" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o Instagram"><i class="fab fa-instagram"></i></a></li>
			<li><a class="whatsapp" href="https://www.twitter.com/" target="_blank" title="Clique aqui para compartilhar no WhatsApp "><i class="fab fa-whatsapp"></i></a></li>
			<li><a class="pinterest" href="https://plus.google.com/" target="_blank" title="Clique aqui para acessar o Pinterest"><i class="fab fa-pinterest"></i></a></li>
			<li><a class="linkedin" href="https://www.twitter.com/" target="_blank" title="Clique aqui para acessar o Linkedin"><i class="fab fa-linkedin"></i></a></li>
		</ul>
	</aside>
	<!--/ redes sociais -->

	<!-- posts recentes -->
	<aside id="posts-sidebar" class="widget">
		<h3 class="widget-title">Últimas Notícias</h3>

		<!-- ultimas noticias -->
		<div class="ultimasNoticias">
				
			<!-- noticias -->
			<ul itemscope itemtype="http://schema.org/Article">
				<li>
					<a href="http://www.rafapaulino.com" title="Clique aqui para acessar essa notícia" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="http://placehold.it/640x440" alt="Descrição da Imagem" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">O que realmente interessa ao Brasil</a></h3>
						<a class="time" href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">19/09/2018</a>
					</div>
				</li>
				<li>
					<a href="http://www.rafapaulino.com" title="Clique aqui para acessar essa notícia" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="http://placehold.it/640x440" alt="Descrição da Imagem" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="http://www.rafapaulino.com" title="Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa" itemprop="url">Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa</a></h3>
						<a class="time" href="http://www.rafapaulino.com" title="Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa" itemprop="url">19/09/2018</a>
					</div>
				</li>
				<li>
					<a href="http://www.rafapaulino.com" title="Clique aqui para acessar essa notícia" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="http://placehold.it/640x440" alt="Descrição da Imagem" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">O que realmente interessa ao Brasil</a></h3>
						<a class="time" href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">19/09/2018</a>
					</div>
				</li>
				<li>
					<a href="http://www.rafapaulino.com" title="Clique aqui para acessar essa notícia" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="http://placehold.it/640x440" alt="Descrição da Imagem" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="http://www.rafapaulino.com" title="Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa" itemprop="url">Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa</a></h3>
						<a class="time" href="http://www.rafapaulino.com" title="Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa" itemprop="url">19/09/2018</a>
					</div>
				</li>
				<li>
					<a href="http://www.rafapaulino.com" title="Clique aqui para acessar essa notícia" itemprop="url" class="ui-box topBottom-leftRightCorner">
						<span class="ui-border-element">
							<img src="http://placehold.it/640x440" alt="Descrição da Imagem" itemprop="image" class="img-fluid">
						</span>
					</a>
					<div class="titleDate">
						<h3 itemprop="headline"><a href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">O que realmente interessa ao Brasil</a></h3>
						<a class="time" href="http://www.rafapaulino.com" title="O que realmente interessa ao Brasil" itemprop="url">19/09/2018</a>
					</div>
				</li>
			</ul>
			<!-- /noticias -->

		</div>
		<!-- /ultimas noticias -->
	</aside>
	<!-- /posts recentes -->

	<aside id="form-sidebar" class="widget">
		<?php get_search_form(); ?>
	</aside>

	<!-- categories -->
	<aside id="categories-sidebar" class="widget">
		<h3 class="widget-title">Categorias</h3>
		<ul class="categories-list">
			<li><a href="#">Business <span>(5)</span></a></li>
			<li><a href="#">Editor's Picks <span>(10)</span></a></li>
			<li><a href="#">Fashion <span>(6)</span></a></li>
			<li><a href="#">Fitness <span>(5)</span></a></li>
			<li><a href="#">Food <span>(6)</span></a></li>
			<li><a href="#">Travel <span>(7)</span></a></li>
			<li><a href="#">Videos <span>(4)</span></a></li>
		</ul>
	</aside>
	<!--/ categories -->


	<!-- tags -->
	<aside id="tags-sidebar" class="widget">
		<h3 class="widget-title">Tags</h3>
		<div class="tagcloud tagcloud-label">
			<ul>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>Lorem ipsum dolor sit amet</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>consectetur adipisicing elit</span></a></li>
			</ul>
		</div>
	</aside>
	<!--/ tags -->

</aside><!-- #sidebar -->
