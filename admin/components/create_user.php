<h1 class="is-size-2 has-text-primary">Create User</h1>
<div class="box column is-5 is-offset-3" style="margin-top:3rem">
    <form id="user_create_form" action="./components/create_user_action.php" method="post">
        <div id="message"> </div>
        <?php
        $labels = array('Username', 'Email', 'First Name', 'Last Name', 'Password', 'Retype Password');
        $name = array('username', 'email', 'first_name', 'last_name', 'password', 'retype_password');
        $type = array('text', 'email', 'text', 'text', 'password', 'password');
        for ($i = 0; $i < count($labels); $i++) {
            echo
            '<div class="field">
                <label class="label">' . $labels[$i] . '</label>
                <input class="input" type="' . $type[$i] . '" name="' . $name[$i] . '" id="' . $name[$i] . '" value="">
                </div>';
        }
        ?>
        <button class="button is-primary" id="user_create_form_button" type="submit">Submit</button>
    </form>
</div>
