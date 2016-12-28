<?php
require_once('conn/config.php');
require_once('includes/functions.php');
require_once('includes/class.Enquiry.php');
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