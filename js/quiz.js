var totalQuestions = 5;
var currentScore = 0;
var currentQuestion = 0;
var currentQuestionList = [];


$(document).ready(function () {
    /*
     var parts = location.pathname.split('/');
     if (parts[parts.length - 1] == 'quiz.php') {
     if (document.getElementById('questionType').innerText == 1) {
     loadMCQQuestion();
     } else if (document.getElementById('questionType').innerText == 2) {
     loadFillBlankQuestion();
     }
     }
     */
});

function startQuiz() {
    hideStartQuiz();
    initialiseQuestionArea();
    currentScore = 0;
    currentQuestion = 0;
    var questionType = document.getElementById('questionType').innerText;
    console.log(questionType);
    if (questionType == 1) {
        console.log('here');
        $("#question-area").prepend('<form method="post" onsubmit="checkAnswer2();return false;"><div id="question-mcq"><h1 class="page-header quiz-header2" draggable="false"><img class="resize" id="progress-bar" src=""></h1><p id="question"></p><br><div class="question-option" id="option1"><input type="radio"></div><div class="question-option" id="option2"><input type="radio"></div><div class="question-option" id="option3"><input type="radio"></div><div class="question-option" id="option4"><input type="radio"></div></div><br><br><input type="submit" class="btn btn-default btn-primary start2" value="Check Answer"></form>');
        loadMCQQuestion();
    }
}

function initialiseQuestionArea() {
    $('#question-area').empty();
}

function hideStartQuiz() {
    $("#quiz-header").hide();
    $("#quiz-subheader").hide();
    $("#normal-start").hide();
    $("#quiz-start").hide();
}

function loadMCQQuestion() {
    initialiseQuestionFields();
    console.log(document.getElementById('categoryID').innerText);
    console.log(document.getElementById('questionID').innerText);
    var prevQuestionPass = localStorage.getItem('prevQuestionResult');
    $.ajax({
        url: 'questionselector.php',
        type: "POST",
        data: {
            categoryID: document.getElementById('categoryID').innerText,
            prevQuestionID: document.getElementById('questionID').innerText,
            prevQuestionPass: prevQuestionPass
        },
        success: displayMCQ,
        error: whoops
    })

}

function loadFillBlankQuestion() {
    console.log(document.getElementById('categoryID').innerText);
    console.log(document.getElementById('questionID').innerText);
    var prevQuestionPass = localStorage.getItem('prevQuestionResult');
    $.ajax({
        url: 'questionselector.php',
        type: "POST",
        data: {
            categoryID: document.getElementById('categoryID').innerText,
            prevQuestionID: document.getElementById('questionID').innerText,
            prevQuestionPass: prevQuestionPass
        },
        success: displayFillBlank,
        error: whoops
    })
}

function displayFillBlank(data) {
    var dataObj = jQuery.parseJSON(data);
    console.log(dataObj);
    var questionSplit = dataObj.question.split("&");
    console.log(questionSplit);
    localStorage.setItem('correctAnswer', questionSplit[1]);
    document.getElementById('fillBlankQuestion').innerHTML = questionSplit[0] + " <input type='text' id='fillBlank'>" + questionSplit[2];
    document.getElementById('questionID').innerText = dataObj.questionID;
}

function checkFillBlank() {
    var filledAnswer = document.getElementById('fillBlank').value;
    console.log(filledAnswer);
    if (filledAnswer == localStorage.getItem('correctAnswer')) {
        if (localStorage.getItem('prevQuestionID') != document.getElementById('questionID').innerText) {
            localStorage.setItem('prevQuestionResult', true);
        }
        localStorage.setItem('prevQuestionID', document.getElementById('questionID').innerText);
        alert('Nice one! You got that right! Loading new question!');
        loadFillBlankQuestion();
    } else {
        localStorage.setItem('prevQuestionResult', false);
        alert('Nope! Please try again.')
    }
}

function checkAnswer(selectedOption) {
    console.log(selectedOption.text);
    //  if (localStorage.getItem('prevQuestionID') != document.getElementById('questionID').innerText) {
    localStorage.setItem('prevQuestionID', document.getElementById('questionID').innerText);
    if (selectedOption.innerHTML == localStorage.getItem('correctAnswer')) {
        localStorage.setItem('prevQuestionResult', true);
        alert('You got that right! Loading new question.');
    } else {
        localStorage.setItem('prevQuestionResult', false);
        alert('Nope! Loading new question.');
    }
    loadMCQQuestion();

}

function checkAnswer2() {
    var answer = $('form').serialize().split("=")[1];
    if (answer == currentQuestionList[currentQuestion-1].correct) {
        localStorage.setItem('prevQuestionResult', true);
        currentScore += 1;
    } else {
        localStorage.setItem('prevQuestionResult', false);
    }
    currentQuestionList[currentQuestion - 1].answered = answer;

    if (currentQuestion == totalQuestions) {
        loadEndQuiz();
    } else {
        loadMCQQuestion();
    }
}

