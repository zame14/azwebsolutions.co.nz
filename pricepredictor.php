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
        <div class="container-fluid">
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
                    <h1>Milchcow's Price Predictor</h1>
                </div>
            </div>
        </div>
    </section>
    <main id="main" class="teampicker-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php
/*

                                                            $str = file_get_contents('http://tds-nrl-data.s3-ap-southeast-2.amazonaws.com/data/nrl/players.json');
                                                            $json = json_decode($str, true);
                                                          echo '<pre>' . print_r($json, true) . '</pre>';
                                        /*
                                                            //echo getNrlPlayers();

                                                            $id = 500008;
                                                            $id = 500265;
                                                            $this_player = array();
                                                            $str = file_get_contents($json_src);
                                                            $json = json_decode($str, true);
                                                            $scores = 50;
                                                            $magic_number = 9300;
                                                            foreach($json as $field => $value) {
                                                                if($value['id'] == $id) {
                                                                    $this_player[] = $value;
                                                                }
                                                            }
                                                            echo '<pre>' . print_r($this_player, true) . '</pre>';
/*
                                                            // previous scores
                                                            $scores_arr = $this_player[0]['stats']['scores'];
                                                            $games_played = sizeof($scores_arr);
                                                            $base_price = $this_player[0]['cost'];
                                                            $current_price = $base_price;
                                                            $n = 4;
                                                            if($games_played > 0) {
                                                                // has played a game, get previous 4 scores from json
                                                                for($i = $games_played; $i > 0; $i--) {
                                                                    if($n > 0) {
                                                                        $scores .= '|';
                                                                        (isset($scores_arr[$i])) ? $scores .= $scores_arr[$i] : $scores .= '-';
                                                                    }
                                                                    $n--;
                                                                }
                                                                $p = sizeof($this_player[0]['stats']['prices']);
                                                                $current_price = $this_player[0]['stats']['prices'][$p];
                                                            } else {
                                                                $scores .= '-|-|-|-';
                                                            }
                                                            $prev_scores = explode('|',$scores);
                                                            $G0 = $prev_scores[0];
                                                            ($prev_scores[1] <> '-') ? $G1 = $prev_scores[1] : $G1 = ($base_price/9475);
                                                            ($prev_scores[2] <> '-') ? $G2 = $prev_scores[2] : $G2 = ($base_price/9475);
                                                            ($prev_scores[3] <> '-') ? $G3 = $prev_scores[3] : $G3 = ($base_price/9475);
                                                            ($prev_scores[4] <> '-') ? $G4 = $prev_scores[4] : $G4 = ($base_price/9475);

                                                            // have all our scores, now work out new price
                                                            $new_price = (0.75 * $current_price + 0.25 * $magic_number * ((5 * $G0 + 4 * $G1 + 3 * $G2 + 2 * $G3 + $G4) / 15));

                                                           // echo $new_price;
                    */

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="players-wrapper">
                    <div class="intro-wrapper">
                        <p>Click on a player to launch the price predictor.</p>
                        <p>To search for a player press ctrl f and type in the players name.</p>
                    </div>
                    <?php
                    $players = getNrlPlayers();
                    foreach($players as $field => $value) {
                        $full_name = $value['first_name'] . ' ' . $value['last_name'];
                        $img_url = getNrlPlayerPic($value['id']);
                        $position = getNrlPlayerPosition($value['positions']);
                        $team = getNrlTeam($value['squad_id']);
                        echo '
                        <div class="col-xs-12 col-sm-3 player" id="' . $value['id'] . '">
                            <div class="image-wrapper">
                                <img src="' . $img_url . '" alt="' . $full_name . '" />
                                <div class="name-wrapper">
                                    <span>' . $full_name . '<br />$' . number_format($value['cost']) . '</span>
                                </div>
                                <div class="details-wrapper">
                                    <div class="pos-wrapper">position: ' . $position . '</div>
                                    <div class="team-wrapper">team: ' . $team . '</div>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
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
<?=playerDetailsPopup()?>
<script src="/includes/template.js?<?=strtotime('now')?>"></script>
<script src="/includes/dlmenu.js"></script>
</body>
</html>