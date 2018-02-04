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
		<h3>Contact A-Z</h3>
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

    if($position == '') {
        $sql = '
        SELECT    id
        FROM      players
        ORDER BY  name ASC, price DESC';
    }
    $result = db_query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $players[] = new Player($row['id']);
    }

    return $players;
}

function getMvpPlayers() {
    $players = Array();
    $result = db_query('SELECT playerid FROM mvp_players ORDER BY name');
    while ($row = mysqli_fetch_assoc($result)) {
        $players[] = new mvpPlayer($row['playerid']);
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
            if($position == '')  {
                $option_value .= ' - ' . $player->get('position1');
                if($player->get('position2') <> '') $option_value .= '/' . $player->get('position2');
            }

            $html .= '<option value="' . $player->id . '|' . $name . '" ' . $selected . '>' . $option_value . '</option>';
        }
        $html .= '
    </select>';
    return $html;
}

function teamSelector() {
    $html = '
    <select name="team">
        <option value="Prems">Prems</option>
        <option value="Seniors">Seniors</option>
        <option value="2nd Grade">2nd Grade</option>
        <option value="3rd Grade">3rd Grade</option>
        <option value="4th Grade">4th Grade</option>
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
    $salary = 9400000;
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
    <p class="facebook-link-wrapper"><a href="https://www.facebook.com/Burkhart-Farm-Equipment-Ltd-628079593954120/" target="_blank"><span class="fa fa-facebook-square"></span> Follow us</a></p>';

    return $html;
}

function getNrlPlayers1() {
    global $json_src;
    $str = file_get_contents($json_src);
    $json = json_decode($str, true);
    $html = '
    <select name="nrl_players">
        <option value="">Select Player</option>';
        foreach($json as $field => $value) {
            $full_name = $value['first_name'] . ' ' . $value['last_name'];
            $html .= '<option value="' . $value['id'] . '">' . $full_name . '</option>';
        }
    $html .= '</select>';

    return $html;
}

function getNrlPlayers() {
    global $json_src;
    $str = file_get_contents($json_src);
    $json = json_decode($str, true);

    return $json;
}

function getNrlPlayerPic($id) {
    return 'https://fantasy.nrl.com/assets/media/players/nrl/' . $id . '.png';
}

function getNrlPlayerPosition($pos_arr) {
    $html = '';
    foreach($pos_arr as $pos_id) {
        if($html <> '') $html .= ' | ';
        switch($pos_id) {
            case 1:
                $html .= 'HOK';
                break;
            case 2:
                $html .= 'FRF';
                break;
            case 3:
                $html .= '2RF';
                break;
            case 4:
                $html .= 'HLF';
                break;
            case 5:
                $html .= 'CTR';
                break;
            case 6:
                $html .= 'WFB';
                break;
        }
    }
    return $html;
}

function getNrlTeam($id) {
    $html = '';
    switch($id) {
        case 500021:
            $html = 'Storm';
            break;
        case 500028:
            $html = 'Sharks';
            break;
        case 500004:
            $html = 'Titans';
            break;
        case 500032:
            $html = 'Warriors';
            break;
        case 500022:
            $html = 'Dragons';
            break;
        case 500001:
            $html = 'Roosters';
            break;
        case 500010:
            $html = 'Bulldogs';
            break;
        case 500014:
            $html = 'Panthers';
            break;
        case 500005:
            $html = 'Rabbitohs';
            break;
        case 500023:
            $html = 'Tigers';
            break;
        case 500002:
            $html = 'Sea Eagles';
            break;
        case 500003:
            $html = 'Knights';
            break;
        case 500011:
            $html = 'Broncos';
            break;
        case 500012:
            $html = 'Cowboys';
            break;
        case 500013:
            $html = 'Raiders';
            break;
        case 500031:
            $html = 'Eels';
            break;
    }
    return $html;
}

function playerDetailsPopup() {
    $html = '
    <div class="modal fade player-popup in" id="playerModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loader"></div>
                <div class="modal-content-wrapper">
                    
                </div>
            </div>
        </div>
    </div>';

    return $html;
}
function displayPoints($team) {
    ($team == 1) ? $teamname = 'Veterans' : $teamname = 'Young Guns';
    $sql = '
    SELECT name, sum(points) as players_points
    FROM mvp_players p
    INNER JOIN mvp_points pt
    ON p.playerid = pt.playerid
    WHERE team = ' . $team . '
    GROUP BY pt.playerid
    ORDER BY sum(points) desc, name asc';
    $html = '
    <div class="mpv-wrapper">
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>' . $teamname . '</th>
                    <th>Points</th>                
                </tr>
            </thead>
            <tbody>';
    $result = db_query($sql);
    $total_points = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $html .= '
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['players_points'] . '</td>
                </tr>';
        $total_points = (intval($total_points) + intval($row['players_points']));
    }
    $html .= '
                <tr>
                    <td>&nbsp;</td>
                    <td><strong>' . $total_points . '</strong></td>
                </tr>
            </tbody>
        </table>
    </div>';

    return $html;
}