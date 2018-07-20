<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/db.php");

try {
    $stmt = $pdo->query("SELECT
            type,
            weaponName
        FROM WEAPONS");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);

    return sqlReturn($results);
} catch (PDOException $e) {
    echo $e->getMessage();
    http_response_code(500);
    die();
}
