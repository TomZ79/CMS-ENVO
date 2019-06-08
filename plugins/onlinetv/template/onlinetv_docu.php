<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_header.php'; ?>

<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="sidebar">
					<div class="ts-grid-box widgets category-widget">
						<h2 class="widget-title">Kategorie</h2>
						<ul class="category-list">
							<li><a href="#basic">Základní informace</a></li>
							<li><a href="#topbar">Top Bar</a></li>
							<li><a href="#navigation">Navigace</a></li>
							<li><a href="#footer">Zápatí</a></li>
							<li><a href="#section">Sekce</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-8">
				<!-- ZÁKLADNÍ INFORMACE -->
				<h2 id="navigation">Základní informace</h2>

				<h4>Záhlaví - Header</h4>

				<h4>Obsah - Content</h4>
				<p>Obsah webové stránky je rozložen přímo základním elementem <code>&lt;section&gt;&lt;/section&gt;</code> . Tento element obsahuje třídu, která určuje následují obsah uvnitř elementu.</p>

				<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
				<p>Sekce - rozdělení sloupců dále pomocí Bootstrap</p>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-lg-12&quot;&gt;

			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>

				<h4>Zápatí - Footer</h4>

				<!-- NAVIGACE -->
				<h2 id="navigation">Navigace</h2>

				<!-- TOP BAR -->
				<h2 id="topbar">Top Bar</h2>
				<p>Pro použití v záhlaví. Je možné použít i v zápatí.</p>

				<div style="position:relative;">
					<h4>Top Bar - Hlavní kód</h4>
					<p><strong>Příklad</strong></p>
					<section class="top-bar">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 align-self-center">
									<div class="ts-date"><i class="far fa-clock"></i>Sunday, August 24</div>
									<div class="ts-temperature"><i class="fas fa-sun"></i><span>25.8<b>c</b></span><span>Dubai</span></div>
								</div>
								<div class="col-lg-6 text-right align-self-center">
									<ul class="top-social">
										<li>
											<a href="#"><i class="fab fa-twitter"></i></a>
											<a href="#"><i class="fab fa-facebook-f"></i></a>
											<a href="#"><i class="fab fa-google-plus-g"></i></a>
											<a href="#"><i class="fab fa-pinterest-p"></i></a>
											<a href="#"><i class="fab fa-vimeo-v"></i></a>
										</li>
										<li class="ts-subscribe"><a href="#">subscribe</a></li>
									</ul>
								</div>
							</div>
						</div>
					</section>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-lg-6 align-self-center&quot;&gt;
			&lt;div class=&quot;ts-date&quot;&gt;&lt;i class=&quot;far fa-clock&quot;&gt;&lt;/i&gt;Sunday, August 24&lt;/div&gt;
			&lt;div class=&quot;ts-temperature&quot;&gt;&lt;i class=&quot;fas fa-sun&quot;&gt;&lt;/i&gt;&lt;span&gt;25.8&lt;b&gt;c&lt;/b&gt;&lt;/span&gt;&lt;span&gt;Dubai&lt;/span&gt;&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;col-lg-6 text-right align-self-center&quot;&gt;
			&lt;ul class=&quot;top-social&quot;&gt;
				&lt;li&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-twitter&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-facebook-f&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-google-plus-g&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-pinterest-p&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-vimeo-v&quot;&gt;&lt;/i&gt;&lt;/a&gt;
				&lt;/li&gt;
				&lt;li class=&quot;ts-subscribe&quot;&gt;&lt;a href=&quot;#&quot;&gt;subscribe&lt;/a&gt;&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>
				</div>

				<div style="position:relative;">
					<h4>Top Bar - Barevné pozadí - Šedé</h4>
					<p><strong>Příklad</strong></p>
					<section class="top-bar top-bg">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 align-self-center md-center-item">
									<div class="ts-temperature"><i class="fas fa-sun"></i><span>25.8<b>c</b></span><span>Dubai</span></div>
									<ul class="ts-top-nav">
										<li><a href="#">Menu 1</a></li>
										<li><a href="#">Menu 2</a></li>
									</ul>
								</div>
								<div class="col-lg-6 text-right align-self-center">
									<ul class="top-social">
										<li>
											<a href="#"><i class="fab fa-twitter"></i></a>
											<a href="#"><i class="fab fa-facebook-f"></i></a>
											<a href="#"><i class="fab fa-google-plus-g"></i></a>
											<a href="#"><i class="fab fa-pinterest-p"></i></a>
											<a href="#"><i class="fab fa-vimeo-v"></i></a>
										</li>
										<li class="ts-date"><i class="far fa-clock"></i>Sunday, August 24</li>
									</ul>
								</div>
							</div>
						</div>
					</section>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar top-bg&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-lg-6 align-self-center md-center-item&quot;&gt;
			&lt;div class=&quot;ts-temperature&quot;&gt;&lt;i class=&quot;fas fa-sun&quot;&gt;&lt;/i&gt;&lt;span&gt;25.8&lt;b&gt;c&lt;/b&gt;&lt;/span&gt;&lt;span&gt;Dubai&lt;/span&gt;&lt;/div&gt;
			&lt;ul class=&quot;ts-top-nav&quot;&gt;
				&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Menu 1&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Menu 2&lt;/a&gt;&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/div&gt;
		&lt;div class=&quot;col-lg-6 text-right align-self-center&quot;&gt;
			&lt;ul class=&quot;top-social&quot;&gt;
				&lt;li&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-twitter&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-facebook-f&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-google-plus-g&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-pinterest-p&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-vimeo-v&quot;&gt;&lt;/i&gt;&lt;/a&gt;
				&lt;/li&gt;
				&lt;li class=&quot;ts-date&quot;&gt;&lt;i class=&quot;far fa-clock&quot;&gt;&lt;/i&gt;Sunday, August 24&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>
				</div>

				<div style="position:relative;">
					<h4>Top Bar - Style 2</h4>
					<p>Pro plné využití lze odstranit <code>style="width: 50%;"</code> u elementu <code>&lt;div id=&quot;breaking_slider1&quot;&gt;&lt;/div&gt;</code>. Top Bar využívá Slick JS Plugin.</p>
					<p><strong>Příklad</strong></p>
					<section class="top-bar v2">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 align-self-center">
									<div class="ts-breaking-news clearfix">
										<h2 class="breaking-title float-left">
											<i class="fa fa-bolt"></i> Breaking News :</h2>
										<div class="breaking-news-content float-left" id="breaking_slider1" style="width: 50%;">
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet.</a></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 text-right align-self-center">
									<ul class="top-social">
										<li>
											<a href="#"><i class="fab fa-twitter"></i></a>
											<a href="#"><i class="fab fa-facebook-f"></i></a>
											<a href="#"><i class="fab fa-google-plus-g"></i></a>
											<a href="#"><i class="fab fa-pinterest-p"></i></a>
											<a href="#"><i class="fab fa-vimeo-v"></i></a>
										</li>
										<!-- <li class="ts-subscribe"><a href="#">subscribe</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					</section>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar v2&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-lg-8 align-self-center&quot;&gt;
			&lt;div class=&quot;ts-breaking-news clearfix&quot;&gt;
				&lt;h2 class=&quot;breaking-title float-left&quot;&gt;
					&lt;i class=&quot;fa fa-bolt&quot;&gt;&lt;/i&gt; Breaking News :&lt;/h2&gt;
				&lt;div class=&quot;breaking-news-content float-left&quot; id=&quot;breaking_slider1&quot; style=&quot;width: 50%;&quot;&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;col-lg-4 text-right align-self-center&quot;&gt;
			&lt;ul class=&quot;top-social&quot;&gt;
				&lt;li&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-twitter&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-facebook-f&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-google-plus-g&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-pinterest-p&quot;&gt;&lt;/i&gt;&lt;/a&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-vimeo-v&quot;&gt;&lt;/i&gt;&lt;/a&gt;
				&lt;/li&gt;
				&lt;!-- &lt;li class=&quot;ts-subscribe&quot;&gt;&lt;a href=&quot;#&quot;&gt;subscribe&lt;/a&gt;&lt;/li&gt; --&gt;
			&lt;/ul&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>

					<p class="mt-2"><strong>Zdrojový kód JQUERY</strong></p>
					<pre class="prettyprint linenums lang-js">
