<?php
function clients() {
	$html = '
	<ul>
		<li><img src="/images/clients/mg2.png" alt="MG2 Cricket" title="MG2 Cricket" /></li>
		<li><img src="/images/clients/brutal-sports.png" alt="Brutal Sports" title="Brutal Sports" /></li>
	</ul>';
	
	return $html;	
}
function contactMe($service) {
	global $thisPage;
	$html = '
	<div class="cta-form">
		<a name="contact"></a>
		<h3>Contact Me</h3>
		<p>Fill in the form below to get in touch.</p>
		<div class="form-wrapper">
			<form method="post" action="' . $thisPage . '" onsubmit="contactAZ(this); return false;" id="Contact_Form" >
				<div><label>Full Name *</label><input type="text" name="full_name" required="required" placeholder="enter your full name" id="full_name" /></div>
				<div><label>Email *</label><input type="email" name="email" required="required" placeholder="enter a valid email address" /></div>
				<div><label>Phone</label><input type="text" name="phone" placeholder="enter your phone number" /></div>
				<div>
					<label>Your message *</label>
					<textarea required="required" placeholder="How can I help?  For quotes please provide as much information as possible regarding your requirements" name="message"></textarea>
				</div>
				<div class="submit-wrapper" style="margin-bottom:0;">
					<input type="submit" class="btn btn-primary" value="Send" />
				</div>
				<input type="hidden" name="service" value="' . $service . '" />
				<div style="display:none;"><input type="text" value="" name="additional_email_' . date('md') . '" /></div>
			</form>	
		</div>
	</div>
	<div class="cta-form-success">
		<h3>Thanks!</h3>
		<p>I\'ll be in touch shortly to discuss your enquiry.</p>
		<img src="/images/aaron-cta.jpg" alt="" />
	</div>';
	
	return $html;
}

function nav($mobile = false) {
	global $thisPage;
	$main_class = 'class="nav1"';
	$class = '';
	$class1 = '';
	$class2 = '';
	$submenu_class = 'submenu';
	$mobile_stuff = '';
	if($thisPage == "/index.php") $class1 = 'class="navPage"';
	if($thisPage == "/websites.php" || $thisPage == "/custom-web-development.php" || $thisPage == "/rwd-retro-fits.php" || $thisPage == "/site-maintenance.php" || $thisPage == "/hosting.php") $class = 'class="navPage"'; 
	if($thisPage == "/contracting.php") $class2 = 'class="navPage"';
	if($mobile) {
		$submenu_class = '';
		$mobile_stuff = 'aria-haspopup="true"'; 
		$main_class = '';
	}
	
	$html = '
	<ul ' . $main_class . '>
		<li ' . $class1 . '><a href="/">Home</a></li>
		<li ' . $class . '>
			<a href="javascript:;">Services</a>
			<ul class="' . $submenu_class . '" ' . $mobile_stuff . '>
				<li ' . $mobile_stuff . '><a href="/services/websites/" class="web" ' . $mobile_stuff . '>Websites</a></li>
				<li ' . $mobile_stuff . '><a href="/services/custom-web-development/" class="custom" ' . $mobile_stuff . '>Custom Development</a></li>
				<li ' . $mobile_stuff . '><a href="/services/rwd-retro-fits/" class="rwd" ' . $mobile_stuff . '>RWD Retro Fits</a></li>
				<li ' . $mobile_stuff . '><a href="/services/site-maintenance/" class="maintenance" ' . $mobile_stuff . '>Site Maintenance</a></li>
				<li ' . $mobile_stuff . '><a href="/services/web-hosting/" class="hosting" ' . $mobile_stuff . '>Web Hosting</a></li>
				<li ' . $mobile_stuff . '><a href="/services/contracting/" class="contracting" ' . $mobile_stuff . '>Contracting</a></li>				
			</ul>
		</li>
		<li><a href="/#why-az">Why A-Z</a></li>		
		<li><a href="#contact">Contact</a></li>
		<li ' . $class2 . '><a href="/services/contracting/">Hire Me</a></li>
	</ul>';
	
	return $html;
}

