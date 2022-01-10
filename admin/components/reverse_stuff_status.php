<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = newsportal";
$credentials = "user = monir password=1234";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "Error : Unable to open database\n";
    die('Unable to Connect Database');
} else {
    $username = $_GET['username'];
    $sql = "
            UPDATE profile
            SET is_stuff = NOT is_stuff
            WHERE username = '$username'";
    $result = pg_query($db, $sql);
    if ($result) {
        echo 'Update Successful';
    } else {
        echo 'Database Error';
    }
    
    pg_close($db);
}


?>

