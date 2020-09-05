<?php

require_once 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

if (empty($nome) || empty($telefone) || empty($email) || empty($cidade) || empty($estado) || empty($categoria)) {
    echo "Preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "INSERT INTO contato(nome, telefone, email, cidade, estado, categoria) VALUES (:nome, :telefone, :email, :cidade, :estado, :categoria)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':categoria', $categoria);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>


