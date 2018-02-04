<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Custom Web Development</title>
    <meta name="description" content="Custom functionality built to your requirements" />
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
<div class="service-template custom-dev">
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
					<h1>Custom Development</h1><span class="fa fa-code"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<div class="breadcrumb-wrapper"><?=breadcrumb('Custom Development')?></div>
					<p>Sometimes you just don't know what is possible; while other times you'll know exactly what you want.</p>
					<p>I can customise a solution to you - whether it be an online registration process, an API integration with the multitude of software available, or simply something you need done.</p>
				</div>
				<div class="col-xs-12 col-sm-6 website-option">
					<h3>Custom Development</h3>
					<div class="wrapper">
						<ul>
							<li>Database driven custom solutions</li>
							<li>Custom forms</li>
							<li>API integration</li>
							<li>MailChimp integration</li>
							<li>PHP programming</li>
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
					<h2>Want to see your dreams become a reality?</h2>
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
					<?=contactMe('custom dev')?>
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