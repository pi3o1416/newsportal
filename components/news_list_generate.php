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
    $page = $_GET['page'];
    $title = $_GET['title'];
    $topic = $_GET['topic'];
    $date = '20'.date('y-m-d');
    $sql =
        "SELECT * 
        FROM news
        WHERE (title ~ '$title' AND topic ~ '$topic' AND date_published <= '$date')
        LIMIT 2
        OFFSET " . $page * 2;
    $result = pg_query($db, $sql);

    while ($row = pg_fetch_row($result)) {
        echo '
            <div class="box">
                <h2 class="is-size-3" id="'.$row[0].'" onclick="news_detail(this)"><a>' . $row[1] . '</a></h2>
                <p class="is-size-6">'.$row[2].' | topic: '.$row[6].'</p>
            </div>';
    }
    pg_close($db);
}
