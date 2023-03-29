<?php
require_once __DIR__ . '/config/bootstrap.php';

use App\Core\Database;

$sql = file_get_contents('ecommerce.sql');

try {
    $db = Database::getInstance();
    $db->connect()->exec($sql);
} catch (PDOException $e) {
    die("SQL error: " . $e->getMessage());
}
