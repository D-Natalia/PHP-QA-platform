<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Science Quiz</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 600px;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #eee;
    }
  </style>
</head>
<body>
  <div class="sciencequiz-container">
    <h1>Science Quiz</h1>
    <p id="question">Loading question...</p>
    
    <table id="answers-table" style="display:none;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Answer</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <p id="score">Score: 0/5</p>
  </div>

  <script>
    fetch('../Backend/quiz_science.php')
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          document.getElementById('question').textContent = data.error;
          return;
        }

        document.getElementById('question').textContent = data.question.trim();

        const answersTable = document.getElementById('answers-table');
        const tbody = answersTable.querySelector('tbody');

        tbody.innerHTML = '';

        data.answer_text.forEach(answer => {
          const tr = document.createElement('tr');

          const tdId = document.createElement('td');
          tdId.textContent = answer.id;
          tr.appendChild(tdId);

          const tdText = document.createElement('td');
          tdText.textContent = answer.answer_text;
          tr.appendChild(tdText);

          tbody.appendChild(tr);
        });

        answersTable.style.display = 'table';
      })
      .catch(err => {
        document.getElementById('question').textContent = 'Error loading question.';
        console.error('Fetch error:', err);
      });
  </script>
</body>
</html>
