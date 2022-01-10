<h1 class="is-size-2 has-text-primary">Users List</h1>

<form action="#" method="get" id="filter_news" style="margin-top:4%">
    <div class="columns">
        <div class="column">
            <input class="input" type="text" name="search_title" id="search_title" value="" placeholder="Title">
        </div>
        <div class="column">
            <input class="input" type="text" name="search_topic" id="search_topic" value="" placeholder="Topic">
        </div>
        <div class="column">
            <button class="button is-info" onclick="submit_news_filter(event)">Search</button>
        </div>
    </div>
</form>
<div id="message"> </div>
<div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Posted On</th>
                <th>Posted By</th>
                <th>Topic</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody id="table_body">
            <?php include './news_table_data.php' ?>
        </tbody>
    </table>
    <button class="button" id="previous" onclick="handle_news_pagination(this)">previous</button>
    <button class="button" id="current" onclick="handle_news_pagination(this)"></button>
    <button class="button" id="next" onclick="handle_news_pagination(this)">next</button>
</div>
