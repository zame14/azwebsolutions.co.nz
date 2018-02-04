<?php
class Registration
{
    var $id = 0;
    var $full_name = '';
    var $email = '';
    var $team = '';

    function Registration($id = 0)
    {
        $result = db_query('SELECT * FROM registrations WHERE id = ' . intval($id));
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $this->id = intval($row['id']);
            $this->full_name = $row['full_name'];
            $this->price = $row['email'];
            $this->team = $row['team'];
        }
    }

    function set($fieldName, $value = null)
    {
        if ($value === null && isset($_REQUEST[$fieldName])) $value = trim($_REQUEST[$fieldName]);
        // Format the values a little
        switch ($fieldName) {
            default :
                $value = trim($value);
        }
        $this->$fieldName = $value;
    }

    function get($fieldName, $rawData = false)
    {
        $value = $this->$fieldName;
        if (!$rawData) {
            // Tidy up a few things
            switch ($fieldName) {
                default :
                    $value = $this->$fieldName;
            }
            $value = dbOutput($value);
        }
        return $value;
    }
    function update() {
        if(!$this->id) {
            $result = db_query('INSERT INTO registrations SET added = NOW()');
            $this->id = insert_id();
        }
        $sql = 'UPDATE registrations SET
			full_name = "' . dbInput($this->full_name) . '",
			email = "' . dbInput($this->email) . '",
			team = "' . dbInput($this->team) . '"
            WHERE id = ' . $this->id;
        db_query($sql);
    }
}