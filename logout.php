<?
session_start();
unset($_SESSION['login']);
unset($_SESSION['user']);
header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");

?>