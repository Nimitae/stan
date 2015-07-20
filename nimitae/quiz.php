<?php

require_once('forAllPages.php');
require_once('moduleservices.php');
$moduleServices = new ModuleServices();

$category = $moduleServices->getModuleIDOfCategory($_POST['categoryID']);

include('header.partial.php');
?>

            <h2 class="sub-header"><?php print $category->moduleID . ' : ' . $category->title; ?></h2>
            <?php if ($category->questionType == MCQ) : ?>
                <p id="question"></p>
                <br>

                <form method="post" onsubmit="checkAnswer2();return false;">
                    <p class="question-option" id="option1"><input type="radio"></p>

                    <p class="question-option" id="option2"><input type="radio"></p>

                    <p class="question-option" id="option3"><input type="radio"></p>

                    <p class="question-option" id="option4"><input type="radio"></p>

                    <input type="submit" value="Check Answer">
                </form>
            <?php elseif ($category->questionType == FILLBLANK) : ?>
                <form method="post" onsubmit="checkFillBlank();return false;">
                    <p id="fillBlankQuestion">

                    </p>
                    <input type="submit" value="Check Answer">

                </form>
            <?php endif; ?>
            <div hidden id="categoryID"><?php print $category->categoryID; ?></div>
            <div hidden id="questionID">0</div>
            <div hidden id="questionType"><?php print $category->questionType; ?></div>


<?php include('footer.partial.php');