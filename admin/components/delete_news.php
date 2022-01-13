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
    $news_id = $_GET['news_id'];
    $sql = "
            DELETE FROM news
            WHERE id = '$news_id'";
    $result = pg_query($db, $sql);
    if ($result) {
        echo 'Delete Successful';
    } else {
        echo 'Deletion Process Error';
    }
    
    pg_close($db);
}


?>

