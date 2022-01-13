
function validate_username() {
    var username = document.forms['user_create_form']['username'].value
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/check_username.php',
        type: 'post',
        data: {username: username},
        success: function (data) {
            var message = document.getElementById('message')
            if (data === '\nsuccess') {
                message.innerHTML = '<h1>Username already exist</h1>'
                message.className = 'has-text-danger'
            } else {
                message.innerHTML = ''
            }
        }
    })
}

function validate_email() {
    var email = document.forms['user_create_form']['email'].value
    $.ajax({
        url: 'http://localhost/newsportal/admin/components/check_email.php',
        type: 'post',
        data: {email: email},
        success: function (data) {
            var message = document.getElementById('message')
            if (data === '\nsuccess') {
                message.innerHTML = '<h1>Email already exist</h1>'
                message.className = 'has-text-danger'
            } else {
                message.innerHTML = ''
            }
        }
    })
}

function validate_first_name() {

}

function validate_last_name() {

}

function validate_password() {

}

function validate_retype_password() {

}

