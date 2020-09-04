<?php

require 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if(empty($nome) || empty($telefone) || empty($email) || empty($cidade) || empty($estado) || empty($categoria)){
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE contato SET nome = :nome, telefone = :telefone, email = :email, cidade = :cidade, estado = :estado, categoria = :categoria WHERE id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado );
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            header('Location: index.php');
        }else{
            echo "Erro ao alterar";
            print_r($stmt->errorInfo());
        }
?>
