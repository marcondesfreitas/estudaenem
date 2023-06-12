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

                  echo '<div onclick="aparecer1()" id="ftt"><img class="ftperfil" src="./img/hamburguer.png" /></div>
                  ';
                  echo '<fieldset id="perfil">  
                      <div class="mudar">
                        <a href="./paginas/html/login.php" class="link">mudar de conta</a>
                        <a href="./paginas/html/logout.php" class="deslogar"><img id="img-logout" src="./img/logout.png" width="100%" ></a>
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

                  echo '<div onclick="aparecer1()" id="ftt"><img class="ftperfil" src="./img/hamburguer.png" /></div>
                  ';
                  echo '<fieldset id="perfil">
                      <div class="mudar">
                        <hr class="linha1">
                        <hr class="linha11">
                        <h3>Opções da conta</h3>
                        <div  id="ftt1"><img class="ftperfil1" src="data:image/jpg;base64, ' . base64_encode($imagem) . '" /></div>
                        <a href="./paginas/html/login.php" id="link_conta">mudar de conta</a><br>
                        <a href="./paginas/html/logout.php" class="deslogar"><img id="img-logout" legend="Deslogar" src="./img/logout.png" width="30%" ></a>
                        <hr class="linha2">
                        <a href="./paginas/html/login.php" id="link">HISTORIA</a><br>
                        <a href="./paginas/paginas_menu/paginas/geografia.php" id="link">GEOGRAFIA</a><br>
                        <a href="./paginas/html/login.php" id="link"class="socio">SOCIOLOGIA</a><br>
                        <a href="./paginas/html/login.php" id="link">FILOSOFIA</a><br>
                        <a href="./paginas/html/login.php" id="link">QUIMICA</a><br>
                        <a href="./paginas/html/login.php" id="link">FISICA</a><br>
                        <a href="./paginas/html/login.php" id="link">BIOLOGIA</a><br>
                        <a href="./paginas/html/login.php" id="link">PORTUGUES</a><br>
                        <a href="./paginas/html/login.php" id="link">ESPANHOL</a><br>
                        <a href="./paginas/html/login.php" id="link">INGLES</a><br>
                        <a href="./paginas/html/login.php" id="link">ED.FISICXA</a><br>
                        <a href="./paginas/html/login.php" id="link">ARTE</a><br>
                        <a href="./paginas/html/login.php" id="link">ALGEBRA</a><br>
                        <a href="./paginas/html/login.php" id="link">GEOMETRIA</a><br>
                        
                        <hr class="linha3">
                        <h3 class="h3">REDAÇÃO</h3>
                        <a href="./paginas/html/login.php" id="link">REDAÇÃO</a><br>
                        <a href="./paginas/html/login.php" id="link">TEMA REDAÇÃO</a><br>
                        <hr class="linha4">

                      </div>
                    </fieldset>';
                    echo "
                    <div class='tudo'>
                      <button onclick='mostraMenu2()' id='btn_adicionar'><img src='./img/add.svg' id='img_adicionar'></button></a>
                      <a href='./paginas/html/exibir_registros.php'><button id='contas_btn'><img src='./img/contas.png' id='contas_img'></button></a>
                      <fieldset id='meuMenu'>
                          <h2>ADICIONE O CONTEUDO</h2><br>
                          <div class='formulario'>
                            <form action='./paginas/html/adicionar_post.php' enctype='multipart/form-data' method='POST'>
                              <input type='text' name='subtitulo' id='subtitulo' class='input_subtitulo' placeholder='titulo' >
                              <textarea name='conteudo' id='conteudo' class='input_conteudo' placeholder='conteudo'></textarea><br><br>
                              <input type='hidden' name='MAX_FILE_SIZE' value='99999999'><br>
                              <label for='arquivo'><img src='./img/adicionar-botao.png' class='add'></label>
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
    <link rel="stylesheet" href="./css/style.css">
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
          <a href="#" ><img id="casa" src="./img/logo_sem.png" alt=""></a>
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
      <nav class="dp-menu">
        <ul class="ul1">
          <li><a id="conteudo" href="" class="humanas">Humanas</a>
            <ul>
              <li><a id="dp-c" href="./paginas/paginas_menu/paginas/historia.php">História</a></li>
              <li><a id="dp-c" href="./paginas/paginas_menu/paginas/geografia.php">Geografia</a></li>
              <li><a id="dp-c" href="./paginas/paginas_menu/paginas/filosofia.php">Filosofia</a></li>
              <li><a id="dp-c" href="./paginas/paginas_menu/paginas/sociologia.php">Sociologia</a></li>
            </ul>
          <li><a id="conteudo" href="" class="natureza">Natureza</a>
            <ul>
              <li><a id="dp-c" href="paginas_menu/htmls/quimica.php">Quimica</a></li>
              <li><a id="dp-c" href="paginas_menu/htmls/fisica.php">Fisica</a></li>
              <li><a id="dp-c" href="paginas_menu/htmls/biologia.php">Biologia</a></li>
            </ul>
          <li><a id="conteudo" href="" class="linguagens">Linguagens</a>
            <ul>
              <li><a id="dp-c" href="paginas_menu/htmls/EDfisica.php">ED.Fisica</a></li>
              <li><a id="dp-c" href="paginas_menu/htmls/portugues.php">Português</a></li>
              <li><a id="dp-c" href="paginas_menu/htmls/artes.php">Artes</a></li>
              <li><a id="dp-c" href="paginas_menu/htmls/ingles.php">Ingles</a>
              <li><a id="dp-c" href="paginas_menu/htmls/espanhol.php">Espanhol</a>
              </li>
            </ul>
            <li><a id="conteudo" href="" class="linguagens">Matemática</a>
            <ul>
              <li><a id="dp-c" href="paginas_menu/htmls/ingles.php">Algebra</a>
              <li><a id="dp-c" href="paginas_menu/htmls/espanhol.php">Geometria</a>
              </li>
            </ul>
          <li><a id="conteudo" href="https://ead.ucs.br/blog/temas-de-redacao-para-enem" class="temas">Tema de redações</a></li>
          <li><a id="conteudo" href="https://guiadoestudante.abril.com.br/enem/prepare-se-para-o-enem-refazendo-provas-anteriores/" class="redacoes">Redações</a></li>
          </li>
        </ul>
      </nav>
    <?php include 'paginas/html/lista_posts.php'; ?>
    <script src="./js/script.js"></script>
  </body>
  <footer>
      <h4>ESTUDAENEM</h4>
  </footer>
  </html>