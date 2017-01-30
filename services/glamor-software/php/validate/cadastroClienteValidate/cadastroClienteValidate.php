<?php
    session_start();
    include_once '../../connection/connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verificando se os dados requeridos foram passados
    if(isset($_POST['accountFirstName']) &&
    isset($_POST['accountDob']) &&
    isset($_POST['accountEmail']) &&
    isset($_POST['accountPassword']) &&
    isset($_POST['accountPhoneNumber'])){
        $resultadoDaValidacao = true;
            //Validando telefone celular
        if(strlen(str_replace('_', '', $_POST['accountPhoneNumber']).trim()) < 16){//verificar se ta no formato e tamanho certo.
            $resultadoDaValidacao = false;
            echo 'Formatação do celular errado';
        }elseif(strlen(str_replace('_', '', $_POST['accountFaxNumber'].trim()))>0){//Se o telefone fixo for preenchido
            if(strlen(str_replace('_', '', $_POST['accountFaxNumber'].trim())) < 14){//verificar se ele ta no formato e tamanho certo.
            $resultadoDaValidacao = false;
            echo 'Formatação do telefone fixo Errado';
            }
        }elseif(strlen($_POST['accountFirstName']) < 10 && strlen($_POST['accountFirstName']) > 45){//validando Nome
            $resultadoDaValidacao = false;
            echo 'Tamanho do nome errado';
        }elseif(strlen($_POST['accountDob']) != 10){//validando Data NIver
            $resultadoDaValidacao = false;
            echo 'Formataçao da data errada';
        }elseif(strlen($_POST['accountPassword']) > 45 ){// Validando senha
            $resultadoDaValidacao = false;
            echo 'Tamanho da senha errada';
        }
        cadastrarCliente($resultadoDaValidacao);
    }else{
        $resultadoDaValidacao = false;
        echo 'Nem todos os dados foram recebidos';
    }
}

function cadastrarCliente($resultadoDaValidacao){
    if($resultadoDaValidacao){
        try {
            
            $bancoDeDados = $_SESSION['user_bd'];
            
            $conn = conexaoComBancoDeDados($bancoDeDados);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Se o email não existir pode cadastrar.
            if(!verificarEmail($_POST['accountEmail'], $bancoDeDados)){
            echo false;
            $conn = null;
            exit;
            }

            // preparar sql and parameters
            $sql = $conn->prepare("INSERT INTO user_client 
            VALUES (null, :nome, str_to_date(:nascimento, '%d/%m/%Y'), :celular, :telefone, :email, :password)");

            $sql->bindParam(':nome', $_POST['accountFirstName']);
            echo $_POST['accountFirstName'];
            $sql->bindParam(':nascimento', str_replace('-','/',$_POST['accountDob']));
            echo $_POST['accountDob'];
            $sql->bindParam(':celular', $_POST['accountPhoneNumber']);
            echo $_POST['accountPhoneNumber'];
            if(strlen(str_replace('_', '', $_POST['accountFaxNumber'].trim()))>0){
            $sql->bindParam(':telefone', $_POST['accountFaxNumber']);
            }else{
            $sql->bindParam(':telefone', null);
            }
            $sql->bindParam(':email', $_POST['accountEmail']);
            echo $_POST['accountEmail'];
            $sql->bindParam(':password', $_POST['accountPassword']);
            echo $_POST['accountPassword'];
            
            $sql->execute();

            echo 'Cadastro feito com sucesso!';
            }
        catch(PDOException $e)
            {
            echo 'Erro no cadastro';
            }
            $conn = null;
    }
}

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

?>