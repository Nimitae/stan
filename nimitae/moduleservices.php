<?php
require_once('forAllPages.php');
require_once('class/module.class.php');
require_once('class/category.class.php');
require_once("dbconfig.php");


class ModuleServices
{

    public function getModuleListing()
    {
        $sqlParams = array();
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * from modules ;";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($sqlParams);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $moduleArray = array();
        foreach ($result as $row) {
            $newModule = new Module ($row['moduleID'], $row['title'], $row['description']);
            $moduleArray[] = $newModule;
        }
        return $moduleArray;
    }

    public function getModuleCategories($moduleID)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * from categories WHERE moduleID = :moduleID ;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":moduleID", $moduleID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categoryArray = array();
        foreach ($result as $row) {
            $newCategory = new Category ($row['categoryID'], $row['moduleID'], $row['title'], $row['description'], $row['questionType']);
            $categoryArray[] = $newCategory;
        }
        return $categoryArray;
    }

    public function getQuestionsOfCategoryAndType($categoryID, $type)
    {


    }

    public function getModuleIDOfCategory($categoryID)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * from categories WHERE categoryID = :categoryID ;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":categoryID", $categoryID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categoryArray = array();
        foreach ($result as $row) {
            $newCategory = new Category ($row['categoryID'], $row['moduleID'], $row['title'], $row['description'], $row['questionType']);
            $categoryArray[] = $newCategory;
        }
        return $categoryArray[0];
    }

    public function getAllCategories()
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * from categories;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":moduleID", $moduleID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categoryArray = array();
        foreach ($result as $row) {
            $newCategory = new Category ($row['categoryID'], $row['moduleID'], $row['title'], $row['description'], $row['questionType']);
            $categoryArray[$row['categoryID']] = $newCategory;
        }
        return $categoryArray;
    }
}