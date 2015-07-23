<?php
require_once('forAllPages.php');
require_once('class/module.class.php');
require_once('class/category.class.php');
require_once('class/MCQQuestion.class.php');
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

    public function getQuestionsFromCategory($category)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "";
        if ($category->questionType == MCQ) {
            $sql = "SELECT * from mcqquestions WHERE categoryID = :categoryID;";
        } else if ($category->questionType == FILLBLANK) {
            $sql = "SELECT * from fillblankquestion WHERE categoryID = :categoryID;";
        }
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":categoryID", $category->categoryID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $questionArray = array();
        foreach ($result as $row) {
            $newQuestion = new MCQQuestion ($row['questionID'], $row['question'], $row['option1'], $row['option2'], $row['option3'], $row['option4']);
            $questionArray[] = $newQuestion;
        }
        return $questionArray;
    }

    public function getCategoryByID($categoryID)
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

    public function createMCQQuestion()
    {
        //$newMCQ = new MCQQuestion(NULL, $_POST['question'], $_POST['option1'], $_POST['option2'], $_POST['option3'], $_POST['option4']);
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO mcqquestions VALUES(NULL, ?,?,?,?,?,?) ;";
        $stmt = $dbh->prepare($sql);
        $sqlParams = array();
        $sqlParams[] = $_POST['categoryID'];
        $sqlParams[] = $_POST['question'];
        $sqlParams[] = $_POST['option1'];
        $sqlParams[] = $_POST['option2'];
        $sqlParams[] = $_POST['option3'];
        $sqlParams[] = $_POST['option4'];
        $stmt->execute($sqlParams);
    }

    public function saveMCQQuestion($question)
    {

    }

    public function deleteSelectedMCQQuestions()
    {
        foreach ($_POST as $key => $value) {
            if (is_numeric($key)) {
                $this->deleteMCQQuestion($_POST['categoryID'], $key);
            }
        }
    }

    public function deleteMCQQuestion($categoryID, $questionID)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "DELETE FROM mcqquestions WHERE questionID =?;";
        $stmt = $dbh->prepare($sql);
        $sqlParams = array();
        $sqlParams[] = $questionID;
        $stmt->execute($sqlParams);
    }

    public function updateSelectedMCQQuestion()
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "UPDATE mcqquestions SET question =?,
                  option1=?,
                  option2=?,
                  option3=?,
                  option4=?
                  WHERE questionID =?;";
        $stmt = $dbh->prepare($sql);
        $sqlParams = array();
        $sqlParams[] = $_POST['question'];
        $sqlParams[] = $_POST['option1'];
        $sqlParams[] = $_POST['option2'];
        $sqlParams[] = $_POST['option3'];
        $sqlParams[] = $_POST['option4'];
        $sqlParams[] = $_POST['questionID'];
        $stmt->execute($sqlParams);
    }
}