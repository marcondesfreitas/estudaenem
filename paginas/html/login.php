<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/estudaenem-logo-removebg-preview (1).ico" type="image/x-icon">
    <title>CADASTRAR</title>
</head>
<body>  
    <fieldset class="fild"><br>
        <fieldset class="fild2">
            <!-- <h2>Bem vindo ao nosso site!</h2>
            <h3>Crie sua conta para desfrutar 100% dos nossos recursos</h3> -->
        </fieldset>
            <fieldset class="fild3">
                <img src="../../../estudaenem/img/estudaenem-logo-removebg-preview (1).ico" alt="" height="100px" width="100px" >
                <h1><b>Entre em sua conta</b></h1>
                <p>......................................................................................</p><br>
                <form method="post" action="../../index.php">
                    <input type="email" name="email" class="email" placeholder="E-mail" id="email" required><br><br>
                        <div class="senhaaa">
                            <input type="password" name="senha" class="senha" placeholder="senha" id="senha" required>
                            <button class="bb" id="bbn" type="button"><img src="../../img/viw.png" alt="" class="imgg"></button>
                        </div>
                    <br><br><br><br><br>
                    <input  type="submit" class="btn" value="ENTRAR"><br><br>
                </form>
                <a href="./cadastro.php">Ainda não tem sua conta? Crie a sua aqui.</a>
            </fieldset>
        </fieldset>
        <div class="casa"><a href="../../index.html"><img src="../../img/casa.png" class="casaa" alt=""></a></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="../../js/login.js"></script>
</body>
</html>