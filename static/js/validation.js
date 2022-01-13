
function validate_username() {
    var username = document.forms['user_create_form']['username'].value
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/check_username.php',
        type: 'post',
        data: {username: username},
        success: function (data) {
            var message = document.getElementById('message')
            var button = document.getElementById('user_create_form_button')
            if (data === '\nsuccess') {
                message.innerHTML = '<h1>Username already exist</h1>'
                message.className = 'has-text-danger'
                button.disabled = true
            } else {
                message.innerHTML = ''
                button.disabled = false
            }
        }
    })
}

function validate_email() {
    var button = document.getElementById('user_create_form_button')
    var email = document.forms['user_create_form']['email'].value
    var regular_expression = /\S+@\S+\.\S+/;
    if (!regular_expression.test(email)) {
        message.innerHTML = '<h1>Invalid Email</h1>'
        message.className = 'has-text-danger'
        button.disabled = true
    } else {
        $.ajax({
            url: 'http://localhost/newsportal/admin/components/check_email.php',
            type: 'post',
            data: {email: email},
            success: function (data) {
                var message = document.getElementById('message')
                if (data === '\nsuccess') {
                    message.innerHTML = '<h1>Email already exist</h1>'
                    message.className = 'has-text-danger'
                    button.disabled = true
                } else {
                    message.innerHTML = ''
                    button.disabled = false
                }
            }
        })
    }
}

function validate_first_name() {

}

function validate_last_name() {

}

function validate_password() {

}

function validate_retype_password() {

}

