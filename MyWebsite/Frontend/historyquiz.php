<?php
session_start(); 
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
  <title>Science Quiz</title>
  <title>History Quiz</title>
</head>
<body class="historyquiz">
  <div class="historyquiz-container">
    <h1>History Quiz</h1>
    <p id="question">Loading question...</p>
    <form id="quiz-form" style="display: none;">
      <table id="answers-table">
        <tbody></tbody>
      </table>
      <h2><button type="submit">Submit</button></h2>
    </form>
    <p id="score">Score: 0/5</p>
    <p><a href="index.php">Back to home</a></p>
  </div>
  
  <script>
    const questionElement = document.getElementById('question');
    const scoreElement = document.getElementById('score');
    const form = document.getElementById('quiz-form');
    const tbody = document.getElementById('answers-table').querySelector('tbody');

    let score = 0;
    let currentQuestionIndex = 0;
    const totalQuestions = 5; 

    function loadQuestion(index) {
      fetch(`../Backend/quiz_history.php?offset=${index}`)
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            questionElement.textContent = data.error;
            form.style.display = 'none';
            return;
          }

          questionElement.textContent = data.question.trim();
          tbody.innerHTML = '';
          data.answer_text.forEach(answer => {
            const tr = document.createElement('tr');
            const tdRadio = document.createElement('td');
            const input = document.createElement('input');
            input.type = 'radio';
            input.name = 'answer';
            input.value = answer.id; 
            tdRadio.appendChild(input);
            tr.appendChild(tdRadio);

            const tdText = document.createElement('td');
            tdText.textContent = answer.answer_text;
            tr.appendChild(tdText);
            tbody.appendChild(tr);
          });

          form.style.display = 'table';
        })
        .catch(err => {
          questionElement.textContent = 'Error loading question.';
          console.error('Fetch error:', err);
        });
    }

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const selected = document.querySelector('input[name="answer"]:checked');
      if (!selected) {
        alert('Select an answer!');
        return;
      }

      fetch('../Backend/submit_answer.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `radio=${encodeURIComponent(selected.value)}`
      })
      .then(res => res.json())
      .then(res => {
        if (res.correct) {
          score++;
          alert('Correct answer!');
        } else {
          alert('Wrong answer!');
        }

        scoreElement.textContent = `Score: ${score}/5`;
        currentQuestionIndex++;
        if (currentQuestionIndex >= 5) {
          alert(`End of quiz! final score: ${score}/5`);
          form.style.display = 'none';
          questionElement.textContent = 'End of quiz!';
          window.location.href = '../Frontend/index.php';

        } else {
          loadQuestion(currentQuestionIndex);
        }
      })
      .catch(() => alert('Error sending response'));
    });
    console.log(currentQuestionIndex);
    loadQuestion(currentQuestionIndex);
  </script>
</body>
</html>