function displayMCQ(data) {
    var dataObj = jQuery.parseJSON(data);
    console.log(dataObj);
    currentQuestion += 1;
    localStorage.setItem('correctAnswer', dataObj.option1);

    document.getElementById('question').innerText = dataObj.question;
    var ansArray = ['option1', 'option2', 'option3', 'option4'];
    shuffle(ansArray);
    document.getElementById(ansArray[0]).innerHTML = "<input name='answer' type='radio' value='" +ansArray[0] +  "' id='" + ansArray[0] + "Radio'> <label class='option-label' for='" + ansArray[0] + "Radio'>" + dataObj.option1 + "</label>";
    document.getElementById(ansArray[1]).innerHTML = "<input name='answer' type='radio' value='" +ansArray[1] +  "'  id='" + ansArray[1] + "Radio'> <label class='option-label' for='" + ansArray[1] + "Radio'>" + dataObj.option2 + "</label>";
    document.getElementById(ansArray[2]).innerHTML = "<input name='answer' type='radio' value='" +ansArray[2] +  "'  id='" + ansArray[2] + "Radio'> <label class='option-label' for='" + ansArray[2] + "Radio'>" + dataObj.option3 + "</label>";
    document.getElementById(ansArray[3]).innerHTML = "<input name='answer' type='radio' value='" +ansArray[3] +  "'  id='" + ansArray[3] + "Radio'> <label class='option-label' for='" + ansArray[3] + "Radio'>" + dataObj.option4 + "</label>";
    document.getElementById('questionID').innerText = dataObj.questionID;

    var question = {
        "question": dataObj.question,
        "option1": document.getElementById('option1').innerText,
        "option2": document.getElementById('option2').innerText,
        "option3": document.getElementById('option3').innerText,
        "option4": document.getElementById('option4').innerText,
        "correct": ansArray[0]
    };
    currentQuestionList.push(question);
    console.log(currentQuestionList);
    updateProgressBar();
}

function initialiseQuestionFields() {
    var question = document.getElementById('question');
    var option1 = document.getElementById('option1');
    var option2 = document.getElementById('option2');
    var option3 = document.getElementById('option3');
    var option4 = document.getElementById('option4');
    question.innerText = "";
    option1.innerText = "";
    option2.innerText = "";
    option3.innerText = "";
    option4.innerText = "";
}

function whoops() {

}

function shuffle(o) {
    for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}

function updateProgressBar() {
    var progressBarImages = [
        '',
        '',
        '',
        '',
        '//i61.tinypic.com/2s84d2h.png'
    ];
    console.log(currentQuestion);
    if (currentQuestion == totalQuestions) {
        document.getElementById("progress-bar").src = progressBarImages[4];
    } else if (currentQuestion > totalQuestions * 3 / 4) {
        document.getElementById("progress-bar").src = progressBarImages[3];
    } else if (currentQuestion > totalQuestions * 3 / 4) {
        document.getElementById("progress-bar").src = progressBarImages[2];
    } else if (currentQuestion > totalQuestions * 3 / 4) {
        document.getElementById("progress-bar").src = progressBarImages[1];
    } else if (currentQuestion > totalQuestions * 3 / 4) {
        document.getElementById("progress-bar").src = progressBarImages[0];
    }
}

function loadEndQuiz() {
    initialiseQuestionArea();
    $('#question-area').prepend('<div><h1 class="page-header quiz-header" draggable="false">YOUR SCORE: ' + currentScore + '/' + totalQuestions + '</h1></div>' +
        '<p id="results-area"></p>' +
        '<a class="btn btn-default btn-primary start3" onclick="startQuiz()">Retake Quiz!</a>');

    for (var i = 0; i < currentQuestionList.length; i++) {
        $('#results-area').append('<p>' + currentQuestionList[i].question + '</p><br>' +
            '<div class="result-option" id="' + i + '_' + 1 + '">' + currentQuestionList[i].option1 + '</div>' +
            '<div class="result-option" id="' + i + '_' + 2 + '">' + currentQuestionList[i].option2 + '</div>' +
            '<div class="result-option" id="' + i + '_' + 3 + '">' + currentQuestionList[i].option3 + '</div>' +
            '<div class="result-option" id="' + i + '_' + 4 + '">' + currentQuestionList[i].option4 + '</div>'
        );

        var correct = currentQuestionList[i].correct.split('option')[1];
        $('#' + i + '_' + correct).addClass('green-answer');
        if (currentQuestionList[i].correct != currentQuestionList[i].answered) {
            var wrong = currentQuestionList[i].answered.split('option')[1];
            $('#' + i + '_' + wrong).addClass('red-answer');
        }
    }
}
