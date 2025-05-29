<?php
require_once __DIR__ . '/../DBconfig/DBconfig.inc.php';
class QuestionsHandler{
    protected $pdo;
    protected $domain_id;
    public function __construct(PDO $pdo, int $domain_id) {
        $this->pdo = $pdo;
        $this->domain_id = $domain_id;
    }
    public function getQuestionAndAnswers(int $offset = 0): array {
        // OFFSET este adăugat direct, nu prin ? (deoarece e deja int)
        $sql = "SELECT * FROM questions WHERE domain_id = ? ORDER BY id ASC LIMIT 1 OFFSET $offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->domain_id]);
    
        $question = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$question) {
            return ['error' => 'No questions found.'];
        }
    
        $stmt = $this->pdo->prepare("SELECT id, answer_text FROM answers WHERE questions_id = ?");
        $stmt->execute([$question['id']]);
        $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        shuffle($answers);
        return [
            'question' => $question['question'],
            'answer_text' => $answers
        ];
    }
    
}

