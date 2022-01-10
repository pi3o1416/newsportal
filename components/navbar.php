<nav class="navbar has-background-primary-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            <p class="is-size-3 has-text-primary-light	"><strong>NewsPortal</strong></p>
        </a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item">
                <div class="buttons" onclick="load_news_list()">
                    <a class="has-text-white"> <strong>News List</strong> </a>
                </div>
            </div>

        </div>
        <div class="navbar-end">
            <?php
            if ($_SESSION['username']) {
                $html = '<div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-primary" href="http://localhost/newsportal/components/logout.php"> <strong>Log Out</strong> </a>
                            </div>               
                        </div>';
            } else {
                $html = '<div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-primary" href="http://localhost/newsportal/login.php"> <strong>Login</strong> </a>
                            </div>
                            </div>
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-primary" href=""> <strong>Join</strong> </a>
                            </div>
                        </div>';
            }
            echo $html;
            ?>
        </div>
    </div>
</nav>
