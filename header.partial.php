<?php if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description">
    <meta name="author">
    <link rel="icon" href="../../favicon.ico">
    <title>
        Dashboard Template for Bootstrap
    </title><!-- Bootstrap core CSS -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet" type="text/css"><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>
    <script type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/quiz.js"></script>
    <link href="sh-default.css" rel="stylesheet" default-stylesheet="true" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Advent+Pro:100,200,300,regular,500,600,700" rel="stylesheet" type="text/css" data-familyname="Advent Pro" data-cssintegration=
    "font-family:Advent Pro,serif;">
    <link href="http://fonts.googleapis.com/css?family=Jaldi:regular,700" rel="stylesheet" type="text/css" data-familyname="Jaldi" data-cssintegration="font-family:Jaldi,serif;">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic,300,300italic,regular,italic,600,600italic,700,700italic" rel="stylesheet" type="text/css" data-familyname=
    "Josefin Sans" data-cssintegration="font-family:Josefin Sans,serif;">
    <link href="http://fonts.googleapis.com/css?family=Julius+Sans+One:regular" rel="stylesheet" type="text/css" data-familyname="Julius Sans One" data-cssintegration=
    "font-family:Julius Sans One,serif;">
    <link href="http://fonts.googleapis.com/css?family=Poiret+One:regular" rel="stylesheet" type="text/css" data-familyname="Poiret One" data-cssintegration="font-family:Poiret One,serif;">
</head>
<body style="cursor: auto;">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#B73F5C">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button><a class="navbar-brand" href="#" style="color:white">STAN</a>
        </div>
        <div class="navbar-collapse collapse" style="background-color:#B73F5C">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" style="color:white">Dashboard</a>
                </li>
                <li>
                    <a href="#" style="color:white">Settings</a>
                </li>
                <li>
                    <a href="#" style="color:white">Profile</a>
                </li>
                <li>
                    <a href="#" style="color:white">Help</a>
                </li>
            </ul>
            <form action="home.php" class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search Modules...">
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active">
                    <a href="home.php">Overview</a>
                </li>
                <li>
                    <a href="stastistics.php" style="color:white" class>Statistics</a>
                </li>
                <li>
                    <a href="modulelist.php" style="color:white">Modules</a>
                </li>
                <li>
                    <a href="#" style="color:white">Export</a>
                </li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>
                    <a href style="color:white">Nav item</a>
                </li>
                <li>
                    <a href style="color:white">Nav item again</a>
                </li>
                <li>
                    <a href style="color:white">One more nav</a>
                </li>
                <li>
                    <a href style="color:white">Another nav item</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">