if ($('#breaking_slider1').length > 0) {
$('#breaking_slider1').slick({
	speed: 10000,
	autoplay: true,
	autoplaySpeed: 0,
	centerMode: true,
	cssEase: 'linear',
	slidesToShow: 1,
	slidesToScroll: 1,
	variableWidth: true,
	infinite: true,
	initialSlide: 1,
	arrows: false,
	buttons: false
});
}
</pre>
				</div>

				<div style="position:relative;">
					<h4>Top Bar - Style 4</h4>
					<p>Pro plné využití lze odstranit <code>style="width: 50%;"</code> u elementu <code>&lt;div id=&quot;breaking_slider2&quot;&gt;&lt;/div&gt;</code>.</p>
					<p>Požadovaný Jquery plugin: <em>Slick Plugin</em></p>
					<p><strong>Příklad</strong></p>
					<section class="top-bar v4">
						<div class="container">
							<div class="row">
								<div class="col-md-8 align-self-center">
									<div class="ts-breaking-news clearfix">
										<h2 class="breaking-title float-left"><i class="fa fa-bolt"></i> Breaking News :</h2>
										<div class="breaking-news-content float-left" id="breaking_slider2" style="width: 50%;">
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 align-self-center">
									<div class="text-right xs-left">
										<div class="ts-date-item"><i class="far fa-clock"></i> Sunday, August 24</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar v4&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-md-8 align-self-center&quot;&gt;
			&lt;div class=&quot;ts-breaking-news clearfix&quot;&gt;
				&lt;h2 class=&quot;breaking-title float-left&quot;&gt;&lt;i class=&quot;fa fa-bolt&quot;&gt;&lt;/i&gt; Breaking News :&lt;/h2&gt;
				&lt;div class=&quot;breaking-news-content float-left&quot; id=&quot;breaking_slider2&quot; style=&quot;width: 50%;&quot;&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;col-md-4 align-self-center&quot;&gt;
			&lt;div class=&quot;text-right xs-left&quot;&gt;
				&lt;div class=&quot;ts-date-item&quot;&gt;&lt;i class=&quot;far fa-clock&quot;&gt;&lt;/i&gt; Sunday, August 24&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>

					<p class="mt-2"><strong>Zdrojový kód JQUERY</strong></p>
					<pre class="prettyprint linenums lang-js">
