var dashboard = document.getElementById('dashboard');
var content = document.getElementById('content');
var dashboardLoad = false;
var search_username = '';
var search_email = ''
var search_title = ''
var search_topic = ''
var page = 0;
dashboard.onclick = () => {
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/admin_dashboard_root.php',
        success: function (data) {
            content.innerHTML = data;

            var test = document.getElementById('test');
            test.onclick = () => {
                test.innerText = 'Ya Hoo!!!!';
            }
        }
    })
}


var users = document.getElementById('users')
users.onclick = () => {
    page = 0
    search_username = ''
    search_email = ''
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/user_list.php',
        data: {
            page: page,
            username: search_username,
            email: search_email,
        },
        success: function (data) {
            $('#content').html(data)
            document.getElementById('current')
            current.innerText = page + 1
        }
    })
}


var create_user = document.getElementById('create_user')
create_user.onclick = () => {
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/create_user.php',
        success: function (data) {
            content.innerHTML = data

            var button = document.getElementById('user_create_form_button');
            button.onclick = (event) => {
                var message = document.getElementById('message');
                event.preventDefault()
                var username = document.forms['user_create_form']['username'].value
                var email = document.forms['user_create_form']['email'].value
                var first_name = document.forms['user_create_form']['first_name'].value
                var last_name = document.forms['user_create_form']['last_name'].value
                var password = document.forms['user_create_form']['password'].value
                var retype_password = document.forms['user_create_form']['retype_password'].value

                if (!username) {
                    message.innerHTML = '<h1>Username Cannot be empty</h1>'
                    message.className = 'has-text-danger';
                } else if (!email) {
                    message.innerHTML = '<h1>Email Cannot be empty</h1>'
                    message.className = 'has-text-danger';
                } else if (!password || !retype_password) {
                    message.innerHTML = '<h1>Password Cannot be empty</h1>'
                    message.className = 'has-text-danger';
                } else if (password !== retype_password) {
                    message.innerHTML = '<h1>Password Did not match</h1>'
                    message.className = 'has-text-danger';
                } else {
                    $.ajax({
                        url: 'http://localhost/newsportal/admin/components/create_user_action.php',
                        type: 'post',
                        data: {
                            username: document.forms['user_create_form']['username'].value,
                            email: document.forms['user_create_form']['email'].value,
                            first_name: document.forms['user_create_form']['first_name'].value,
                            last_name: document.forms['user_create_form']['last_name'].value,
                            password: document.forms['user_create_form']['password'].value,
                            retype_password: document.forms['user_create_form']['retype_password'].value,
                        },
                        success: function (data) {
                            message.innerHTML = data;
                            if (data.match(/successful/i)) {
                                message.className = 'has-text-success';
                            } else {
                                message.className = 'has-text-danger';
                            }
                            document.forms['user_create_form'].reset();

                        }
                    })
                }

            }
        }
    })
}


var create_news = document.getElementById('create_news')
create_news.onclick = () => {
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/create_news.php',
        success: function (data) {
            content.innerHTML = data

            var button = document.getElementById('news_create_form_button');
            button.onclick = (event) => {
                event.preventDefault()
                var message = document.getElementById('message');
                var title = document.forms['news_create_form']['title'].value
                var descriptions = document.forms['news_create_form']['descriptions'].value
                var image = document.forms['news_create_form']['image'].value
                var date_published = document.forms['news_create_form']['date_published'].value
                var topic = document.forms['news_create_form']['topic'].value
                if (!title) {
                    message.innerHTML = '<h1>Title Empty</h1>'
                    message.className = 'has-text-danger'
                } else if (!descriptions) {
                    message.innerHTML = '<h1>Description Empty</h1>'
                    message.className = 'has-text-danger'
                } else if (!date_published) {
                    message.innerHTML = '<h1>Date Empty</h1>'
                    message.className = 'has-text-danger'
                } else if (!topic) {
                    message.innerHTML = '<h1>Topic Empty</h1>'
                    message.className = 'has-text-danger'
                } else {
                    $.ajax({
                        url: 'http://localhost/newsportal/admin/components/create_news_action.php',
                        type: 'post',
                        data: {
                            title: title,
                            descriptions: descriptions,
                            image: image,
                            date_published: date_published,
                            topic: topic
                        },
                        success: function (data) {
                            message.innerHTML = data;
                            if (data.match(/successful/i)) {
                                message.className = 'has-text-success';
                            } else {
                                message.className = 'has-text-danger';
                            }
                            document.forms['news_create_form'].reset();

                        }
                    })
                }
            }
        }
    })
}

