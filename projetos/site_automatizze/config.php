<?php
$host = "localhost"; // ou o IP do servidor MySQL
$dbname = "automatizze_db"; // Nome do banco de dados
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL (deixe em branco se estiver usando XAMPP no Windows)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurações de erro do PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
