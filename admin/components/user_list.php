<h1 class="is-size-2 has-text-primary">Users List</h1>

<form action="#" method="get" id="filter_users" style="margin-top:4%">
    <div class="columns">
        <div class="column">
            <input class="input" type="text" name="search_username" id="search_username" value="" placeholder="Username">
        </div>
        <div class="column">
            <input class="input" type="text" name="search_email" id="search_email" value="" placeholder="Email">
        </div>
        <div class="column">
            <button class="button is-info" onclick="submit_user_filter(event)">Search</button>
        </div>
    </div>
</form>
<div id="message"> </div>
<div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Joined</th>
                <th>Is Stuff</th>
                <th>Stuff Status</th>
            </tr>
        </thead>
        <tbody id="table_body">
            <?php include './user_table_data.php' ?>
        </tbody>
    </table>
    <button class="button" id="previous" onclick="handle_pagination(this)">previous</button>
    <button class="button" id="current" onclick="handle_pagination(this)"></button>
    <button class="button" id="next" onclick="handle_pagination(this)">next</button>
</div>
