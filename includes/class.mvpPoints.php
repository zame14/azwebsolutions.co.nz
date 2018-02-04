<?php
class mvpPoints
{
    var $id = 0;
    var $playerid = 0;
    var $points = 0;

    function mvpPoints($id = 0)
    {
        $result = db_query('SELECT * FROM mvp_points WHERE pointsid = ' . intval($id));
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $this->id = intval($row['pointsid']);
            $this->playerid = $row['playerid'];
            $this->points = $row['points'];
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
            $result = db_query('INSERT INTO mvp_points SET added = NOW()');
            $this->id = insert_id();
        }
        $sql = 'UPDATE mvp_points SET
			playerid = "' . dbInput($this->playerid) . '",
			points = "' . dbInput($this->points) . '"
            WHERE pointsid = ' . $this->id;
        db_query($sql);
    }

}