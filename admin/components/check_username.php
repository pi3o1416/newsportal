
<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = newsportal";
$credentials = "user = monir password=1234";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "<h1>Error : Unable to open database</h1>";
    die('Unable to Connect Database');
} else {
    $username = $_POST['username'];
    $sql =
        "SELECT username FROM profile WHERE username = '$username'";
    $result = pg_query($db, $sql);
    $row = pg_fetch_row($result);
    if ($row[0]) {
        echo 'success';
        die();
    } else {
        echo 'error';
        die();
    }
    pg_close($db);
}
?>

