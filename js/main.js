$(document).ready(function () {
    /*
    var username = localStorage.getItem("username");
    var password = localStorage.getItem("password");
    console.log("Username: " + username);
    console.log("Password: " + password);
    if (localStorage.getItem("username") == null || localStorage.getItem("password") == null) {
        window.location.replace("login.html");
    }
    */
});

function selectedModule(obj) {
    window.location = "module.php?moduleID=" + obj.id;
}

function selectedCategory (obj) {
    var url = 'quiz.php';
    var form = $('<form style="display:none" action="' + url + '" method="post">' +
        '<input type="text" name="categoryID" value="' + obj.id + '" />' +
        '</form>');
    $('body').append(form);
    form.submit();
}