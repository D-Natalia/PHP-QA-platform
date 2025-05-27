<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../DBconfig/DBconfig.inc.php';

try {
 
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$domain_id = 1;

$sql = "SELECT * FROM questions WHERE domain_id = ? ORDER BY id ASC LIMIT 1 OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute([$domain_id]);
$question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        echo json_encode(['error' => 'No questions found.']);
        exit;
    }

    $questions_id = $question['id'];

    $stmt = $pdo->prepare("SELECT id, answer_text FROM answers WHERE questions_id = ?");
    $stmt->execute([$questions_id]);
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'question' => $question['question'],  
        'answer_text' => $answers
    ]);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Eroare DB: ' . $e->getMessage()]);
}
