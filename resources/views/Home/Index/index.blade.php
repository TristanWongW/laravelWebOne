<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>前台首页</title>		
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/static/homes/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="/static/homes/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="/static/homes/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/static/homes/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/static/homes/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/static/homes/css/theme.css">
		<link rel="stylesheet" href="/static/homes/css/theme-elements.css">
		<link rel="stylesheet" href="/static/homes/css/theme-blog.css">
		<link rel="stylesheet" href="/static/homes/css/theme-shop.css">
		<link rel="stylesheet" href="/static/homes/css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/static/homes/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/static/homes/css/custom.css">

		<!-- Head Libs -->
		<script src="/static/homes/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
			<header id="header">
				<div class="container">
					<h1 class="logo">
						<a href="index.html">
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/static/homes/img/logo.png">
						</a>
					</h1>
					<div class="search">
						<form id="searchForm" action="page-search-results.html" method="get">
							<div class="input-group">
								<input type="text" class="form-control search" name="q" id="q" placeholder="Search..." required>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<nav>
						<ul class="nav nav-pills nav-top">
							<li>
								<a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
							</li>
							<li>
								<a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
							</li>
							<li class="phone">
								<span><i class="fa fa-phone"></i>(123) 456-7890</span>
							</li>
						</ul>
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
							<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
							<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
						</ul>
						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
								@foreach ($category as $row)
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										{{$row->name}}
										<i class="fa fa-angle-down"></i>
									</a>
									@if (count($row->sto))
									<ul class="dropdown-menu">
										@foreach ($row->sto as $item)
										<li class="dropdown-submenu">
											<a href="#">{{$item->name}}</a>
											@if (count($item->sto))
											<ul class="dropdown-menu">
												@foreach ($item->sto as $im)
												<li><a href="index.html">{{$im->name}}</a></li>
												@endforeach
											</ul>
											@endif
										</li>
										@endforeach
									</ul>
									@endif
								</li>
								@endforeach

							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div role="main" class="main">

				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">About Us</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>About Me</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-4">

							<div class="owl-carousel" data-plugin-options='{"items": 1}'>
								<div>
									<div class="thumbnail">
										<img alt="" height="300" class="img-responsive" src="/static/homes/img/team/team-3.jpg">
									</div>
								</div>
								<div>
									<div class="thumbnail">
										<img alt="" height="300" class="img-responsive" src="/static/homes/img/team/team-9.jpg">
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-8">

							<h2 class="shorter">Joe <strong>Doe</strong></h2>
							<h4>Web Designer</h4>

							<span class="thumb-info-social-icons">
								<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
								<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
								<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
							</span>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.</p>

							<ul class="list icons list-unstyled">
								<li><i class="fa fa-check"></i> Fusce sit amet orci quis arcu vestibulum vestibulum sed ut felis.</li>
								<li><i class="fa fa-check"></i> Phasellus in risus quis lectus iaculis vulputate id quis nisl.</li>
								<li><i class="fa fa-check"></i> Iaculis vulputate id quis nisl.</li>
							</ul>

						</div>
					</div>

					<hr class="tall" />

					<div class="row center">

						<div class="col-md-3">
							<div class="circular-bar">
								<div class="circular-bar-chart" data-percent="75" data-plugin-options='{"barColor": "#E36159"}'>
									<strong>HTML/CSS</strong>
									<label><span class="percent">75</span>%</label>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="circular-bar">
								<div class="circular-bar-chart" data-percent="85" data-plugin-options='{"barColor": "#0088CC", "delay": 300}'>
									<strong>Design</strong>
									<label><span class="percent">85</span>%</label>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="circular-bar">
								<div class="circular-bar-chart" data-percent="60" data-plugin-options='{"barColor": "#2BAAB1", "delay": 600}'>
									<strong>WordPress</strong>
									<label><span class="percent">60</span>%</label>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="circular-bar">
								<div class="circular-bar-chart" data-percent="95" data-plugin-options='{"barColor": "#734BA9", "delay": 900}'>
									<strong>Photoshop</strong>
									<label><span class="percent">95</span>%</label>
								</div>
							</div>
						</div>

					</div>

				</div>

				<section class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(/static/homes/img/parallax-transparent.jpg);">
					<div class="container">
						<div class="row center">
							<div class="col-md-12">

								<div class="row">
									<div class="owl-carousel" data-plugin-options='{"items": 1}'>
										<div>
											<blockquote>
												<p><i class="fa fa-quote-left"></i> Joe Doe is the smartest guy I ever met, he provides great tech service for each template and allows me to become more knowledgeable as a designer.</p>
												<span>- Mark Doe</span>
											</blockquote>
										</div>
										<div>
											<blockquote>
												<p><i class="fa fa-quote-left"></i> He provides great tech service for each template and allows me to become more knowledgeable as a designer.</p>
												<span>- Joseph Doe</span>
											</blockquote>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</section>
				<div class="container">

					<div class="row">

						<div class="col-md-12">
							<h3 class="short">My <strong>Work</strong></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>

						<ul class="portfolio-list">
							<li class="col-md-3">
								<div class="portfolio-item thumbnail">
									<a href="portfolio-single-project.html" class="thumb-info">
										<img alt="" class="img-responsive" src="/static/homes/img/projects/project.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">SEO</span>
											<span class="thumb-info-type">Website</span>
										</span>
										<span class="thumb-info-action">
											<span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</a>
								</div>
							</li>
							<li class="col-md-3">
								<div class="portfolio-item thumbnail">
									<a href="portfolio-single-project.html" class="thumb-info">
										<img alt="" class="img-responsive" src="/static/homes/img/projects/project-1.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Okler</span>
											<span class="thumb-info-type">Brand</span>
										</span>
										<span class="thumb-info-action">
											<span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</a>
								</div>
							</li>
							<li class="col-md-3">
								<div class="portfolio-item thumbnail">
									<a href="portfolio-single-project.html" class="thumb-info">
										<img alt="" class="img-responsive" src="/static/homes/img/projects/project-2.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">The Fly</span>
											<span class="thumb-info-type">Logo</span>
										</span>
										<span class="thumb-info-action">
											<span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</a>
								</div>
							</li>
							<li class="col-md-3">
								<div class="portfolio-item thumbnail">
									<a href="portfolio-single-project.html" class="thumb-info">
										<img alt="" class="img-responsive" src="/static/homes/img/projects/project-3.jpg">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">The Fly</span>
											<span class="thumb-info-type">Website</span>
										</span>
										<span class="thumb-info-action">
											<span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</a>
								</div>
							</li>
						</ul>

					</div>

				</div>

			</div>

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="footer-ribbon">
							<span>Get in Touch</span>
						</div>
						<div class="col-md-3">
							<div class="newsletter">
								<h4>Newsletter</h4>
								<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
			
								<div class="alert alert-success hidden" id="newsletterSuccess">
									<strong>Success!</strong> You've been added to our email list.
								</div>
			
								<div class="alert alert-danger hidden" id="newsletterError"></div>
			
								<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
									<div class="input-group">
										<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<h4>Latest Tweets</h4>
							<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "", "count": 2}'>
								<p>Please wait...</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Contact Us</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="/static/homes/img/logo-footer.png">
								</a>
							</div>
							<div class="col-md-7">
								<p>© Copyright 2014. All Rights Reserved.</p>
							</div>
							<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="vendor/bootstrap/bootstrap.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.js"></script>
		<script src="vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="vendor/twitterjs/twitter.js"></script>
		<script src="vendor/isotope/jquery.isotope.js"></script>
		<script src="vendor/owlcarousel/owl.carousel.js"></script>
		<script src="vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		 -->

	</body>
</html>