if ($('#breaking_slider2').length > 0) {
$('#breaking_slider2').slick({
	speed: 10000,
	autoplay: true,
	autoplaySpeed: 0,
	centerMode: true,
	cssEase: 'linear',
	slidesToShow: 1,
	slidesToScroll: 1,
	variableWidth: true,
	infinite: true,
	initialSlide: 1,
	arrows: false,
	buttons: false
});
}
</pre>
				</div>

				<div style="position:relative;">
					<h4>Top Bar - Style 4</h4>
					<p>Pro plné využití lze odstranit <code>style="width: 50%;"</code> u elementu <code>&lt;div id=&quot;breaking_slider3&quot;&gt;&lt;/div&gt;</code>.</p>
					<p>Požadovaný Jquery plugin: <em>Slick Plugin</em></p>
					<p><strong>Příklad</strong></p>
					<section class="top-bar v5">
						<div class="container">
							<div class="row">
								<div class="col-md-8 align-self-center">
									<div class="ts-breaking-news clearfix">
										<h2 class="breaking-title float-left"><i class="fa fa-bolt"></i> Breaking News :</h2>
										<div class="breaking-news-content float-left" id="breaking_slider3" style="width: 50%;">
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
											<div class="breaking-post-content">
												<p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 align-self-center">
									<div class="text-right xs-left">
										<div class="ts-date-item"><i class="far fa-clock"></i> Sunday, August 24</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar v5&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-md-8 align-self-center&quot;&gt;
			&lt;div class=&quot;ts-breaking-news clearfix&quot;&gt;
				&lt;h2 class=&quot;breaking-title float-left&quot;&gt;&lt;i class=&quot;fa fa-bolt&quot;&gt;&lt;/i&gt; Breaking News :&lt;/h2&gt;
				&lt;div class=&quot;breaking-news-content float-left&quot; id=&quot;breaking_slider3&quot; style=&quot;width: 50%;&quot;&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;col-md-4 align-self-center&quot;&gt;
			&lt;div class=&quot;text-right xs-left&quot;&gt;
				&lt;div class=&quot;ts-date-item&quot;&gt;&lt;i class=&quot;far fa-clock&quot;&gt;&lt;/i&gt; Sunday, August 24&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>

					<p class="mt-2"><strong>Zdrojový kód JQUERY</strong></p>
					<pre class="prettyprint linenums lang-js">
