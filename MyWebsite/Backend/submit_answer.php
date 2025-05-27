<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../DBconfig/DBconfig.inc.php';

try {
    if (!isset($_POST['radio'])) {
        echo json_encode(['error' => 'No answer selected']);
        exit;
    }

    $answer_id = intval($_POST['radio']); 

    $stmt = $pdo->prepare("SELECT is_correct FROM answers WHERE id = ?");
    $stmt->execute([$answer_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo json_encode(['error' => 'Invalid response']);
        exit;
    }
    echo json_encode(['correct' => (bool)$result['is_correct']]);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Eroare DB: ' . $e->getMessage()]);
}
