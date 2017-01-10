<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Site Maintenance</title>
    <meta name="description" content="Does your website need some love?  Let me be you IT guy" />
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
<div class="service-template site-maintenance">
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
					<h1>Site Maintenance</h1><span class="fa fa-cogs"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<div class="breadcrumb-wrapper"><?=breadcrumb('Site Maintenance')?></div>								
					<p>Is your wesbite continually neglected? Whether your time poor, just not in to it, or whether your website scares you - hand it over to me for massaging and refreshing.</p>
					<p>From simple things as adding fresh content to your site or fixing any known bugs; right through to simpflying and improving site load times so your customer isnt losing patience and getting accurate up to date information at their finger tips - when they want it.</p>
				</div>			
				<div class="col-xs-12 col-sm-6 website-option">
					<h3>Site Maintenance</h3>
					<div class="wrapper">
						<ul>
							<li>Bug fixes</li>
							<li>Content updates</li>
							<li>Content creation</li>
							<li>Page speed checks</li>
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
					<h2>Does your website need some love?</h2>
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
					<?=contactMe('site maintenance')?>
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