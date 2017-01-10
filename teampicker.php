<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<head>
    <title>A-Z Web Solutions</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
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
<div>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/" class="logo ani-in"><span class="s1">A-Z</span> <span class="s2">Web Solutions</span></a>
                </div>
            </div>
        </div>
    </header>
    <section id="page-name">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>NRL Fantasy Team Picker</h1>
                </div>
            </div>
        </div>
    </section>
    <main id="main" class="teampicker-wrapper">
        <div class="container">
            <div class="salary-cap-wrapper">
                <div class="salary-cap">$<span><?=getSalary()?></span><input type="hidden" name="remaining-salary" id="remaining-salary" value="7000000" /></div>
                <div class="counter-wrapper">Selected: <span><?=counter()?></span> of 25</div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>HOK</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select HOK', 'hok1', 'HOK')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve HOK', 'hok2', 'HOK')?></div>
                </div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>FRF</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select FRF', 'frf1', 'FRF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select FRF', 'frf2', 'FRF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve FRF', 'frf3', 'FRF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve FRF', 'frf4', 'FRF')?></div>
                </div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>2RF</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select 2RF', '2rf1', '2RF')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select 2RF', '2rf2', '2RF')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select 2RF', '2rf3', '2RF')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select reserve 2RF', '2rf4', '2RF')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select reserve 2RF', '2rf5', '2RF')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select reserve 2RF', '2rf6', '2RF')?></div>
                </div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>HLF</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select HLF', 'hlf1', 'HLF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select HLF', 'hlf2', 'HLF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve HLF', 'hlf3', 'HLF')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve HLF', 'hlf4', 'HLF')?></div>
                </div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>CTR</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select CTR', 'ctr1', 'CTR')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select CTR', 'ctr2', 'CTR')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve CTR', 'ctr3', 'CTR')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve CTR', 'ctr4', 'CTR')?></div>
                </div>
            </div>
            <div class="position-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <b>WFB</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select WFB', 'wfb', 'WFB')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select WFB', 'wfb2', 'WFB')?></div>
                    <div class="col-xs-12 col-sm-4"><?=playerSelector('Select WFB', 'wfb3', 'WFB')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve WFB', 'wfb4', 'WFB')?></div>
                    <div class="col-xs-12 col-sm-6"><?=playerSelector('Select reserve WFB', 'wfb5', 'WFB')?></div>
                </div>
            </div>
            <div class="refresh-wrapper">
                <a href="<?=$thisPage?>?action=reset" class="btn btn-primary">Reset</a>
            </div>
        </div>
    </main>
    <section id="cta" class="promo">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>A-Z Web Solutions</h2>
                    <p>The home of web solutions for small business owners</p>
                    <ul>
                        <li class="col-xs-12 col-sm-6 ws"><span></span>Websites</li>
                        <li class="col-xs-12 col-sm-6 cd"><span></span>Custom Development</li>
                        <li class="col-xs-12 col-sm-6 rrf"><span></span>RWD Retro Fits</li>
                        <li class="col-xs-12 col-sm-6 sm"><span></span>Site Maintenance</li>
                        <li class="col-xs-12 col-sm-6 wh"><span></span>Web Hosting</li>
                        <li class="col-xs-12 col-sm-6 c"><span></span>Contracting</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="cta">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Want to establish an online presence?</h2>
                    <p>Contact me for a free no-obligation quote</p>
                    <a href="/#contact" class="btn btn-default" target="_blank">Get in touch</a>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="teampicker-footer">
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