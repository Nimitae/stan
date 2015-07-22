<?php
require_once('forAllPages.php');
require_once('moduleservices.php');

$_POST['moduleID'] = "OHIRA1001";
$_POST['categoryID'] = "1";
$moduleServices = new ModuleServices();

if (isset($_POST['createQuestion'])) {
    $moduleServices->createMCQQuestion();
}

if (isset($_POST['deleteQuestion'])) {
    $moduleServices->deleteSelectedMCQQuestions();
}

if (isset($_POST['updateQuestion'])) {
    $moduleServices->updateSelectedMCQQuestion();
}

$category = $moduleServices->getCategoryByID($_POST['categoryID']);
$questionList = $moduleServices->getQuestionsFromCategory($category);

include('header.partial.php');
?>

<div class="" style="padding:0;margin-left:-40px; margin-top:-20px">
    <h1 class="pinkfont qnman" style="font-size:80px;">
        Questions Management
    </h1>

    <h1 class="blackfont bluebg modcod">
        <?php print $category->moduleID . ' : ' . $category->title ?>
    </h1>
</div>
<br><br>
<div style="margin-right:40px">
    <div class="btnbar">
        <a class="btn btn-default btn-primary start2" data-toggle="modal" data-target="#uploadcsv" href="#">Upload
            CSV</a> <a class="btn btn-default btn-primary start2" href=
        "#">Export CSV</a> <a class="btn btn-default btn-primary start2" data-toggle="modal" data-target="#create"
                              href="#">Create</a> <a class=
                                                     "btn btn-default btn-primary start2"
                                                     href="javascript:document.getElementById('delete-questions-form').submit();">Delete</a>
    </div>
    <br>

    <form method="post" id="delete-questions-form">
        <input type="hidden" value="<?php print $category->categoryID;?>" name="categoryID">
        <input type="hidden" value="1" name="deleteQuestion">
        <table class="table">
            <thead>
            <tr>
                <th>

                </th>
                <th>
                    Question
                </th>
                <th>
                    Correct Ans
                </th>
                <th>
                    Option B
                </th>
                <th>
                    Option C
                </th>
                <th>
                    Option D
                </th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($questionList as $question) : ?>
                <tr id="<?php print $question->questionID;?>" onclick="loadUpdateQuestionModal(this)">
                    <td>
                        <input type="checkbox" name="<?php print $question->questionID; ?>" value="1">
                    </td>

                    <td>
                        <?php print $question->question; ?>
                    </td>
                    <td>
                        <?php print $question->option1; ?>
                    </td>
                    <td>
                        <?php print $question->option2; ?>
                    </td>
                    <td>
                        <?php print $question->option3; ?>
                    </td>
                    <td>
                        <?php print $question->option4; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" class="form-horizontal" style="margin:0px;">
                <input type="hidden" name="createQuestion" value="1">
                <input type="hidden" name="categoryID" value="<?php print $category->categoryID; ?>">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="create">
                        Create a question
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="question" class="col-sm-2 control-label">Question</label>

                        <div class="col-sm-10">
                            <input type="text" name="question" id="question" placeholder="Type question here"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="A">A</label>

                        <div class="col-sm-10">
                            <input name="option1" class="form-control" type="text" id="A"
                                   placeholder="Type correct answer here">
                        </div>
                        <label class="col-sm-2 control-label" for="B">B</label>

                        <div class="col-sm-10">
                            <input name="option2" class="form-control" type="text" id="B"
                                   placeholder="Type option B here">
                        </div>
                        <label class="col-sm-2 control-label" for="C">C</label>

                        <div class="col-sm-10">
                            <input name="option3" class="form-control" type="text" id="C"
                                   placeholder="Type option C here">
                        </div>
                        <label class="col-sm-2 control-label" for="D">D</label>

                        <div class="col-sm-10">
                            <input name="option4" class="form-control" type="text" id="D"
                                   placeholder="Type option D here">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <input type="submit" class="btn btn-primary" value="Upload">
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="uploadcsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="uploadcsv">
                    Create a question
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="uploadfile">Upload CSV</label><input type="file" id="uploadfile">

                    <p class="help-block"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Upload
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editquestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" class="form-horizontal" style="margin:0px;">
                <input type="hidden" name="updateQuestion" value="1">
                <input type="hidden" name="categoryID" value="<?php print $category->categoryID; ?>">
                <input type="hidden" name="questionID" id="questionID-update" value="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="create">
                        Update Question
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="question" class="col-sm-2 control-label">Question</label>

                        <div class="col-sm-10">
                            <input type="text" name="question" id="question-update" placeholder="Type question here"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="A">A</label>

                        <div class="col-sm-10">
                            <input name="option1" class="form-control" type="text" id="A-update"
                                   placeholder="Type correct answer here">
                        </div>
                        <label class="col-sm-2 control-label" for="B">B</label>

                        <div class="col-sm-10">
                            <input name="option2" class="form-control" type="text" id="B-update"
                                   placeholder="Type option B here">
                        </div>
                        <label class="col-sm-2 control-label" for="C">C</label>

                        <div class="col-sm-10">
                            <input name="option3" class="form-control" type="text" id="C-update"
                                   placeholder="Type option C here">
                        </div>
                        <label class="col-sm-2 control-label" for="D">D</label>

                        <div class="col-sm-10">
                            <input name="option4" class="form-control" type="text" id="D-update"
                                   placeholder="Type option D here">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('footer.partial.php'); ?>








