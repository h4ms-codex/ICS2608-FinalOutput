
<?php
$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "root";
$password = "12345";
$dbname = "liempohan_db";

try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
