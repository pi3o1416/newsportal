<?php session_start() ?>
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
    $sql =
        "SELECT * 
        FROM news
        WHERE id = '$news_id'";
    $result = pg_query($db, $sql);
    $row = pg_fetch_row($result);
    $html = '<div class="container column is-four-fifths ">';
    $html .= '<h1 class="is-size-2 has-text-info-dark" style="margin-top:3%">' . $row[1] . '</h1>';
    $html .= '<p><span class="has-text-gray">' . $row[2] . '</span></p><br>';
    $html .= '<p class="has-text-black-bis is-size-6">' . $row[3] . '</p>';
    $html .= '<div class="mt-6"><h1 class="is-size-5"><strong>Comments:</strong></h1><div class="mt-2"></div>';

    if ($_SESSION['username']) {
        $html .= '<form method="get" accept-charset="utf-8" id="comment_form"> ';
        $html .= '<input class="input" type="hidden" name="news_id" id="news_id" value="'.$news_id.'">';
        $html .= '<input class="input" type="text" name="news_comment" id="news_comment" value="">';
        $html .= '<button class="button is-link" onclick="submit_comment(event)">Submit</button>';
        $html .= '</form>';
    }

    $sql = "
        SELECT *
        FROM comment
        WHERE news = '$news_id'";
    $result = pg_query($db, $sql);
    while ($row = pg_fetch_row($result)) {
        $html .= '<div class="box">';
        $html .= '<strong>' . $row[0] . '</strong>';
        $html .= '<div class="ml-5 mt-2 has-text-black-bis">' . $row[2] . '</div>';
        $html .= '</div>';
    }
    $html .= '</div>';
    echo $html;
    pg_close($db);
}

?>
