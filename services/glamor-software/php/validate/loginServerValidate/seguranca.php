<?php
session_start();
require_once("../../connection/connection.php");

//Valida o usuario e senha digitados
function validaUsuario($nome, $senha, $dBDados, $tabela, $tipo){
//solicita a conexao com o banco de dados do connection.php
//atraves do seu metodo conexaoComBancoDeDados()
$PDO = conexaoComBancoDeDados($dBDados);
 
if($tipo == 'empresa'){
$sql = "SELECT id, nome, emp_fantasia FROM $tabela WHERE id = :id AND senha = :senha LIMIT 1";
}else{
$sql = "SELECT id, nome FROM $tabela WHERE email = :id AND password = :senha LIMIT 1";
}

$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':id', $nome);
$stmt->bindParam(':senha', $senha);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    $PDO = NULL;
    return false;
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nome'];
$_SESSION['user_emp'] = $user['emp_fantasia'];

$PDO = NULL;
return true;

}