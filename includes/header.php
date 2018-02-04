<?php
require_once('conn/config.php');
require_once('includes/functions.php');
require_once('includes/class.Enquiry.php');
require_once('includes/class.Player.php');
require_once('includes/class.Registration.php');
require_once('includes/class.mvpPlayer.php');
require_once('includes/class.mvpPoints.php');
require_once('includes/lib_mail.php');

$thisPage = $_SERVER['SCRIPT_NAME'];
$robots = 'follow, index';
$debug = 0;

$json_src = 'http://tds-nrl-data.s3-ap-southeast-2.amazonaws.com/data/nrl/players.json';


if($debug == 1) {
	$robots = 'index, nofollow';
}

if(request('ajax') == "transitionPage") {
    $html = '
    <section class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <a href="/" class="logo ani-in"><span class="s1">A-Z</span> <span class="s2">Web Solutions</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-wrapper">
                        <img src="/images/burkharts-feature.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <section class="project">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Burkhart Farm Equipment</h1>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Burkhart Farm Equipment is a family business based in the small community of Lepperton. They wanted a nice simple website, built by someone local to showcase the wide variety of top quality farm equipment they manufacture.</p>
                    <ul class="tags">
                        <li><span class="fa fa-tag"></span>WordPress</li>
                        <li><span class="fa fa-tag"></span>Product enquiry</li>
                        <li><span class="fa fa-tag"></span>Custom search functionality</li>
                        <li><span class="fa fa-tag"></span>Contact form</li>
                    </ul>
                    <a href="https://www.burkhartfarmequipment.com" class="btn btn-primary" target="_blank">Visit site</a>
                </div>
                <div class="col-xs-12 col-sm-6 feature-image-wrapper">
                    <img src="/images/burkharts-feature1.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2>What they said</h2>
                    <p>"Thanks so much for setting up our website Aaron. our website looks great, is easy to navigate and change, and your on-going IT assistance is greatly appreciated."</p>
                    <p><span>Cheers! Kristy, Kelly and Chris</span></p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-cta">
        <div class="container">
            <div class="row">				
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                    ' . contactMe('general') . '
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 close-button-wrapper">
                <a href="javascript:;" class="close-me" data-animation="2"><span class="fa fa-angle-up"></span>back</a>
            </div>
        </div>
    </div>';
    echo $html;
    exit;
}

if(request('ajax') == "contact_me") {
	$enquiry = new Enquiry();
	// insert into database
	$enquiry->set('full_name');
	$enquiry->set('email');
	$enquiry->set('phone');
	$enquiry->set('service');
	$enquiry->set('message');
	$enquiry->update();
    $spammer = false;
    $honeypotfield = 'additional_email_' . date('md');
    if(request($honeypotfield) || !isset($_POST[$honeypotfield])) {
        $spammer = true;
    }
    if(!$spammer) {
        // send email
		$enquiry->email();
    }
    echo "success";
    exit;
}
//unset($_SESSION['nrl']);
if(request('ajax') == "update_salary") {
    $data = explode('|', request('id'));
    $id = $data[0];
    $pos = $data[1];
    // get remaining salary
    $salary = request('salary');

    if(!isset($_SESSION['nrl'][$pos])) {
        // first time selecting a player for this position, set session
        $_SESSION['nrl'][$pos] = $id;
        $player = new Player($id);
        // take away the price of selected player
        $new_salary = ($salary - $player->get('price'));
    } else {
        // session already set, changing our selection
        // get old selection
        $player_out = new Player($_SESSION['nrl'][$pos]);
        //remove old players price from salary
        $salary_arr[0] = $salary;
        $salary_arr[1] = $player_out->get('price');
        $salary = array_sum($salary_arr);
        //check if we have selected a new player and take the price off salary
        if(request('id') > 0) {
            $_SESSION['nrl'][$pos] = $id;
            $player = new Player($id);
            // take away the price of selected player
            $new_salary = ($salary - $player->get('price'));
        } else {
            $new_salary = $salary;
            unset($_SESSION['nrl'][$pos]);
        }
    }
    (isset($_SESSION['nrl']) ? $selections = count($_SESSION['nrl']) : $selections = 0);
    $response = $new_salary . '|' . $selections;
    echo $response;
    exit;
}

