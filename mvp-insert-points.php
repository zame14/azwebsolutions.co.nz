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
                    <h1>Insert MVP Points</h1>
                </div>
            </div>
        </div>
    </section>
    <main id="main" class="mvp">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <form name="mpvForm" action="<?=$thisPage?>" method="post">
                    <input type="hidden" name="action" value="insert_points" />
                    <table class="table">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Runs</th>
                                <th>Wickets</th>
                                <th>Catches</th>
                                <th>Run Outs</th>
                                <th>Stumpings</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach(getMvpPlayers() as $player) {
                            echo '
                            <tr>
                                <td>' . $player->get('name') . '<input type="hidden" name="pid-' . $i . '" value="' . $player->id . '" /></td>
                                <td><input type="text" name="runs-' . $i . '" value="" /></td>
                                <td><input type="text" name="wickets-' . $i . '" value="" /></td>
                                <td><input type="text" name="catches-' . $i . '" value="" /></td>
                                <td><input type="text" name="runouts-' . $i . '" value="" /></td>
                                <td><input type="text" name="stumpings-' . $i . '" value="" /></td>
                            </tr>';
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="submit-wrapper" style="margin-bottom:0;">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                </form>
                </div>
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
    <footer id="footer" class="teampicker-footer alt">
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