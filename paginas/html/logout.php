<?php
    if(!isset($_SESSION)){
        session_start();
    }

    session_destroy();
    echo"<script>alert('deslogado')</script>";
    header("location:/estudaenem/index.php")
?>