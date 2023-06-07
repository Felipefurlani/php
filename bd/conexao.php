<?php

try {
    $db = 'mysql:host=143.106.241.3;dbname=cl201279;charset=utf8';
    $user = 'cl201279';
    $pass = 'cl*17082005';
    $pdo = new PDO($db, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>