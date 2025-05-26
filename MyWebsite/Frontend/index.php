<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard">

  <div class="startpage-container">
    <h1>Welcome to General Knowledge Quizzes</h1>
    <p>Choose the quiz you want to take</p>

<table>
      <tr>
        <th>Quiz Name</th>
        <th>Action</th>
      </tr>
      
      <tr>
        <td>Science Quiz</td>
        <td>
          <form action="sciencequiz.php" method="get">
            <button type="submit">Start quiz</button>
          </form>
        </td>
      </tr>

      <tr>
        <td>History Quiz</td>
        <td>
          <form action="Beckend/quiz_history.php" method="post">
            <button type="submit">Start Test</button>
          </form>
        </td>
      </tr>

      <tr>
        <td>Geography Quiz</td>
        <td>
          <form action="Beckend/quiz_geography.php" method="post">
            <button type="submit">Start Test</button>
          </form>
        </td>
      </tr>

      <tr>
        <td>Math Quiz</td>
        <td>
          <form action="Beckend/quiz_math.php" method="post">
            <button type="submit">Start Test</button>
          </form>
        </td>
      </tr>

      <tr>
        <td>Literature Quiz</td>
        <td>
          <form action="Beckend/quiz_literature.php" method="post">
            <button type="submit">Start Test</button>
          </form>
        </td>
      </tr>
    </table>
  </div>

</body>
</html>