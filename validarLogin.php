<?php
if(!isset($_POST["login"])){
    header("Location: " .$_SERVER['HTTP_REFERER']);
    exit();
}else{
    if($_POST["usuario"] == "eric" && $_POST["password"] == "123"){
        session_start();
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["password"] = $_POST["password"];
        header("location:vistaAdmin.php");
        exit();
    } else{
        header("Location: " .$_SERVER['HTTP_REFERER']);
        exit();
    }
}