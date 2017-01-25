<?php

include_once '../../connection/connection.php';

//Recebe o codigoEmpresa que é o Banco de dados da empresa.
if(isset($_REQUEST['codigoEmpresa'])){
  try{
    //testa se o banco de dados existe.
    $connection = conexaoComBancoDeDados($_REQUEST['codigoEmpresa']);
    echo false; //não deu erro
    }catch(PDOException $ex){
    echo true; //erro encontrado (empresa não existe)
    }
    $connection = null;
}

//quando o form passar pelas validações
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    extract($_POST);
    if(isset($_POST['idEmpresa'])){

    }else{
    $conn = conexaoComBancoDeDados('client_emp_glamor');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparar sql and parameters
    $sql = $conn->prepare("SELECT 'id', 'nome' FROM user_emp_client
    WHERE 'id' = :loginId AND 'senha' = ':senha'");

    $sql->bindParam(':loginId', $loginId);
    $sql->bindParam(':senha', $senha);
    
    $sql->execute();

    echo true;
      }
    }
  catch(PDOException $e){
    echo false;
    }
$conn = null;
}

?>
