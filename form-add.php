<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Agenda - Cadastrar</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Agenda</h1>
            <br>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="name@example.com" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" class="form-control">
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="SP">SP</option>
                        <option value="RJ">RJ</option>
                        <option value="MG">MG</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option value="cliente">Cliente</option>
                        <option value="funcionario">Funcionario</option>
                        <option value="fornecedor">Fornecedor</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Cadastrar" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
</body>
</html>