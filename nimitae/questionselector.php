<?php
require_once('forAllPages.php');
include("dbconfig.php");

/*
$_POST['categoryID'] = 1;
$_POST['prevQuestionID']= 0;
$_POST['prevQuestionPass'] ="";
*/

if (isset($_POST['categoryID']) && isset($_POST['prevQuestionID']) && isset($_POST['prevQuestionPass'])) {
    $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    if ($_POST['prevQuestionID'] != 0) {
        $sqlParams = array();
        $sql = "INSERT INTO questiontracking VALUES (NULL,?, ?, ?,?);";
        $stmt = $dbh->prepare($sql);
        $sqlParams[] = $_POST['categoryID'];
        $sqlParams[] = $_POST['prevQuestionID'];

        if ($_POST['prevQuestionPass'] == "true"){
            $sqlParams[] = 1;
        } else {
            $sqlParams[] = 0;
        }
        $sqlParams[] = $_SESSION['email'];
        $stmt->execute($sqlParams);
    }

    $sqlParams = array();
    $sql = "SELECT * FROM categories WHERE categoryID = ?;";
    $stmt = $dbh->prepare($sql);
    $sqlParams[] = $_POST['categoryID'];
    $stmt->execute($sqlParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result[0]['questionType'] == MCQ) {
        $sqlParams = array();
        $sql = "SELECT * from mcqquestions WHERE categoryID = ? ORDER BY RAND() LIMIT 1;";
        $stmt = $dbh->prepare($sql);
        $sqlParams[] = $_POST['categoryID'];
        $stmt->execute($sqlParams);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($result[0]);
    } else {
        $sqlParams = array();
        $sql = "SELECT * from fillblankquestion WHERE categoryID = ? ORDER BY RAND() LIMIT 1;";
        $stmt = $dbh->prepare($sql);
        $sqlParams[] = $_POST['categoryID'];
        $stmt->execute($sqlParams);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($result[0]);
    }


}