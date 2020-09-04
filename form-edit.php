<?php

require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, telefone, email, cidade, estado, categoria FROM contato WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$contato = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($contato)) {
    echo "Nenhum contato encontrado";
    exit;
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agenda - Editar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Agenda</h1>
            <br>
            <form action="edit.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" , name="nome" value="<?php echo $contato['nome'] ?>"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" , name="telefone" value="<?php echo $contato['telefone'] ?>"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $contato['email'] ?>"
                           placeholder="name@example.com" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?php echo $contato['cidade'] ?>"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" class="form-control">
                        <option value="<?php echo $contato['estado'] ?>">PB</option>
                        <option value="<?php echo $contato['estado'] ?>">PE</option>
                        <option value="<?php echo $contato['estado'] ?>">SP</option>
                        <option value="<?php echo $contato['estado'] ?>">RJ</option>
                        <option value="<?php echo $contato['estado'] ?>">MG</option>
                    </select>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select id="categoria" name="categoria" class="form-control">
                            <option value="<?php echo $contato['categoria'] ?>">Cliente</option>
                            <option value="<?php echo $contato['categoria'] ?>">Funcionario</option>
                            <option value="<?php echo $contato['categoria'] ?>">Fornecedor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Alterar" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
