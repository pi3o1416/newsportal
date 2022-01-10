
<?php
$news_id = $_GET['news_id'];

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = newsportal";
$credentials = "user = monir password=1234";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "<h1>Error : Unable to open database</h1>";
    die('Unable to Connect Database');
} else {

    $html = '';
    $sql = "
        SELECT *
        FROM news
        WHERE id = '$news_id' ";
    $result = pg_query($db, $sql);
    $row = pg_fetch_row($result);

    $html .=    '<h1 class="is-size-2 has-text-primary">Edit News</h1>';
    $html .=    '<div class="box column is-5 is-offset-3" style="margin-top:3rem">';
    $html .=    '<form id="news_edit_form" method="get">';
    $html .=    '<div id="message"> </div>';
    $html .=    '<div class="field">
                <label class="label">ID</label>
                <input class="input" type="text" name="id" id="id" value="' . $news_id . '" disabled>
                </div>';

    $labels = array('Title', 'Date Published', 'Topic', 'Image');
    $name = array('title', 'date_published', 'topic', 'image');
    $type = array('text', 'date', 'text', 'file');
    $class = array('input', 'date', 'input', '');
    $values = array($row[1], $row[2], $row[6], $row[4]);
    for ($i = 0; $i < count($labels); $i++) {
        $html .= '<div class="field">
                <label class="label">' . $labels[$i] . '</label>
                <input class="' . $class[$i] . '" type="' . $type[$i] . '" name="' . $name[$i] . '" id="' . $name[$i] . '" value="' . $values[$i] . '">
                </div>';
    }

    $html .=    '<div class="field">
                <label class="label">Descriptions</label>
                <textarea class="textarea" name="descriptions" id="descriptions">' . $row[3] . '</textarea>
                </div>
                <button class="button is-primary" id="news_edit_form_button" onclick=handle_news_edit_form(event)>Submit</button>
                </form>
                </div>';
    echo $html;

    pg_close($db);
}

?>
