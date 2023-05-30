<?php // Iniciar a sessão

// Verificar se o login foi feito por um administrador
if (isset($_SESSION['email'])) {
  $adminEmail = $_SESSION['email'];

  // Conexão com o banco de dados (substitua os valores pelos seus próprios)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "estudaenem";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
  }

  // Verificar se o usuário é um administrador
  $query = "SELECT * FROM conta2 WHERE email = '$adminEmail'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die('Erro na consulta SQL: ' . mysqli_error($conn));
  }

  if (mysqli_num_rows($result) > 0) {
    // Usuário é um administrador, exibir os posts com os botões de editar e apagar
    $sql = "SELECT * FROM pg_index1";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        // Exibir a imagem
        $sql = mysqli_query($conn, "SELECT imagem FROM pg_index1");
        if (!$sql) {
          die('Erro na consulta SQL: ' . mysqli_error($conn));
        }
        $imagem = $row["imagem"];

        echo "<form action='./paginas/html/editar_conteudo.php' method='post' style='display:inline;'>"; // Adicionar o formulário de edição
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>"; // Enviar o ID do post como um campo oculto
        echo "<input type='submit' value='Editar' class='editarcont'>";
        echo "</form>";
        echo "<form action='./paginas/html/apagar_conteudos.php' method='post' style='display:inline;'>"; // Adicionar o formulário de exclusão
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>"; // Enviar o ID do post como um campo oculto
        echo "<button class='apagarcont' type='submit'>Apagar</button>";
        echo "</form>";
        echo "<h1>" . $row["titulo"] . "  -  " . $row["subtitulo"] . ":</h1>";
        echo "<div class='slrboy'>" . $row["conteudo"] . "</div>";
        echo '<img class="imagem_conteudo" src="data:image/jpg;base64, '. base64_encode($imagem) . '" />'; 
        echo "<hr class='linhaa'>";
      }
    } else {
      echo 'Não há posts a serem exibidos.';
    }
  } else {
    // Exibir todos os posts sem os botões de editar e apagar
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "estudaenem";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM pg_index1";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    die('Erro na consulta SQL: ' . mysqli_error($conn));
  }

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      // Exibir a imagem
      $sql = mysqli_query($conn, "SELECT imagem FROM pg_index1");
      if (!$sql) {
        die('Erro na consulta SQL: ' . mysqli_error($conn));
      }
      $imagem = $row["imagem"];

      echo "<h1>" . $row["titulo"] . "  -  " . $row["subtitulo"] . ":</h1>";
      echo "<div class='slrboy'>" . $row["conteudo"] . "</div>";
      echo '<img class="imagem_conteudo" src="data:image/jpg;base64, '. base64_encode($imagem) . '" />'; 
      echo "<hr class='linhaa'>";
    }
  } else {
    echo 'Não há posts a serem exibidos.';
  }

  mysqli_close($conn); // fechar a conexão com o banco de dados
  }

}
?>