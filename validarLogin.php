<?php
if(!isset($_POST["login"])){
    header("location:vistaNoAdmin.php");
    exit();
}else{
    if($_POST["usuario"] == "eric" && $_POST["password"] == "123"){
        session_start();
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["password"] = $_POST["password"];
        header("location:vistaAdmin.php");
        exit();
    } else{
        header("location:vistaNoAdmin.php");
        exit();
    }
}