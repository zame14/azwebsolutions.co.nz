<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Page Not Found</title>
    <meta name="description" content="" />
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
			</div>
		</div>
	</header>
	<section id="page-name">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Page Not Found</h1><span class="fa fa-thumbs-o-down"></span>
				</div>
			</div>
		</div>		
	</section>
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 page-content">
					<p>The page you requested cannot be found. It may have been removed, had its name changed or be temporarily unavailable.</p>
					<p>Please try the following:</p>
					<ul>
						<li>If you typed the page address in the address bar, make sure it is spelled correctly.</li>
						<li>Go back to the <a href="/">www.azwebsolutions.co.nz</a> home page.</li>
						<li>Click <a href="javascript:history.back(1)">back</a> to try another link.</li>
					</ul>
				</div>							
			</div>
		</div>
	</main>	
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
