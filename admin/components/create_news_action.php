
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
    $id = 'nextval(\'"News_id_seq"\'::regclass)';
    $title = $_POST['title'];
    $date_published = $_POST['date_published'];
    $descriptions = $_POST['descriptions'];
    $topic = $_POST['topic'];
    $image = 'http://localhost/newsportal/static/images/' . $title . $_post['image'];
    $username = $_SESSION['username'];

    $sql =
        'INSERT INTO news VALUES
            ('.$id.', \''.$title.'\', \''.$date_published.'\', \''.$descriptions.'\', \''.$image.'\', \''.$username.'\', \''.$topic.'\')';
    $result = pg_query($db, $sql);
    if ($result) {
        echo '<h1>news creation successful</h1>';
        die();
    } else {
        echo '<h1>database error</h1>';
    }

    pg_close($db);
}
?>
