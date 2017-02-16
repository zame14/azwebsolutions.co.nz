<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions | Home of web solutions for small business owners</title>
    <meta name="description" content="The home of web solutions for small business owners, A-Z Web Solutions offers a number of web solutions, such as website design and development, and custom web development to get you online quickly with quality, or to fix that job that isn't quite right." />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="/includes/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/includes/font-awesome.css" type="text/css" />
    <link rel="stylesheet" href="/includes/dlmenu.css" type="text/css" />
    <link rel="stylesheet" href="/includes/burkhart.css?<?=strtotime('now')?>" type="text/css" />
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
        <div class="container add-padding">
            <div class="row">
                <div class="top-header">
                    <a href="tel:067520731" class="phone">(06) 752 0731</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="/" class="logo"><img src="/images/burkhart/logo.png" alt="Burkhart Farm Equipment" /></a>
                    <div id="nav"><?=nav_burkhart()?></div>
                </div>
                <div id="dl-menu" class="dl-menuwrapper">
                    <button class="dl-trigger"></button>
                    <?=nav_burkhart(true)?>
                </div>
            </div>
        </div>
    </header>
    <section id="home-banner">
        <div class="container">
            <div class="row">
                <div class="banner-wrapper">
                    <img src="/images/burkhart/storefront.jpg" alt="Burkhart Farm Equipment" />
                </div>
            </div>
            <div class="row intro-wrapper">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10 intro">
                    <p>A family business based in the small community of Lepperton,  Burkhart Farm Equipment Ltd manufacture farm equipment and do general engineering. No job is too big, or too small.</p>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <div class="container add-padding">
            <div class="row">
                <div class="col-xs-12"><h1>Our Farm Equipment</h1></div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/tip-trailor.jpg" alt="Tip Trailers" />
                        <div class="title-wrapper"><h2>Tip Trailers</h2></div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/bale-feeder.jpg" alt="Bale Feeders" />
                        <div class="title-wrapper"><h2>Bale Feeders</h2></div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/field-roller.jpg" alt="Field Rollers" />
                        <div class="title-wrapper"><h2>Field Rollers</h2></div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/wood-splitters.jpg" alt="Wood Splitters" />
                        <div class="title-wrapper"><h2>Wood Splitters</h2></div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/water-blaster.jpg" alt="Water Blasters" />
                        <div class="title-wrapper"><h2>Water Blasters</h2></div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 category-panel">
                    <a href="#">
                        <img src="/images/burkhart/used-equipment.jpg" alt="Used Equipment" />
                        <div class="title-wrapper"><h2>Used Equipment</h2></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12"><h1>Odds & Ends</h1></div>
            </div>
            <div class="row">
                <div class="col-xs-12 odds-ends-wrapper">
                    <div class="">
                        <div class="column-1">
                            <div class="image-1-wrapper">
                                <img src="/images/burkhart/odds-image-1.jpg" alt="Odds & Ends" />
                            </div>
                            <div class="image-3-wrapper">
                                <img src="/images/burkhart/odds-image-3.jpg" alt="Odds & Ends" />
                            </div>
                        </div><div class="column-2">
                            <div class="image-1-wrapper">
                                <img src="/images/burkhart/odds-image-2.jpg" alt="Odds & Ends" />
                            </div>
                            <div class="image-4-wrapper">
                                <img src="/images/burkhart/odds-image-4.jpg" alt="Odds & Ends" />
                            </div><div class="image-5-wrapper">
                                <img src="/images/burkhart/odds-image-5.jpg" alt="Odds & Ends" />
                            </div>
                        </div>
                        <div class="odds-cta-wrapper">
                            <p>We also do Odds & Ends</p>
                            <p>There's nothing we can't do!</p>
                            <a href="#" class="btn btn-default">View Odds & Ends</a>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section id="cta-main">
        <div class="container add-padding">
            <div class="row">
                <div class="cta-wrapper">
                    <p>Buy direct from Burkhart and save</p>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <h4>Burkhart Farm Equipment Ltd</h4>
                    <address>
                        510 Manutahi Rd, Lepperton<br />
                        RD 3, New Plymouth
                    </address>
                    <ul class="footer-contact-details">
                        <li class="ph"><a href="tel:067520731">(06) 752 0731</a></li>
                        <li class="email"><a href="mailto:burkharts@clear.net.nz">burkharts@clear.net.nz</a></li>
                        <li class="hrs">Hours 08:00 - 17:00</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h4>Our Equipment</h4>
                    <ul class="footer-menu">
                        <li><a href="#">Tip Trailers</a></li>
                        <li><a href="#">Bale Feeders</a></li>
                        <li><a href="#">Field Rollers</a></li>
                        <li><a href="#">Wood Splitters</a></li>
                        <li><a href="#">Water Blasters</a></li>
                        <li><a href="#">Used Equipment</a></li>
                        <li><a href="#">Odds & Ends</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-5 facebook-col-outer-wrapper">
                    <div class="facebook-col-inner-wrapper">
                        <h4>Latest from our Facebook page</h4>
                        <?=facebook_feed()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container lower-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6 left-col">
                    <ul>
                        <li>&copy; Burkhart Farm Equipment Ltd <?=date('Y')?></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 right-col">
                    <ul>
                        <li>Site by: <a href="http://www.azwebsolutions.co.nz">A-Z WEB SOLUTIONS LTD</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/includes/template.js?<?=strtotime('now')?>"></script>
<script src="/includes/dlmenu.js"></script>
</body>
</html>