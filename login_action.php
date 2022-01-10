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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "
            SELECT *
            FROM profile
            WHERE username = '$username'";
    $result = pg_query($db, $sql);
    $row = pg_fetch_row($result);

    pg_close($db);

    $message = '';
    if ($row) {
        if (password_verify($password, $row[2])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email = $row[1];
            $_SESSION['first_name'] = $first_name = $row[3];
            $_SESSION['last_name'] = $last_name = $row[4];
            $_SESSION['joined'] = $joined = $row[5];
            $_SESSION['is_stuff'] = $is_stuff;
            header('Location: http://localhost/newsportal/');
            die();
        } else {
            $message .= '?_message=Wrong+Username+or+Password';
        }
    } else {
        $message .= '?_message=Wrong+Username+or+Password';
    }
    $newurl = 'Location: http://localhost/newsportal/login.php' . $message;
    header($newurl);
    die();
}
