
<?php
session_start();
session_unset();
if (!$_SESSION) {
    header('Location: http://localhost/newsportal/');
    die();
} else {
    header('Location: http://localhost/newsportal/');
}
?>
