<!--NEED ILAGAY CONNECTION SA KUNG ANUMANG GAGAMITING DATABASE-->

<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="g1lm0r3";
$dbname="liempohan_db";

try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>