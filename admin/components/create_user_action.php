
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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password_hash = '';
    if ($password === $retype_password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    } else {
        echo '<h1>Password didnot match</h1>';
        die();
    }
    $sql =
        "INSERT INTO profile VALUES
            ('$username', '$email', '$password_hash', '$first_name', '$last_name')";
    $result = pg_query($db, $sql);
    if ($result) {
        echo '<h1>User Creation Successful</h1>';
        die();
    } else {
        echo '<h1>Username or Email Already Exist</h1>';
    }

    pg_close($db);
}
?>
