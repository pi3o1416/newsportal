
<?php
session_start();
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = newsportal";
$credentials = "user = monir password=1234";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "<h1>error : unable to open database</h1>";
    die('unable to connect database');
} else {
    $news_id = $_GET['news_id'];
    $comment = $_GET['comment'];
    $user = $_SESSION['username'];

    $sql =
        'INSERT INTO comment VALUES
            (\''.$user.'\', \''.$news_id.'\', \''.$comment.'\')';
    $result = pg_query($db, $sql);
    if ($result) {
        echo '<h1>Comment successful</h1>';
        die();
    } else {
        echo '<h1>database error</h1>';
    }

    pg_close($db);
}
?>
