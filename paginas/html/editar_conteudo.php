<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar o ID do post do campo oculto
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : '';
    $subtitulo = isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : '';
    $conteudo = isset($_POST["conteudo"]) ? $_POST["conteudo"] : '';

    // Conexão com o banco de dados (substitua os valores pelos seus próprios)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estudaenem";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Atualizar os dados do post no banco de dados
    $sql = "UPDATE pg_index1 SET titulo='$titulo', subtitulo='$subtitulo', conteudo='$conteudo' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Erro na edição do post: " . mysqli_error($conn);
    }

    mysqli_close($conn); // fechar a conexão com o banco de dados
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/editar_conteudo.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <title>Editar Post</title>
</head>
<body>
<?php
    // Verifica se foi informado o ID da conta a ser editada
    if (isset($_POST["id"])) {
        $_POST["id"];

        // Conexão com o banco de dados (substitua os valores de acordo com a sua configuração)
        $conn = new mysqli("localhost", "root", "", "estudaenem");

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar os dados da conta com o ID informado
        $sql = "SELECT * FROM pg_index1 WHERE id = " . $_POST["id"];
        $resultado = $conn->query($sql);

        // Verifica se encontrou a conta com o ID informado
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            ?>
            <div class="container">
                <h1><b>Editar Post</b></h1>
                <form action="editar_conteudo.php" method="post">
                    <input class="inp" type="hidden" name="id" value="<?php echo isset($_POST["id"]) ? $_POST["id"] : ''; ?>">
                    <label for="titulo">Título:</label><br>
                    <input class="inp" type="text" id="titulo" name="titulo" value="<?php echo isset($_POST["titulo"]) ? $_POST["titulo"] : ''; ?>"><br><br>
                    <label for="subtitulo">Subtítulo:</label><br>
                    <input class="inp" type="text" id="subtitulo" name="subtitulo" value="<?php echo isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : ''; ?>"><br><br>
                    <label id="contd" for="conteudo">Conteúdo:</label><br>
                    <textarea id="conteudo" name="conteudo"><?php echo isset($_POST["conteudo"]) ? $_POST["conteudo"] : ''; ?></textarea><br><br>
                    <input id="bnt" type="submit" value="Salvar" onclick="editar()">
                </form>
            </div>
            <?php
        } else {
            echo "Nenhum registro encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "ID da conta não informado.";
    }
    ?>
    <a href="../../index.php"><img src="../../img/casa.png" alt="" class="casa"></a>
    <script src="../../js/script.js"></script>
</body>
</html>




