<h1 class="is-size-2 has-text-primary">Create News</h1>
<div class="box column is-5 is-offset-3" style="margin-top:3rem">
    <form id="news_create_form" action="./components/create_news_action.php" method="post">
        <div id="message"> </div>
        <?php
        $labels = array('Title', 'Date Published', 'Topic', 'Image');
        $name = array('title', 'date_published', 'topic', 'image');
        $type = array('text', 'date', 'text', 'file');
        $class = array('input', 'date', 'input', '');
        for ($i = 0; $i < count($labels); $i++) {
            echo
            '<div class="field">
                <label class="label">' . $labels[$i] . '</label>
                <input class="'.$class[$i].'" type="' . $type[$i] . '" name="' . $name[$i] . '" id="' . $name[$i] . '" value="">
                </div>';
        }
        ?>
        <div class="field">
            <label class="label">Descriptions</label>
            <textarea class="textarea" name="descriptions" id="descriptions"></textarea>
        </div>
        <button class="button is-primary" id="news_create_form_button" type="submit">Submit</button>
    </form>
</div>
