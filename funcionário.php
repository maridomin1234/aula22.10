<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            background-color: #218838;
        }
        
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Cadastrar Funcionário</h2>

        <?php
        // Incluindo o arquivo de conexão
        include 'conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recebendo os dados do formulário
            $funci_numero = $_POST['funci_numero'];
            $funci_salario = $_POST['funci_salario'];
            $funci_telefone = $_POST['funci_telefone'];
            $funci_departamento = $_POST['funci_departamento'];

            // SQL para inserir os dados na tabela
            $sql = "INSERT INTO tbl_funcionario (funci_numero, funci_salario, funci_telefone, funci_departamento_dep_numero)
                    VALUES ('$funci_numero', '$funci_salario', '$funci_telefone', '$funci_departamento')";

            // Executando a query e verificando se a inserção foi bem-sucedida
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message' style='color: green;'>Funcionário cadastrado com sucesso!</div>";
            } else {
                echo "<div class='message'>Erro ao cadastrar funcionário: " . $conn->error . "</div>";
            }

            // Fechando a conexão com o banco de dados
            $conn->close();
        }
        ?>

        <form action="" method="POST">
            <label for="funci_numero">Número do Funcionário:</label>
            <input type="number" id="funci_numero" name="funci_numero" required>

            <label for="funci_salario">Salário:</label>
            <input type="number" id="funci_salario" name="funci_salario" required>

            <label for="funci_telefone">Telefone:</label>
            <input type="text" id="funci_telefone" name="funci_telefone" required>

            <label for="funci_departamento">Departamento (Número):</label>
            <input type="number" id="funci_departamento" name="funci_departamento" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>

</body>
</html>
