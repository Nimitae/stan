<?php
require_once('forAllPages.php');
include("dbconfig.php");

$verifySuccessful = false;
if (isset($_GET['email']) && isset($_GET['hash'])){

    $sqlParams = array();
    $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = "SELECT * FROM users WHERE email = ? AND hash = ?;";
    $sqlParams[] = $_GET["email"];
    $sqlParams[] = $_GET["hash"];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($sqlParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($result) > 0) {
        $sqlParams = array();
        $sql = "UPDATE users SET status = 2 WHERE email = ?;";
        $sqlParams[] = $_GET["email"];
        $stmt = $dbh->prepare($sql);
        if($stmt->execute($sqlParams)){
            $verifySuccessful = true;
        }
    }
}
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
<h1><?php $verifySuccessful ? print "SUCCESSFUL" : print "UNABLE TO VERIFY" ;?></h1>
<a href="login.php">Return to login</a>



