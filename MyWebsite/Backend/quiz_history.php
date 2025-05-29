<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../Backend/questions_handler.php';

try {
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
    $fetcher = new QuestionsHandler($pdo, 2); // <- aici schimbi doar domain_id-ul
    $fetcher = new QuestionsHandler($pdo, 2); 
    $result = $fetcher->getQuestionAndAnswers($offset);
    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Eroare DB: ' . $e->getMessage()]);
}