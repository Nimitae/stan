/*
 $(document).ready(function() {
 if (localStorage.getItem("username") !== null && localStorage.getItem("password") !== null){
 window.location.replace("index.html");
 }
 });

 */

function register() {
    var url = "userservices.php";
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repeat = document.getElementById("repeat").value;
    alert("Please wait while we register your account!");
    if (password == repeat) {
        $.ajax({
            url: url,
            type: "POST",
            data: {register: "register", email: email, password: password},
            success: processResult,
            error: whoops
        });
    } else {
        //TODO: Passwords not the same
        alert("Passwords are not the same!");
    }
}

function login() {
    var url = "userservices.php";
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    $.ajax({
        url: url,
        type: "POST",
        data: {login: "login", email: email, password: password},
        success: processResult,
        error: whoops
    });
}

function processResult(data) {
    var dataObj = jQuery.parseJSON(data);
    console.log(data);

    if (dataObj.type == "login") {
        if (dataObj.result == "Success") {
            window.location.replace("home.php");
            /*
             var email = document.getElementById("email").value;
             var password = document.getElementById("password").value;
             localStorage.setItem("username", email);
             localStorage.setItem("password", password);
             window.location.replace("index.html");
             */

        } else {
            //TODO: Failed to login account
            alert('Failed to login to account! Your email may not have been verified!');
        }
    } else if (dataObj.type="register") {
        if (dataObj.result == "Success") {
            alert('Registered account successfully!');
            window.location.replace("login.php");

        } else {
            //TODO: Failed to register account
            alert('Failed to register new account!');
        }
    }

}

function whoops() {
    //TODO: Something went wrong with ajax
    alert('Something went wrong with ajax!');
}
