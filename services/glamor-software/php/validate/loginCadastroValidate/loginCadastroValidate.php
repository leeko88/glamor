<?php

include_once '../../connection/connection.php';

//Recebe o codigoEmpresa que é o Banco de dados da empresa.
function verificarCodEmpresa($codEmpresa){
  try{
    //testa se o banco de dados existe.
    $connection = conexaoComBancoDeDados($codEmpresa);
    $connection = null;
    return true; //(Empresa existe)
    }catch(PDOException $ex){
    $connection = null;
    return false; //(empresa não existe)
    }
}

//testa se o email já existe.
function verificarEmail($email, $bancoDeDados){
  try{
    $PDO = conexaoComBancoDeDados($bancoDeDados);
   
    $sql = "SELECT email FROM user_client WHERE email = :email";

    $stmt = $PDO->prepare($sql);
    
    $stmt->bindParam(':email', $email);
    
    $stmt->execute();
    
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($emails) <= 0)
    {
      $PDO = null;
      return true; //Email nao cadastrado(Email aceito)
    }else{
      $PDO = null;
      return false; //Já existe email cadastrado
    }
    }catch(PDOException $ex){
      $PDO = null;
      return false; //Já existe email cadastrado
    }
}


//quando o form passar pelas validações
if( $_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    extract($_POST);
    $bancoDeDados = 'glamor_emp_'.$codEmpresa;
    $conn = conexaoComBancoDeDados($bancoDeDados);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Se a empresa não existir
    if(!verificarCodEmpresa($bancoDeDados)){
      echo false;
      $conn = null;
      exit;
    }

    //Se o email não existir
    if(!verificarEmail($email, $bancoDeDados)){
      echo false;
      $conn = null;
      exit;
    }

    // preparar sql and parameters
    $sql = $conn->prepare("INSERT INTO user_client 
    VALUES (null, :nome, str_to_date(:nascimento, '%d/%m/%Y'), :celular, :telefone, :email, :password)");
        
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':nascimento', $nascimento);
    $sql->bindParam(':celular', $celular);
    if(isset($telefone)){
      $sql->bindParam(':telefone', $telefone);
    }else{
      $sql->bindParam(':telefone', null);
    }
    $sql->bindParam(':email', $email);
    $sql->bindParam(':password', $password);
    
    $sql->execute();

    echo true;
    }
catch(PDOException $e)
    {
    echo false;
    }
    $conn = null;
}

?>
