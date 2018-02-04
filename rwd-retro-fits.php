<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | RWD Retro Fits</title>
    <meta name="description" content="Taking your current website and making it mobile friendly" />
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
<div class="service-template">
	<header id="header">
		<div class="container-fluid">
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
					<h1>RWD Retro Fits</h1><span class="fa fa-mobile"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<div class="breadcrumb-wrapper"><?=breadcrumb('RWD Retro Fits')?></div>				
					<p>The ability to read and have a functional website on mobile devices is becoming more important in our growing world of technology.</p>
					<p>Research shows a significant switch to customers viewing websites on their phones rather than a desktop, and if your website is not viewable, your losing potential customers.</p>
					<p>And to add insult to injury, Google won't rank your website as a mobile friendly site and your organic search results will suffer.</p>
					<p>The solution - a RWD Retro Fit. A fancy term for ensuring that your website can be viewed on mobile devices.</p>
					<p>Unfortunately not all sites can be made mobile firendly, but lets chat and see if yours does!</p>
				</div>				
			</div>
		</div>
	</main>
	<section id="cta">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Want your old website to be mobile friendly?</h2>
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
					<?=contactMe('rwd')?>
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