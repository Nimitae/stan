<?php
require_once('forAllPages.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description">
    <meta name="author">
    <title>
        Stan Registration
    </title><!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>
    <script type="text/javascript" type="text/javascript"
            src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="text/javascript" type="text/javascript"
            src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="sh-default.css" rel="stylesheet" default-stylesheet="true" type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic,300,300italic,regular,italic,600,600italic,700,700italic"
        rel="stylesheet" type="text/css" data-familyname=
        "Josefin Sans" data-cssintegration="font-family:Josefin Sans,serif;">
    <link href="http://fonts.googleapis.com/css?family=Julius+Sans+One:regular" rel="stylesheet" type="text/css"
          data-familyname="Julius Sans One" data-cssintegration=
          "font-family:Julius Sans One,serif;">
    <link href="http://fonts.googleapis.com/css?family=Poiret+One:regular" rel="stylesheet" type="text/css"
          data-familyname="Poiret One" data-cssintegration="font-family:Poiret One,serif;">
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body style="cursor: auto;">
<div class="container">
    <form class="form-signin" method="post" onsubmit="register();return false;" role="form">
        <h2 class="form-signin-heading">
            REGISTRATION
        </h2><input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus=""><input
            type="password" id="password" class="form-control" placeholder="Password" required=
        ""><input type="password" id="repeat" class="form-control outcast" placeholder="Re-enter password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign up
        </button>
    </form>
</div>
<!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>