<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
<title>A-Z Web Solutions | Home</title>
<meta name="description" content="The home of web solutions for small business owners, A-Z Web Solutions offers a number of web solutions to get you online quickly with quality, or to fix that jpb that isn't quite right." />
<meta name="keywords" content="" />
<meta name="robots" content="<?=$robots?>" />
<meta name="viewport" content="width=device-width; initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
<link rel="stylesheet" href="/includes/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="/includes/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="/includes/dlmenu.css" type="text/css" />
<link rel="stylesheet" href="/includes/styles.css?<?=strtotime('now')?>" type="text/css" />
<link rel="stylesheet" href="/includes/template.css?<?=strtotime('now')?>" type="text/css" />
<script type="text/javascript" src="/includes/jquery.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-89813507-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<div class="home-template">
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="/" class="logo ani-in"><span class="s1">A-Z</span> <span class="s2">Web Solutions</span></a>
					<div id="nav"><?=nav()?></div>
				</div>
				<div id="dl-menu" class="dl-menuwrapper">
					<button class="dl-trigger"></button>
					<?=nav(true)?>
				</div>				
			</div>
		</div>
	</header>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 profile-wrapper">
					<div class="profile-image">
						<img src="/images/aaron.jpg" alt="Aaron Zame" />			
					</div>
				</div>
				<div class="bio-wrapper col-xs-12">
					<h1>Aaron Zame</h1>
					<span>Freelance Web Developer</span>
					<ul>
						<li><a href="mailto:aaron.zame@gmail.com" class="fa fa-envelope"></a></li>
						<li><a href="tel:0211464616" class="fa fa-phone-square"></a></li>
						<li><a href="https://nz.linkedin.com/in/aaron-zame-06b41037" class="fa fa-linkedin-square" target="_blank"></a></li>
						<li><a href="https://www.facebook.com/azwebsolutionsltd/" class="fa fa-facebook-square" target="_blank"></a></li>
					</ul>
				</div>
				<div class="intro col-xs-12">
					<p>My name is Aaron Zame and i'm a Freelance Web Developer based in Taranaki NZ.</p>
					<p>I provide web solutions for small business owners, from full website builds, custom web development, to basic site updates.</p>
					<p>See my full list of services below,<br />got you covered from A-Z.</p>
				</div>
			</div>
		</div>
	</main>
	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Services</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/websites/"><span class="fa fa-desktop"></span><h3>Websites</h3></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/custom-web-development/"><span class="fa fa-code"></span><h3>Custom Development</h3></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/rwd-retro-fits/"><span class="fa fa-mobile"></span><h3>RWD Retro Fits</h3></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/site-maintenance/"><span class="fa fa-cogs"></span><h3>Site Maintenance</h3></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/web-hosting/"><span class="fa fa-globe"></span><h3>Web Hosting</h3></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4 service-wrapper"><a href="/services/contracting/"><span class="fa fa-users"></span><h3>Contracting</h3></a></div>												
			</div>
		</div>
	</section>
	<section id="why-me">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a name="why-az"></a>
					<h2>Why A-Z?</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p>A-Z Web Solutions understand small business and see the potential that the right website can bring to it. Using a highly personable approach, i'll talk through your aspirations and ensure that your web solution isnt going to be your achilles heel.</p>
					<p>I'll keep everything simple and easy to understand, and you'll get a solution that is only a portion of what the bigger web companies charge - but the same results!</p>
					<p><a href="/contact.php">Contact me</a> today for a free no-obligation chat.<br />What have you got to lose!</p>
			</div>
		</div>
	</section>
	<!--	
	<section id="clients">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>I've Worked With</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="logos-wrapper">
						
					</div>
				</div>
			</div>
		</div>
	</section>
	-->
	<section id="contact-cta">
		<div class="container">
			<div class="row">				
				<div class="col-xs-12 col-sm-offset-2 col-sm-8">
					<?=contactMe('general')?>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="copy">&copy; A-Z Web Solutions <?=date('Y')?></div>
				</div>
			</div>
		</div>
	</footer>
</div>
<script src="/includes/template.js?<?=strtotime('now')?>"></script>
<script src="/includes/dlmenu.js"></script>
</body>
</html>