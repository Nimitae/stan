$(document).ready(function () {
    var parts = location.pathname.split('/');
    if (parts[parts.length - 1] == 'quiz.php') {
        if (document.getElementById('questionType').innerText == 1) {
            loadMCQQuestion();
        } else if (document.getElementById('questionType').innerText == 2) {
            loadFillBlankQuestion();
        }
    }
});

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
    //   } else {
    //      console.log("Attempting to answer question twice");
    //  }
    loadMCQQuestion();

}

function checkAnswer2() {
    var answer = $('form').serialize().split("=")[1];
    if (answer == "option1") {
        localStorage.setItem('prevQuestionResult', true);
        alert('You got that right! Loading new question.');
    } else {
        localStorage.setItem('prevQuestionResult', false);
        alert('Nope! Loading new question.');
    }
    console.log(answer);
    loadMCQQuestion();
}

function displayMCQ(data) {
    var dataObj = jQuery.parseJSON(data);
    console.log(dataObj);
    localStorage.setItem('correctAnswer', dataObj.option1);
    document.getElementById('question').innerText = dataObj.question;
    var ansArray = ['option1', 'option2', 'option3', 'option4'];
    shuffle(ansArray);
    document.getElementById(ansArray[0]).innerHTML = "<input name='answer' type='radio' value='option1' id='" + ansArray[0] + "Radio'> <label for='" + ansArray[0] + "Radio'>" + dataObj.option1 + "</label>";
    document.getElementById(ansArray[1]).innerHTML = "<input name='answer' type='radio' value='option2'  id='" + ansArray[1] + "Radio'> <label for='" + ansArray[1] + "Radio'>" + dataObj.option2 + "</label>";
    document.getElementById(ansArray[2]).innerHTML = "<input name='answer' type='radio' value='option3'  id='" + ansArray[2] + "Radio'> <label for='" + ansArray[2] + "Radio'>" + dataObj.option3 + "</label>";
    document.getElementById(ansArray[3]).innerHTML = "<input name='answer' type='radio' value='option4'  id='" + ansArray[3] + "Radio'> <label for='" + ansArray[3] + "Radio'>" + dataObj.option4 + "</label>";
    document.getElementById('questionID').innerText = dataObj.questionID;
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
