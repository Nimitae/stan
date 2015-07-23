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
    $(':checkbox').click( function (e) {

        e.stopPropagation();
    });
});

function selectedModule(obj) {
    window.location = "module.php?moduleID=" + obj.id;
}

function selectedCategory(obj) {
    var url = 'quiz.php';
    var form = $('<form style="display:none" action="' + url + '" method="post">' +
    '<input type="text" name="categoryID" value="' + obj.id + '" />' +
    '</form>');
    $('body').append(form);
    form.submit();
}

function loadUpdateQuestionModal(obj) {
    var tds = obj.children;

    $('#question-update').val(tds[1].innerText);
    $('#A-update').val(tds[2].innerText);
    $('#B-update').val(tds[3].innerText);
    $('#C-update').val(tds[4].innerText);
    $('#D-update').val(tds[5].innerText);
    $('#questionID-update').val(obj.id);
    $('#editquestion').modal('show');
}

