<?php

include_once '../../connection/connection.php';

//Recebe o codigoEmpresa que é o Banco de dados da empresa.
if(isset($_REQUEST['codigoEmpresa'])){
    //testa se o banco de dados existe.
    try{
    $connection = conexaoComBancoDeDados($_REQUEST['codigoEmpresa']);
    $connection = null;
    echo true;
    }catch(PDOException $ex){
    echo false;
    }
}

//quando o form passar pelas validações
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    extract($_POST);
    //Se for modo cliente
    if(isset($_POST['idEmpresa'])){
      //falta fazer..
    }else{//se for modo Empresa
    $conn = conexaoComBancoDeDados('client_emp_glamor');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparar sql and parameters
    $sql = $conn->prepare("SELECT 'id', 'nome' FROM user_emp_client
    WHERE 'id' = :loginId AND 'senha' = ':senha' LIMIT 1");

    $sql->bindParam(':loginId', $loginId);
    $sql->bindParam(':senha', $senha);
    
    $sql->execute();

    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
 
    if (count($users) <= 0)
    {
        $PDO = NULL;
        echo false;
        exit;
    }

    echo true;
      }
    }
  catch(PDOException $e){
    $conn = null;
    echo false;
    }
  $conn = null;
}

?>
