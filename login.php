<?php
require_once('forAllPages.php');

?>
<!DOCTYPE html>
<html>
<head>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="sh-default.css" rel="stylesheet" default-stylesheet="true" type="text/css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <title>STAN</title>
    <link href="http://fonts.googleapis.com/css?family=Julius+Sans+One:regular" rel="stylesheet" type="text/css" data-familyname="Julius Sans One" data-cssintegration=
    "font-family:Julius Sans One,serif;">
    <link href="http://fonts.googleapis.com/css?family=Poiret+One:regular" rel="stylesheet" type="text/css" data-familyname="Poiret One" data-cssintegration="font-family:Poiret One,serif;">
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" undefined=""></script><!--  End of Bootstrap 3.2.0 JS File  -->
    <link href="signin.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
    <script type="text/javascript" type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="text/javascript" type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="sh-default.css" rel="stylesheet" default-stylesheet="true" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic,300,300italic,regular,italic,600,600italic,700,700italic" rel="stylesheet" type="text/css" data-familyname=
    "Josefin Sans" data-cssintegration="font-family:Josefin Sans,serif;">
    <link href="http://fonts.googleapis.com/css?family=Julius+Sans+One:regular" rel="stylesheet" type="text/css" data-familyname="Julius Sans One" data-cssintegration=
    "font-family:Julius Sans One,serif;">
    <link href="http://fonts.googleapis.com/css?family=Poiret+One:regular" rel="stylesheet" type="text/css" data-familyname="Poiret One" data-cssintegration="font-family:Poiret One,serif;">
</head>
<body style="cursor: auto;">
<h1>
    STAN
</h1>
<h2 class="h2">
    Answering Questions, All Day Err Day
</h2>
<div>
    <form method="post" class="form-horizontal" onsubmit="login();return false;">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-4">
                <input class="form-control" type="text" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-4">
                <input class="form-control" type="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-3">
                <div class="checkbox">
                    <label><input type="checkbox">Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-default">
                    Log in
                </button>
                    <a class="btn btn-danger pull-right" href="signup.php">Sign up</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
