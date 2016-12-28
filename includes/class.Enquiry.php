<?php
class Enquiry {
    var $id = 0;
    var $full_name = '';
    var $email = '';
    var $phone = '';
    var $message = '';
	var $service = '';
	var $identifier = '';

    function Enquiry($id = 0) {
        $result = db_query('SELECT * FROM enquiries WHERE id = ' . intval($id));
        if(mysqli_num_rows ( $result )) {
            $row = mysqli_fetch_assoc ( $result );
            $this->id = intval($row['id']);
            $this->full_name = $row['full_name'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->message = $row['message'];
			$this->service = $row['service'];
			$this->identifier = $row['identifier'];
        }
    }

    function set($fieldName, $value = null) {
        if($value === null && isset($_REQUEST[$fieldName])) $value = trim($_REQUEST[$fieldName]);
        // Format the values a little
        switch($fieldName) {
            default :
                $value = trim($value);
        }
        $this->$fieldName = $value;
    }

    function get($fieldName, $rawData = false) {
        $value = $this->$fieldName;
        if (! $rawData) {
            // Tidy up a few things
            switch ($fieldName) {
                default :
                    $value = $this->$fieldName;
            }
            $value = dbOutput ( $value );
        }
        return $value;
    }
	function update() {
		if(!$this->id) {
			$result = db_query('INSERT INTO enquiries SET added = NOW()');
			$this->id = insert_id();
		}
		$sql = 'UPDATE enquiries SET
			full_name = "' . dbInput($this->full_name) . '",
			phone = "' . dbInput($this->phone) . '",
			email = "' . dbInput($this->email) . '",
			message = "' . dbInput($this->message) . '",
			service = "' . dbInput($this->service) . '",			
			identifier = "' . md5(uniqid(rand(), true)) . '",
			modified = NOW()
            WHERE id = ' . $this->id;
		db_query($sql);
	}
	function email() {
        $sFrom		= 'aaron.zame@gmail.com';
        $sFromName	= 'A-Z Web Solutions';
        $sTo 		= 'aaron.zame@gmail.com';
        $sToName 	= 'aaron.zame@gmail.com';
        $sSubject 	= 'New Website Equiry - ' . $this->get('service');

        $emailBody = '
		<html>
		<head>
		<style>
		body, td, p {
			font-family: calibri, Verdana;
			font-size:15px;
			font-weight:normal;
			font-style:normal;
			text-decoration: none;
			font-variant:normal;
			color:#000000;
		}
		a {
			color: #1f6db0;
			text-decoration: none;
		}
		</style>
		</head>
		<body>	
			Hi Aaron,<br /><br />
			A new website enquiry:<br /><br />
			<table>
				<tr>
					<td><b>Full Name</b></td>
					<td>' . $this->get('full_name') . '</td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>' . $this->get('email') . '</td>
				</tr>
				<tr>
					<td><b>Phone</b></td>
					<td>' . $this->get('phone') . '</td>
				</tr>
				<tr>
					<td><b>Service</b></td>
					<td>' . $this->get('service') . '</td>
				</tr>												
				<tr>
					<td colspan="2"><b>Message</b></td>	
				</tr>
				<tr>
					<td colspan="2">' . $this->get('message',true) . '</td>	
				</tr>
			</table>
		</body></html>';


        sendMail($sFrom, $sFromName, $sTo, $sToName, $sSubject, $emailBody);			
	}
}