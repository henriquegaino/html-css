<?php
// Incluir o arquivo de configuração com a conexão ao banco de dados
include 'config.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar os dados enviados pelo formulário
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Verificar se o e-mail já está cadastrado
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        // E-mail já existe
        echo "Este e-mail já está cadastrado. Tente outro.";
    } else {
        // Senha criptografada
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir o novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha_criptografada])) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário. Tente novamente.";
        }
    }
}
?>
