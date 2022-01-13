<?php session_start(); ?>
<?php include '../check_admin_auth.php'; ?>
<html>

<head>
    <?php include '../base.php'; ?>
    <title>Admin Dashboard</title>
    <script src="http://localhost/newsportal/static/js/admin.js" defer> </script>
    <script src="http://localhost/newsportal/static/js/validation.js" defer> </script>


</head>

<body>
    <?php include 'components/navbar.php' ?>
    <div class="columns">
        <div class="column is-one-quarter">
            <?php include 'components/panel.php' ?>
        </div>
        <div class="column container" id="content">
            <h1 class="is-size-2 has-text-primary">Admin Dashboard</h1>
        </div>
    </div>
    <?php include '../footer.php' ?>
</body>

</html>
