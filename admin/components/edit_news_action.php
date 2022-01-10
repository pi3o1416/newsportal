
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
    $id = $_GET['id'];
    $title = $_GET['title'];
    $topic = $_GET['topic'];
    $date_published = $_GET['date_published'];
    $image = $_GET['image'];
    $descriptions = $_GET['descriptions'];
    $sql =
        "UPDATE news 
        SET title = '$title',
            topic = '$topic',
            date_published = '$date_published',
            image = '$image',
            descriptions = '$descriptions'
        WHERE id = '$id'";
    $result = pg_query($db, $sql);
    echo $result;

    pg_close($db);
}

?>