var news_list = document.getElementById('news_list')
news_list.onclick = () => {
    page = 0
    search_title = ''
    search_topic = ''
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/news_list.php',
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


function handle_click(obj) {
    var username = obj.id
    alert('Change Stuff Status of User ' + username)
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/reverse_stuff_status.php',
        type: 'get',
        data: {username: username},
        success: function (data) {
            var message = document.getElementById('message');
            message.innerText = data;
            var column = document.getElementById('stuff_' + username);
            if (column.innerText === 't') {
                column.innerText = 'f';
            } else {
                column.innerText = 't';
            }
        }
    })
}


function handle_pagination(obj = null) {
    if (obj) {
        if (obj.id === 'previous' && page !== 0) {
            page = page - 1;
        } else if (obj.id === 'next') {
            var table = document.getElementById('table_body')
            if (table.innerText) {
                page = page + 1;
            }
        }
    }

    $.ajax({
        url: 'http://localhost/newsportal/admin/components/user_list.php',
        data: {
            page: page,
            username: search_username,
            email: search_email,
        },
        success: function (data) {
            $('#content').html(data)
            var current = document.getElementById('current')
            current.innerText = page + 1
        }
    })
}


function handle_news_pagination(obj = null) {
    if (obj) {
        if (obj.id === 'previous' && page !== 0) {
            page = page - 1;
        } else if (obj.id === 'next') {
            var table = document.getElementById('table_body')
            if (table.innerText) {
                page = page + 1;
            }
        }
    }

    $.ajax({
        url: 'http://localhost/newsportal/admin/components/news_list.php',
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


function submit_user_filter(event) {
    event.preventDefault()
    page = 0
    search_username = document.forms['filter_users']['search_username'].value
    search_email = document.forms['filter_users']['search_email'].value
    handle_pagination()
}


function submit_news_filter(event) {
    event.preventDefault()
    page = 0
    search_title = document.forms['filter_news']['search_title'].value
    search_topic = document.forms['filter_news']['search_topic'].value
    handle_news_pagination()
}


function handle_news_edit(obj) {
    var news_id = obj.id
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/edit_news.php',
        type: 'get',
        data: {
            news_id: news_id,
        },
        success: function (data) {
            $('#content').html(data)
        }
    })
}


function handle_news_delete(obj) {
    var news_id = obj.id
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/delete_news.php',
        type: 'get',
        data: {
            news_id: news_id,
        },
        success: function (data) {
            $.ajax({
                url: 'http://localhost/newsportal/admin/components/news_list.php',
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
    })
}


function handle_news_edit_form(event) {
    event.preventDefault();
    var title = document.forms['news_edit_form']['title'].value
    var date_published = document.forms['news_edit_form']['date_published'].value
    var topic = document.forms['news_edit_form']['topic'].value
    var image = document.forms['news_edit_form']['image'].value
    var descriptions = document.forms['news_edit_form']['descriptions'].value
    var id = document.forms['news_edit_form']['id'].value
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/edit_news_action.php',
        type: 'get',
        data: {
            id: id,
            title: title,
            date_published: date_published,
            topic: topic,
            image: image,
            descriptions: descriptions,
        },
        success: function (data) {
            var message = document.getElementById('message');
            message.innerText = data;
        }

    })
}




