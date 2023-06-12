<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "estudaenem";
  $conn = mysqli_connect($host, $user, $password, $database);

  session_start();

  if (isset($_POST['email']) && isset($_POST['senha'])) {
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['senha'] = $_POST['senha'];
  } else {
      if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
          $_SESSION['email'] = $_SESSION['email'];
          $_SESSION['senha'] = $_SESSION['senha'];
      } else {
          $_SESSION['email'] = null;
          $_SESSION['senha'] = null;
      }
  }

  if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
      $email = $_SESSION['email'];
      $senha = $_SESSION['senha'];

      $sql = "SELECT * FROM conta1 WHERE email='$email' AND senha='$senha'";
      $result = mysqli_query($conn, $sql);
      $rowimg = mysqli_fetch_assoc($result);

      $sql2 = "SELECT * FROM conta2 WHERE email='$email' AND senha='$senha'";
      $result2 = mysqli_query($conn, $sql2);
      $row = mysqli_fetch_assoc($result2);

      if (mysqli_num_rows($result) > 0) {
          $sql = "SELECT * FROM conta1 WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
              die('Erro na consulta SQL: ' . mysqli_error($conn));
          }

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $imagem = $row["imagem"];

                  echo '<div onclick="aparecer1()" id="ftt"><img class="ftperfil" src="data:image/jpg;base64, ' . base64_encode($imagem) . '" /></div>
                  ';
                  echo '<fieldset id="perfil">  
                      <div class="mudar">
                        <a href="./paginas/html/login.php" class="link">mudar de conta</a>
                        <a href="./paginas/html/logout.php" class="deslogar"><img id="img-logout" src="../../../img/logout.png" width="100%" ></a>
                      </div>
                    </fieldset>';
              }
          }

          $_SESSION['teste'] = mysqli_num_rows($result);
      } else if (mysqli_num_rows($result2) > 0) {
          $_SESSION['email'] = $_SESSION['email'];
          $_SESSION['senha'] = $_SESSION['senha'];
          $_SESSION['teste2'] = mysqli_num_rows($result2);

          $sql = "SELECT * FROM conta2 WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
              die('Erro na consulta SQL: ' . mysqli_error($conn));
          }

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $imagem = $row["imagem"];

                  echo '<div id="ftt" onclick="aparecer1()"><img class="ftperfil" id="ftt2" src="data:image/jpg;base64, ' . base64_encode($imagem) . '" /></div>
                  ';
                  echo '<fieldset id="perfil">
                      <div class="mudar">
                        <hr class="linha2">
                        <h3>Opções da conta</h3>
                        <a href="./paginas/html/login.php" id="link">mudar de conta</a><br>
                        <a href="./paginas/html/logout.php" class="deslogar"><img id="img-logout" legend="Deslogar" src="../../../img/logout.png" width="30%" ></a>
                        <hr class="linha2">
                      </div>
                    </fieldset>';
                    echo "
                    <div class='tudo'>
                      <button onclick='mostraMenu2()' id='btn_adicionar'><img src='../../../img/add.svg' id='img_adicionar'></button></a>
                      <a href='./paginas/html/exibir_registros.php'><button id='contas_btn'><img src='../../../img/contas.png' id='contas_img'></button></a>
                      <fieldset id='meuMenu'>
                          <h2>ADICIONE O CONTEUDO</h2><br>
                          <div class='formulario'>
                            <form action='../adicionar/add_geografia.php' enctype='multipart/form-data' method='POST'>
                              <input type='text' name='titulo' id='titulo' class='input_titulo' maxlength='4' placeholder='ano'><br><br>
                              <input type='text' name='subtitulo' id='subtitulo' class='input_subtitulo' placeholder='titulo' >
                              <textarea name='conteudo' id='conteudo' class='input_conteudo' placeholder='conteudo'></textarea><br><br>
                              <input type='hidden' name='MAX_FILE_SIZE' value='99999999'><br>
                              <label for='arquivo'><img src='../../../img/adicionar-botao.png' class='add'></label>
                              <p class='texto'>Adicionar Imagem</p>
                              <input type='file' name='imagem' id='arquivo'><br>
                              <input type='submit' value='ADICIONAR' class='btn'><br><br>
                            </form>
                          </div>
                      </fieldset>
                    </div>";

              }
          }
          
      } else {
          session_destroy();
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          echo "<div class='btn_login'>
            <a href='./paginas/html/login.php' class='lgg'>login</a>
          </div>";
      }
  } else {
      session_destroy();
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      echo "<div class='btn_login'>
            <a href='./paginas/html/login.php' class='lgg'>login</a>
          </div>";
  }

  mysqli_close($conn);
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>EstudaEnem</title>
    <link rel="stylesheet" href="../css/paginas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <header id="header">
      <div class="container.logo" id="menuzinho">
        <div class="logo.txr">
          <a href="../../../index.php" ><img id="casa" src="../../../img/casa.png" alt=""></a>
        </div>
      </div>
      <div class="slrmane">
        <h6>Aqui você verá os conteúdos que já cairam no Enem!</h6>
      </div>
      <div class="menu">
        <ul>
          <!-- aqui onde fica o add -->
        </ul>
      </div>
    </header>
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
          $sql = "SELECT * FROM geografia";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            die('Erro na consulta SQL: ' . mysqli_error($conn));
          }

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              // Exibir a imagem
              $sql = mysqli_query($conn, "SELECT imagem FROM geografia");
              if (!$sql) {
                die('Erro na consulta SQL: ' . mysqli_error($conn));
              }
              $imagem = $row["imagem"];

              echo "<form action='../editar_pg/edt_geografia.php' method='post' style='display:inline;'>"; // Adicionar o formulário de edição
              echo "<input type='hidden' name='id' value='" . $row["id"] . "'>"; // Enviar o ID do post como um campo oculto
              echo "<input type='submit' value='Editar' class='editarcont'>";
              echo "</form>";
              echo "<form action='' method='post' style='display:inline;'>"; // Adicionar o formulário de exclusão
              echo "<input type='hidden' name='id' value='" . $row["id"] . "'>"; // Enviar o ID do post como um campo oculto
              echo "<button class='apagarcont' type='submit' name='apagar' onclick='apagar()' >Apagar</button>";
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

        $sql = "SELECT * FROM geografia";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          die('Erro na consulta SQL: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            // Exibir a imagem
            $sql = mysqli_query($conn, "SELECT imagem FROM geografia");
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

      if (isset($_POST['apagar'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "estudaenem";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
          die("Falha na conexão: " . mysqli_connect_error());
        }

        // Verificar se o ID do post foi recebido
        if(isset($_POST['id'])) {
          $id = $_POST['id'];

          // Executar a exclusão do post no banco de dados
          $sql = "DELETE FROM geografia WHERE id = $id";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            echo "<script>
              alert('post apagado com sucesso, recarregue a pagina para realizar as alterações');
            </script>";
          } else {
            echo "Erro ao excluir o post: " . mysqli_error($conn);
          }
        }

        mysqli_close($conn);
      }
    ?>
    <script src="../../../js/script.js"></script>
    <script src="../../../js/teste.js"></script>
  </body>
  <footer>
      <h4>ESTUDAENEM</h4>
  </footer>
  </html>