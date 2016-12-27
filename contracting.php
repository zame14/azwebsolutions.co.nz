<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Contracting</title>
    <meta name="description" content="Providing specialist knowledge and skills just when you need it through consulting services" />
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
					<h1>Contracting</h1><span class="fa fa-users"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<div class="breadcrumb-wrapper"><?=breadcrumb('Contracting')?></div>							
					<p>As a small business, resources are stretched and its just not possible to bring on a resource full time.</p>
					<p>Thankfully i'm available to provide specialist knowledge and skills just when you need it through consulting services. Whether it's a couple of hours a week or a significant project that needs a skilled developer, we've got you covered.</p>
					<p>With the ability to work remotely or on your site throughout Taranaki, no project should be out of reach for your business.</p>
				</div>				
			</div>
		</div>
	</main>
	<section id="cta">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Got a project you think I might be able to help with?</h2>
					<p>Contact me about making things happen</p>
					<a href="#contact" class="btn btn-default">Go</a>
				</div>
			</div>
		</div>
	</section>
	<section id="contact-cta">
		<div class="container">
			<div class="row">				
				<div class="col-xs-12 col-sm-offset-2 col-sm-8">
					<?=contactMe('contracting')?>
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