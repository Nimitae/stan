$(document).ready(function () {
    loadQuestion();

});

function loadQuestion() {
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
        success: displayQuestion,
        error: whoops
    })

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
    loadQuestion();

}

function displayQuestion(data) {
    var dataObj = jQuery.parseJSON(data);
    console.log(dataObj);
    localStorage.setItem('correctAnswer',dataObj.option1);
    document.getElementById('question').innerText = dataObj.question;
    var ansArray = ['option1','option2','option3','option4'];
    shuffle(ansArray);
    document.getElementById(ansArray[0]).innerText = dataObj.option1;
    document.getElementById(ansArray[1]).innerText = dataObj.option2;
    document.getElementById(ansArray[2]).innerText = dataObj.option3;
    document.getElementById(ansArray[3]).innerText = dataObj.option4;
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

function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}
