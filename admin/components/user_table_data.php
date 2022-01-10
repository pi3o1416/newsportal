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
    $username = $_GET['username'];
    $email = $_GET['email'];
    $sql =
        "SELECT * 
        FROM profile
        WHERE (username ~ '$username' AND email ~ '$email')
        LIMIT 2
        OFFSET " . $page * 2;
    $result = pg_query($db, $sql);

    while ($row = pg_fetch_row($result)) {
        echo '
            <tr>
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                <td>' . $row[3] . '</td>
                <td>' . $row[4] . '</td>
                <td>' . $row[5] . '</td>
                <td id="stuff_' . $row[0] . '">' . $row[6] . '</td>
                <td><button id="' . $row[0] . '"onclick="handle_click(this)">Edit</button>
            </tr>';
    }
    pg_close($db);
}
