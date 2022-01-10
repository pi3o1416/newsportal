
console.log('load script')
var page = 0
var search_title = ''
var search_topic = ''

window.onload = function page_load() {
    load_news_list()
}

function load_news_list() {
    page = 0
    $.ajax({
        url: 'http://localhost/newsportal/components/news_list.php',
        type: 'get',
        data: {
            page: page,
            title: search_title,
            topic: search_topic,
        },
        success: function (data) {
            $('#content').html(data)
            document.getElementById('current')
            current.innerText = page + 1
        }
    })
}

function handle_news_pagination(obj = null) {
    if (obj) {
        if (obj.id === 'previous' && page !== 0) {
            page = page - 1;
        } else if (obj.id === 'next') {
            var list = document.getElementById('news_list')
            if (list.innerText) {
                page = page + 1;
            }
        }
    }

    $.ajax({
        url: 'http://localhost/newsportal/components/news_list.php',
        data: {
            page: page,
            title: search_title,
            topic: search_topic,
        },
        success: function (data) {
            $('#content').html(data)
            var current = document.getElementById('current')
            current.innerText = page + 1
        }
    })
}

function submit_news_filter(event) {
    event.preventDefault()
    page = 0
    search_title = document.forms['filter_news']['search_title'].value
    search_topic = document.forms['filter_news']['search_topic'].value
    handle_news_pagination()
}

function news_detail(obj) {
    $.ajax({
        url: 'http://localhost/newsportal/components/news_detail.php',
        type: 'get',
        data: {news_id: obj.id},
        success: function (data) {
            $('#content').html(data)
        }
    })

}

function submit_comment(event) {
    event.preventDefault()
    var comment = document.forms['comment_form']['news_comment'].value
    var news_id = document.forms['comment_form']['news_id'].value
    $.ajax({
        url: 'http://localhost/newsportal/components/submit_comment.php',
        type: 'get',
        data: {
            news_id: news_id,
            comment: comment
        },
        success: function (data) {
            $.ajax({
                url: 'http://localhost/newsportal/components/news_detail.php',
                type: 'get',
                data: { news_id: news_id },
                success: function (data) {
                    $('#content').html(data)
                }
            })
        }
    })
    console.log(comment, news_id)
    

}









