<?php

require_once('forAllPages.php');
require_once('moduleservices.php');
$moduleServices = new ModuleServices();

$category = $moduleServices->getCategoryByID($_POST['categoryID']);

include('header.partial.php');
?>

    <h1 class="page-header quiz-header" id="quiz-header" draggable="false">
        <?php print $category->moduleID . ':' ?>
    </h1>
    <h1 class="page-header quiz-subheader" id="quiz-subheader" draggable="false">
        <?php print $category->title; ?>
    </h1>
    <a class="btn btn-default btn-primary quiz" id="quiz-start" href="#">Quiz On/Off</a>
    <a class="btn btn-default btn-primary start" id="normal-start" onclick="startQuiz()">Start!</a>

    <div id="question-area">

    </div>
    <div hidden id="categoryID"><?php print $category->categoryID; ?></div>
    <div hidden id="questionID">0</div>
    <div hidden id="questionType"><?php print $category->questionType; ?></div>


<?php include('footer.partial.php');