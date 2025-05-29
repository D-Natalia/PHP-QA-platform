function initQuiz(apiEndpoint) {
    const questionElement = document.getElementById('question');
    const scoreElement = document.getElementById('score');
    const form = document.getElementById('quiz-form');
    const tbody = document.getElementById('answers-table').querySelector('tbody');
    let score = 0;
    let currentQuestionIndex = 0;
    const totalQuestions = 5;

    function loadQuestion(index) {
     fetch(`${apiEndpoint}?offset=${index}`)
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
            if (currentQuestionIndex >= totalQuestions) {
                alert(`End of quiz! Final score: ${score}/5`);
                form.style.display = 'none';
                questionElement.textContent = 'End of quiz!';
                window.location.href = '../Frontend/index.php';
            } else {
                loadQuestion(currentQuestionIndex);
            }
        })
        .catch(() => alert('Error sending response'));
    });

    loadQuestion(currentQuestionIndex);
}
