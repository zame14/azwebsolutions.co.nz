<?php
class mvpPlayer
{
    var $id = 0;
    var $name = '';
    var $team = '';

    function mvpPlayer($id = 0)
    {
        $result = db_query('SELECT * FROM mvp_players WHERE playerid = ' . intval($id));
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $this->id = intval($row['playerid']);
            $this->name = $row['name'];
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
    function getPlayersPoints() {
        $sql = '
        SELECT p.playerid, sum(points) as players_points
        FROM mvp_players p
        INNER JOIN mvp_points pt
        ON p.playerid = pt.playerid
        WHERE p.playerid = ' . $this->id . '
        AND team = ' . $this->get('team') . '
        GROUP BY pt.playerid
        ORDER BY sum(points) desc, name asc';

        $result = db_query($sql);
        $row = mysqli_fetch_assoc($result);

        return $row['players_points'];
    }
}