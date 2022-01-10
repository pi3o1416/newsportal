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
    $sql =
        "SELECT * 
        FROM news
        WHERE (title ~ '$title' AND topic ~ '$topic')
        LIMIT 2
        OFFSET " . $page * 2;
    $result = pg_query($db, $sql);

    while ($row = pg_fetch_row($result)) {
        echo '
            <tr>
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[5] . '</td>
                <td>' . $row[6] . '</td>
                <td><button id="' . $row[0] . '"onclick="handle_news_edit(this)">Edit</button>
            </tr>';
    }
    pg_close($db);
}

?>
