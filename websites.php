<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Websites</title>
    <meta name="description" content="Mobile friendly websites, from one page static sites through to fully customised WordPress powered sites." />
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
</head>
<body>
<div class="service-template">
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
	<section id="page-name">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Websites</h1><span class="fa fa-desktop"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<div class="breadcrumb-wrapper"><?=breadcrumb('Websites')?></div>
					<p>The process of building a website can be long, cumbersome and time consuming. As a business owner, time and money is something of a commodity.</p>
					<p>Being a freelance web developer means lower overheads and a more personable approach to your website development. You can expect fabulous service at a fraction of the cost of going to a bigger development company.</p>
					<p>For a simplified and afforable web solution look no further than A-Z Web Solutions - "Got you covered from A-Z".</p>
					<p>A-Z web solutions include:</p>
				</div>
				<div class="col-xs-12 col-sm-4 website-option">
					<h3>Static Site</h3>
					<div class="wrapper">
						<p>Suitable for those who require a 1-2 page site with specific functionality in mind, such as a home page with an online registration form.</p>
						<ul>
							<li>1-2 pages</li>
							<li>Custom functionality (including user manual)</li>
							<li>Mobile friendly</li>
							<li>Image Optimisation</li>
							<li>Does not include a Content Management System (CMS)</li>
						</ul>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-4 website-option">
					<h3>Template Site</h3>
					<div class="wrapper">
						<p>Ideal for small businesses with limited budget looking to establish an online presence.</p>
						<p>Take advantage of the many wonderful WordPress templates available to get a basic, yet professional looking website.</p>
						<ul>
							<li>WordPress theme installation</li>
							<li>Customise theme (colours, logos etc)</li>
							<li>Mobile friendly</li>
							<li>Content addition (upto 8hrs)</li>
							<li>CMS Training</li>
							<li>Website Transition -if required</li>
							<li>Image optimisation</li>
						</ul>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-4 website-option">
					<h3>Custom Designed Site</h3>
					<div class="wrapper">
						<p>Perfect solution for small businesses who want to bring to life their own vision and work with a talented designer to produce a unique website.</p>
						<ul>
							<li>WordPress child theme installation</li>
							<li>Flexible and custom design (no template constraints)</li>
							<li>Mobile friendly</li>
							<li>Content addition (upto 8hrs)</li>
							<li>CMS Training (including website specific user manual</li>
							<li>Website Transition (if required)</li>
							<li>Image Optimisation</li>
						</ul>
					</div>	
				</div>				
			</div>
		</div>
	</main>
	<section id="cta">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Want to establish an online presence?</h2>
					<p>Contact me for a free no-obligation quote</p>
					<a href="#contact" class="btn btn-default">Go</a>
				</div>
			</div>
		</div>
	</section>
	<section id="contact-cta">
		<div class="container">
			<div class="row">				
				<div class="col-xs-12 col-sm-offset-2 col-sm-8">
					<?=contactMe('website')?>
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