if ($('#breaking_slider3').length > 0) {
$('#breaking_slider3').slick({
	speed: 10000,
	autoplay: true,
	autoplaySpeed: 0,
	centerMode: true,
	cssEase: 'linear',
	slidesToShow: 1,
	slidesToScroll: 1,
	variableWidth: true,
	infinite: true,
	initialSlide: 1,
	arrows: false,
	buttons: false
});
}
</pre>
				</div>

				<div style="position:relative;">
					<h4>Top Bar - Transparent</h4>
					<p>Požadovaný Jquery plugin: <em>OWL Plugin</em></p>

					<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
					<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;top-bar transparent&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
	&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;col-md-12 align-self-center&quot;&gt;
			&lt;div class=&quot;ts-breaking-news clearfix&quot;&gt;
				&lt;h2 class=&quot;breaking-title float-left&quot;&gt;&lt;i class=&quot;fa fa-bolt&quot;&gt;&lt;/i&gt; Breaking News :&lt;/h2&gt;
				&lt;div class=&quot;breaking-news-content float-left&quot; id=&quot;breaking_slider&quot;&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
					&lt;div class=&quot;breaking-post-content&quot;&gt;
						&lt;p&gt;&lt;a href=&quot;#&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.&lt;/a&gt;&lt;/p&gt;
					&lt;/div&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;/section&gt;
</pre>

					<p class="mt-2"><strong>Zdrojový kód JQUERY</strong></p>
					<pre class="prettyprint linenums lang-js">
