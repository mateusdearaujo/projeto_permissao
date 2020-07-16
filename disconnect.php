<?php
session_start();

session_unset($_SESSION['logado']);

header("Location: index.php");

?>