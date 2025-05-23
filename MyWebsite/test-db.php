<?php
require_once "includes/DBconfig.inc.php";
if ($pdo) {
    echo "Conexiunea la baza de date a fost realizată cu succes!";
} else {
    echo "Eroare la conectarea la baza de date!";
}
?>