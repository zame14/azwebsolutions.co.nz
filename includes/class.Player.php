<?php
class Player
{
    var $id = 0;
    var $name = '';
    var $price = 0.00;
    var $position1 = '';
    var $position2 = '';
    var $team = '';

    function Player($id = 0)
    {
        $result = db_query('SELECT * FROM players WHERE id = ' . intval($id));
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $this->id = intval($row['id']);
            $this->name = $row['name'];
            $this->price = $row['price'];
            $this->position1 = $row['position1'];
            $this->position2 = $row['position2'];
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

    function isSelected() {
        if(isset($_SESSION['nrl'])) {
            foreach($_SESSION['nrl'] as $id) {
                if($this->id == $id) {
                    return true;
                    break;
                }
            }
        }
        return false;
    }
}