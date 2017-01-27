<?php
session_start();
require_once('../../../php/connection/connection.php');
if(!isLoggedIn()){
 header('Location: ../../../login.php'); 
}
if(strlen($_SESSION['user_name']) > 17){
$usuario = substr($_SESSION['user_name'], 0, 17).'...';
}else{ $usuario = $_SESSION['user_name']; }
$empresa = $_SESSION['user_emp'];
$imagem  = "../../../../../images/glamor-software/perfil/emp_id_".$_SESSION['user_id'].".jpg";
$bancoDeDados = 'glamor_emp_'.$_SESSION['user_id'];
?>