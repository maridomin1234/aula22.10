<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Departamento</title>
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
        <h2>Cadastrar Departamento</h2>

        <?php
        // Incluindo o arquivo de conexão
        include 'conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recebendo os dados do formulário
            $dep_numero = $_POST['dep_numero'];
            $dep_setor = $_POST['dep_setor'];

            // SQL para inserir os dados na tabela tbl_departamento
            $sql = "INSERT INTO tbl_departamento (dep_numero, dep_setor) 
                    VALUES ('$dep_numero', '$dep_setor')";

            // Executando a query e verificando se a inserção foi bem-sucedida
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message' style='color: green;'>Departamento cadastrado com sucesso!</div>";
            } else {
                echo "<div class='message'>Erro ao cadastrar departamento: " . $conn->error . "</div>";
            }

            // Fechando a conexão com o banco de dados
            $conn->close();
        }
        ?>

        <form action="" method="POST">
            <label for="dep_numero">Número do Departamento:</label>
            <input type="number" id="dep_numero" name="dep_numero" required>

            <label for="dep_setor">Setor do Departamento:</label>
            <input type="text" id="dep_setor" name="dep_setor" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>

</body>
</html>
