<?php
session_start();
session_destroy();
header("location:vistaNoAdmin.php");
exit();