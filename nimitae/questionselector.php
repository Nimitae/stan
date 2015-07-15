<?php
require_once('forAllPages.php');
include("dbconfig.php");

/*
$_POST['categoryID'] = 1;
$_POST['prevQuestionID']= 0;
$_POST['prevQuestionPass'] ="";
*/

if (isset($_POST['categoryID']) && isset($_POST['prevQuestionID']) && isset($_POST['prevQuestionPass'])) {
    $return = array();

    $sqlParams = array();
    $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = "SELECT * from mcqquestions WHERE categoryID = ? ORDER BY RAND() LIMIT 1;";
    $stmt = $dbh->prepare($sql);
    $sqlParams[] = $_POST['categoryID'];
    $stmt->execute($sqlParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($result[0]);
}