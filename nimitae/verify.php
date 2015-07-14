<?php
include("dbconfig.php");

$verifySuccessful = false;
if (isset($_GET['email']) && isset($_GET['hash'])){

    $sqlParams = array();
    $dbh = new PDO($DBCONFIG["connstring"], $DBCONFIG["username"], $DBCONFIG["password"]);
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
include ('header.partial.php');
?>

<h1><?php $verifySuccessful ? print "SUCCESSFUL" : print "UNABLE TO VERIFY" ;?></h1>
<a href="login.php">Return to login</a>



