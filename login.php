<!DOCTYPE html>
<html>

<head>
    <?php include './base.php'; ?>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1 class="is-size-2 has-text-primary">USer Login</h1>
        <div class="box column is-4 is-offset-4" style="margin-top:12%">
            <form action="login_action.php" method="post">
                <div class="is-size-6 has-text-danger">
                    <?php include './show_message.php'; ?>
                </div>
                <label class="label" for="Username">Username</label>
                <input class="input" type="text" name="username" id="username" value=""><br>
                <label class="label" for="Password">Password</label>
                <input class="input" type="password" name="password" id="password" value="">
                <button class="button is-primary" type="submit" style="margin-top:5%">Submit</button><br>
                <a href="#">Forget Password?</a>
            </form>
        </div>
    </div>

</body>