if ($('#breaking_slider').length > 0) {
$('#breaking_slider').owlCarousel({
	items: 1,
	loop: true,
	dots: false,
	nav: true,
	animateOut: 'slideOutDown',
	animateIn: 'flipInX',
	autoplayTimeout: 5000,
	autoplay: true,
})
}
</pre>
				</div>

				<!-- ZÁPATÍ -->
				<h2 id="footer">Zápatí - Footer</h2>

				<!-- SEKCE -->
				<h2 id="section">Sekce</h2>

				<h4>Sekce - běžný obsah</h4>
				<p>Sekce - rozdělení sloupců dále pomocí Bootstrap</p>
				<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-lg-12&quot;&gt;

			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-md-9&quot;&gt;

			&lt;/div&gt;
			&lt;div class=&quot;col-md-3&quot;&gt;

			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-md-3&quot;&gt;

			&lt;/div&gt;
			&lt;div class=&quot;col-md-9&quot;&gt;

			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>

				<h4>Sekce - Seznam sociálních ikon</h4>
				<p><strong>Příklad</strong></p>

				<section class="block-wrapper-social">
					<div class="container">
						<div class="row">
							<div class="col-lg-4">
								<div class="block-social-logo">
									<a href="#"><img src="https://www.gstatic.com/images/branding/product/2x/apps_script_64dp.png" alt=""></a>
								</div>
							</div>

							<div class="col-lg-8 align-self-center">
								<ul class="block-social-list">
									<li class="ts-facebook"><a href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
									<li class="ts-google-plus"><a href="#"><i class="fab fa-google-plus-g"></i><span>Google Plus</span></a></li>
									<li class="ts-twitter"><a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper-social&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-lg-4&quot;&gt;
				&lt;div class=&quot;block-social-logo&quot;&gt;
					&lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;path/to/logo.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
				&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&quot;col-lg-8 align-self-center&quot;&gt;
				&lt;ul class=&quot;block-social-list&quot;&gt;
					&lt;li class=&quot;ts-facebook&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-facebook-f&quot;&gt;&lt;/i&gt;&lt;span&gt;Facebook&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
					&lt;li class=&quot;ts-google-plus&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-google-plus-g&quot;&gt;&lt;/i&gt;&lt;span&gt;Google Plus&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
					&lt;li class=&quot;ts-twitter&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fab fa-twitter&quot;&gt;&lt;/i&gt;&lt;span&gt;Twitter&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>

				<h4>Sekce - Newsletter</h4>
				<p><strong>Příklad</strong></p>

				<section class="block-wrapper-newsletter">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="block-newslatter-content">
									<h2>Sign up for the Newsletter</h2>
									<p>Join our newsletter and get updates in your inbox. We won’t spam you and we respect your privacy.</p>
								</div>
							</div>

							<div class="col-lg-6 align-self-center">
								<div class="block-newsletter-form">
									<form action="#" method="post" class="media align-items-end">
										<div class="email-form-group media-body">
											<i class="fa fa-paper-plane" aria-hidden="true"></i>
											<input type="email" name="email" id="newsletter-form-email" class="form-control" placeholder="Enter Your Email" autocomplete="off">
										</div>
										<div class="d-flex ts-submit-btn"><button class="btn btn-primary">Subscribe</button></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>

				<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-wrapper-newsletter&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-lg-6&quot;&gt;
				&lt;div class=&quot;block-newslatter-content&quot;&gt;
					&lt;h2&gt;Sign up for the Newsletter&lt;/h2&gt;
					&lt;p&gt;Join our newsletter and get updates in your inbox. We won’t spam you and we respect your privacy.&lt;/p&gt;
				&lt;/div&gt;
			&lt;/div&gt;

			&lt;div class=&quot;col-lg-6 align-self-center&quot;&gt;
				&lt;div class=&quot;block-newsletter-form&quot;&gt;
					&lt;form action=&quot;#&quot; method=&quot;post&quot; class=&quot;media align-items-end&quot;&gt;
						&lt;div class=&quot;email-form-group media-body&quot;&gt;
							&lt;i class=&quot;fa fa-paper-plane&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;
							&lt;input type=&quot;email&quot; name=&quot;email&quot; id=&quot;newsletter-form-email&quot; class=&quot;form-control&quot; placeholder=&quot;Enter Your Email&quot; autocomplete=&quot;off&quot;&gt;
						&lt;/div&gt;
						&lt;div class=&quot;d-flex ts-submit-btn&quot;&gt;&lt;button class=&quot;btn btn-primary&quot;&gt;Subscribe&lt;/button&gt;&lt;/div&gt;
					&lt;/form&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>

				<h4>Sekce - Header Middle</h4>
				<p><strong>Příklad</strong></p>

				<section class="block-header-middle">
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
								<div class="block-header-logo">
									<a href="#">
										<img src="https://www.gstatic.com/images/branding/product/2x/apps_script_64dp.png" alt="">
									</a>
								</div>
							</div>
							<div class="col-lg-9 align-self-center">
								<div class="block-header-banner">
									<a href="#">
										<img class="img-fluid" src="http://demo.themewinter.com/html/vinazine/images/banner/banner3.jpg" alt="">
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

				<p class="mt-2"><strong>Zdrojový kód HTML</strong></p>
				<pre class="prettyprint linenums lang-html">
&lt;section class=&quot;block-header-middle&quot;&gt;
	&lt;div class=&quot;container&quot;&gt;
		&lt;div class=&quot;row&quot;&gt;
			&lt;div class=&quot;col-lg-3&quot;&gt;
				&lt;div class=&quot;block-header-logo&quot;&gt;
					&lt;a href=&quot;#&quot;&gt;
						&lt;img src=&quot;path/to/img.jpg&quot; alt=&quot;&quot;&gt;
					&lt;/a&gt;
				&lt;/div&gt;
			&lt;/div&gt;
			&lt;div class=&quot;col-lg-9 align-self-center&quot;&gt;
				&lt;div class=&quot;block-header-banner&quot;&gt;
					&lt;a href=&quot;#&quot;&gt;
						&lt;img class=&quot;img-fluid&quot; src=&quot;path/to/img.jpg&quot; alt=&quot;&quot;&gt;
					&lt;/a&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/section&gt;
</pre>

			</div>
		</div>
	</div>
</section>


<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_footer.php'; ?>