if(request('ajax') == "get_player_details") {
    $id = request('id');
    $this_player = array();
    $str = file_get_contents($json_src);
    $json = json_decode($str, true);
    foreach($json as $field => $value) {
        if($value['id'] == $id) {
            $this_player[] = $value;
        }
    }
    $full_name = $this_player[0]['first_name'] . ' ' . $this_player[0]['last_name'];
    $img_url = getNrlPlayerPic($this_player[0]['id']);
    $position = getNrlPlayerPosition($this_player[0]['positions']);
    $team = getNrlTeam($this_player[0]['squad_id']);
    $base_price = $this_player[0]['cost'];
    $current_price = $base_price;
    $scores_arr = $this_player[0]['stats']['scores'];
    $games_played = sizeof($scores_arr);
    $p = sizeof($this_player[0]['stats']['prices']);
    $class_name = 'new_price_' . $p;
    if($games_played > 0) {
        $current_price = $this_player[0]['stats']['prices'][$p];
    }
    $this_rounds_score = '';
    if($this_player[0]['stats']['scores'][$p] <> '') {
        // player has played this round
        $this_rounds_score = $this_player[0]['stats']['scores'][$p];
    }
    $response = '
    <div class="fa fa-times" onclick="closeMe();"></div>
    <div class="modal-header">
        <div class="image-wrapper">
            <img src="' . $img_url . '" alt="' . $full_name . '" />
        </div><div class="player-details-wrapper">
            <div class="name-wrapper">
                <span>' . $full_name . '<br />$' . number_format($this_player[0]['cost']) . '</span>
            </div>
            <div class="details-wrapper">
                <div class="pos-wrapper">position: ' . $position . '</div>
                <div class="team-wrapper">team: ' . $team . '</div>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <p>Enter score to calculate new price.  If player has already played this round his score will already be populated.</p>
        <form method="post" action="' . $thisPage . '" onsubmit="calculatePrice(this); return false;" id="Predictor_Form" >
            <input type="hidden" name="id" value="' . $this_player[0]['id'] . '" />
            <input type="hidden" name="week" value="' . $p . '" id="week" />
            <table class="table table-bordered price-table">
                <tbody>
                    <tr>
                        <th align="center">Week</th>
                        <th>Current Price</th>
                        <th>Game Score</th>
                        <th>New Price</th>
                    </tr>
                    <tr>
                        <td align="center">' . $p . '</td>
                        <td>$' . number_format($current_price) . '</td>
                        <td><input type="text" name="score[]" value="' . $this_rounds_score . '"/></td>
                        <td><span class="' . $class_name . '"></span></td>
                    </tr>
                 </tbody>   
            </table>
            <div class="button-wrapper">
                <input type="submit" value="Calculate" />
            </div>
        </form>    
    </div>';
    echo $response;
    exit;
}

if(request('ajax') == "calculate_price") {
    $id = request('id');
    $week = request('week');
    // current round score
    $scores = '';
    for($s = sizeof($_REQUEST['score']); $s > 0; $s--) {
        $key = ($s - 1);
        $scores .= $_REQUEST['score'][$key];
        if($s <> 1) $scores .= '|';
    }
    $this_player = array();
    $str = file_get_contents($json_src);
    $json = json_decode($str, true);
    foreach($json as $field => $value) {
        if($value['id'] == $id) {
            $this_player[] = $value;
        }
    }
    // previous scores
    $scores_arr = $this_player[0]['stats']['scores'];
    $games_played = sizeof($scores_arr);
    $base_price = $this_player[0]['cost'];
    $current_price = $base_price;
    $magic_number = 9100;
    $n = 4;
    $p = sizeof($this_player[0]['stats']['prices']);
    if($games_played > 0) {
        // has played a game, get previous 4 scores from json
        for($i = $games_played; $i > 0; $i--) {
            if($n > 0) {
                $scores .= '|';
                (isset($scores_arr[$i])) ? $scores .= $scores_arr[$i] : $scores .= '-';
            }
            $n--;
        }
        $current_price = $this_player[0]['stats']['prices'][$p];
    } else {
        $scores .= '-|-|-|-';
    }
    //echo $scores;
    $prev_scores = explode('|',$scores);
    $G0 = $prev_scores[0];
    ($prev_scores[1] <> '-') ? $G1 = $prev_scores[1] : $G1 = ($base_price/9475);
    ($prev_scores[2] <> '-') ? $G2 = $prev_scores[2] : $G2 = ($base_price/9475);
    ($prev_scores[3] <> '-') ? $G3 = $prev_scores[3] : $G3 = ($base_price/9475);
    ($prev_scores[4] <> '-') ? $G4 = $prev_scores[4] : $G4 = ($base_price/9475);

    // have all our scores, now work out new price
    //echo '0.75 * ' . $current_price . ' + 0.25 * ' . $magic_number . ' * ((5 * ' . $G0 . ' + 4 * ' . $G1 . ' + 3 * ' . $G2 . ' + 2 * ' . $G3 . ') / 15)';
    $new_price = (0.75 * $current_price + 0.25 * $magic_number * ((5 * $G0 + 4 * $G1 + 3 * $G2 + 2 * $G3 + $G4) / 15));
    echo json_encode(array('price' => '$' . number_format($new_price) . '', 'week' => '' . $week . ''));
    exit;
}

if(request('action') == "reset") {
    unset($_SESSION['nrl']);
    header('Location: /teampicker.php');
    exit;
}
if($thisPage == '/teampicker.php') {
    //print_r($_SESSION);
}
if(request('action') == "player_registration") {
    print_r($_REQUEST);
    $registration = new Registration();
    $registration->set('full_name');
    $registration->set('email');
    $registration->set('team');
    $registration->update();

    header('Location: /player-registrations.php?action=success');
    exit;
}
if(request('action') == "insert_points") {
    for($i = 1; $i <= 16; $i++) {
        $points = new mvpPoints();
        $pid = request('pid-' . $i);
        $runs = request('runs-' . $i);
        $wickets = (request('wickets-' . $i) * 20);
        $catches = (request('catches-' . $i) * 12);
        $runouts = (request('runouts-' . $i) * 15);
        $stumpings = (request('stumpings-' . $i) * 15);

        $total_points = (intval($runs) + intval($wickets) + intval($catches) + intval($runouts) + intval($stumpings));



        $points->set('playerid', $pid);
        $points->set('points', $total_points);

        $points->update();
    }
    //redirect
    header('Location: /mvp.php');
    exit;
}
