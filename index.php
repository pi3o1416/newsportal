<?php session_start() ?>
<html>

<head>
    <?php include "./base.php" ?>
    <title>NewsPortal</title>
    <script src="http://localhost/newsportal/static/js/main.js" defer> </script>
</head>

<body>
    <?php include "./components/navbar.php" ;
    echo $_SESSION['username'];
?>
    <div class="container" id="content">

    </div>
    <?php include "./footer.php" ?>
</body>

</html>
