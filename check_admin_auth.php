
<?php
    if(!$_SESSION['username'] && !$_SESSION['is_stuff'] !== 't') {
        header('Location: http://localhost/newsportal/admin/login.php');
        die();
    } 
?>
