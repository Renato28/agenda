<?php

require_once 'init.php';

//Abre a conexão
$PDO = db_connect();

//SQL para contar o total de registros
$sql_count = "SELECT COUNT(*) AS total FROM contato ORDER BY nome ASC";

//SQL para selecionar os registros
$sql = "SELECT id, nome, telefone, email, cidade, estado, categoria FROM contato ORDER BY nome ASC";

//Conta o total de registros.
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

//Seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agenda</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<h1>Agenda</h1>
<hr>
<p><a href="form-add.php" class="btn btn-info">Adicionar</a></p>

<h2>Lista de Contatos</h2>
<p>Total de Contatos: <?php echo $total ?></p>

<?php if ($total > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($contato = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $contato['nome'] ?></td>
                <td><?php echo $contato['telefone'] ?></td>
                <td><?php echo $contato['email'] ?></td>
                <td><?php echo $contato['cidade'] ?></td>
                <td><?php echo $contato['estado'] ?></td>
                <td><?php echo $contato['categoria'] ?></td>
                <td>
                    <a href="form-edit.php?id=<?php echo $contato['id'] ?>" class="btn btn-info">Editar</a>
                    <a href="delete.php?id=<?php echo $contato['id'] ?>" class="btn btn-danger"
                       onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

<?php else: ?>

    <p>Nenhum contato registrado</p>

<?php endif; ?>

</body>
</html>