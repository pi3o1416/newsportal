
<?php
session_start();
session_unset();
if (!$_SESSION) {
    header('Location: http://localhost/newsportal/admin/login.php');
    die();
} else {
    header('Location: http://localhost/newsportal/admin/dashboard.php');
}
?>