function breadcrumb($service) {
	$html = '
	<ul>
		<li><a href="/">Home</a></li>
		<li>Services</li>
		<li>' . $service . '</li>
	</ul>';
	
	return $html;	
}

function getPlayersByPosition($position) {
    $players = array();
    $sql = '
    SELECT    id
    FROM      players
    WHERE     position1 = "' . $position . '"
    OR        position2 = "' . $position . '"
    ORDER BY  price DESC, name ASC';
    $result = db_query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $players[] = new Player($row['id']);
    }

    return $players;
}

function playerSelector($title, $name, $position) {
    $html = '
    <select name="' . $name . '" style="width:100%;" onChange="updateSalary(this);" class="players-list">
        <option value = "0|' . $name . '">' . $title . '</option>';
        foreach(getPlayersByPosition($position) as $player) {
            if(isset($_SESSION['nrl'][$name]) && $_SESSION['nrl'][$name] == $player->id) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $option_value = $player->get('name') . '(' . $player->get('team') . ') - $' . $player->get('price');
            $html .= '<option value="' . $player->id . '|' . $name . '" ' . $selected . '>' . $option_value . '</option>';
        }
        $html .= '
    </select>';
    return $html;
}

function counter() {
    if(isset($_SESSION['nrl'])) {
        return count($_SESSION['nrl']);
    } else {
        return 0;
    }
}

function getSalary() {
    $salary = 7000000;
    if(isset($_SESSION['nrl'])) {
        foreach($_SESSION['nrl'] as $id) {
            $player = new Player($id);
            $salary = ($salary - $player->get('price'));
        }
    }

    return $salary;
}


function nav_burkhart($mobile = false) {
    global $thisPage;
    $main_class = 'class="nav1"';
    $class = '';
    $class1 = '';
    $class2 = '';
    $submenu_class = 'submenu';
    $mobile_stuff = '';
    if($thisPage == "/index.php") $class1 = 'class="navPage"';
    if($thisPage == "/websites.php" || $thisPage == "/custom-web-development.php" || $thisPage == "/rwd-retro-fits.php" || $thisPage == "/site-maintenance.php" || $thisPage == "/hosting.php") $class = 'class="navPage"';
    if($thisPage == "/contracting.php") $class2 = 'class="navPage"';
    if($mobile) {
        $submenu_class = '';
        $mobile_stuff = 'aria-haspopup="true"';
        $main_class = '';
    }

    $html = '
	<ul ' . $main_class . '>
		<li ' . $class1 . '><a href="/">Home</a></li>
		<li ' . $class . '><a href="/">New Equipment</a></li>
		<li ' . $class . '><a href="/">Used Equipment</a></li>
		<li ' . $class . '><a href="/">Odds & Ends</a></li>	
		<li ' . $class . '><a href="/">About Us</a></li>
		<li ' . $class . '><a href="/">Contact Us</a></li>
		<li class="search"><a href="javascript:;">Search</a></li>
	</ul>';

    return $html;
}

function facebook_feed() {
    $FBpage = file_get_contents('https://graph.facebook.com/628079593954120/feed?access_token=416237291746252|ELVzlxEEclLl3uDlWpqhDTLn2fY');
    //Interpret data with JSON
    $FBdata = json_decode($FBpage);
    //Loop through data for each news item
    $count = 1;
    $html = '
    <div class="facebook-feed-wrapper">
        <ul>';
        foreach ($FBdata->data as $news ) {
            if (!empty($news->message) && !empty($news->picture) && $count <= 6) {
                $html .= '<li style="background: url(' . $news->picture . ')"></li>';
                $count++;
            }
        }
        $html .= '
        </ul>
    </div>
    <p class="facebook-link-wrapper"><a href="https://www.facebook.com/Burkhart-Farm-Equipment-Ltd-628079593954120/" target="_blank"><span class="fa fa-facebook-square"></span> Follow us on Facebook</a></p>';

    return $html;
}