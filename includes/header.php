<?php
require_once('conn/config.php');
require_once('includes/functions.php');
require_once('includes/class.Enquiry.php');
require_once('includes/class.Player.php');
require_once('includes/lib_mail.php');

$thisPage = $_SERVER['SCRIPT_NAME'];
$robots = 'follow, index';
$debug = 0;

if($debug == 1) {
	$robots = 'index, nofollow';
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

if(request('action') == "reset") {
    unset($_SESSION['nrl']);
    header('Location: /teampicker.php');
    exit;
}
if($thisPage == '/teampicker.php') {
    //print_r($_SESSION);
}
