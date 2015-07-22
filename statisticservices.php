<?php
require_once('forAllPages.php');
require_once("dbconfig.php");

class StatisticServices
{
    function getStatisticsForEmail($email)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sqlParams = array();
        $sql = "SELECT * from questiontracking WHERE email =? ;";
        $stmt = $dbh->prepare($sql);
        $sqlParams[] = $email;
        $stmt->execute($sqlParams);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}