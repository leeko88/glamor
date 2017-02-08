<?php
    session_start();
    include_once '../../connection/connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verificando se os dados requeridos foram passados
    if(isset($_POST['accountFirstName']) &&
    isset($_POST['accountDob']) &&
    isset($_POST['accountEmail']) &&
    isset($_POST['accountSenha']) &&
    isset($_POST['accountPhoneNumber'])){
        
        $resultadoDaValidacao = true;
        $telefoneFixo = $_POST['accountFaxNumber'];

            //Validando telefone celular
        if(strlen(str_replace('_', '', $_POST['accountPhoneNumber']).trim()) < 16){//verificar se ta no formato e tamanho certo.
            $resultadoDaValidacao = false;
            $menssagem .= 'Formato de celular invalido<br>';
        }elseif(strlen($_POST['accountFaxNumber']) == 0){//Se o telefone fixo não for preenchido
            $telefoneFixo = null;
        }elseif(strlen($_POST['accountFirstName']) < 10 && strlen($_POST['accountFirstName']) > 45){//validando Nome
            $resultadoDaValidacao = false;
            $menssagem .= 'Nome invalido<br>';
        }elseif(strlen($_POST['accountDob']) != 10){//validando Data NIver
            $resultadoDaValidacao = false;
            $menssagem .= 'Formato de data invalido<br>';
        }elseif(strlen($_POST['accountSenha']) > 45 ){// Validando senha
            $resultadoDaValidacao = false;
            $menssagem .= 'Verifique a senha<br>';
        }
        cadastrarCliente($resultadoDaValidacao);
    }else{
        $resultadoDaValidacao = false;
        $menssagem .= 'Nem todos os campos recebido';
    }
}

function cadastrarCliente($resultadoDaValidacao){
    if($resultadoDaValidacao){
        try {            
            $bancoDeDados = $_SESSION['user_bd'];
            
            $conn = conexaoComBancoDeDados($bancoDeDados);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          

            // preparar sql and parameters
            if(isset($_GET['editar'])){
                $id = $_GET['editar'];
                $sql = $conn->prepare("UPDATE user_client SET 
                nome = :nome, nascimento = str_to_date(:nascimento, '%d/%m/%Y'), celular = :celular, telefone = :telefone, email = :email, password = :password 
                WHERE id = $id");
            }else{
                //Se o email não existir pode cadastrar.
                 if(!verificarEmail($_POST['accountEmail'], $bancoDeDados)){
                    $menssagem .= "Email já cadastrado";
                    header("Location: ../../../index/components/cadastro/cadastro-cliente.php?resultado=alert-error&menssagem=$menssagem");
                    $conn = null;
                    exit;
                }
                $sql = $conn->prepare("INSERT INTO user_client 
            VALUES (null, :nome, str_to_date(:nascimento, '%d/%m/%Y'), :celular, :telefone, :email, :password)");
            }
            

            $sql->bindParam(':nome', $_POST['accountFirstName']);
            $sql->bindParam(':nascimento', str_replace('-','/',$_POST['accountDob']));
            $sql->bindParam(':celular', $_POST['accountPhoneNumber']);
            $sql->bindParam(':email', $_POST['accountEmail']);
            $sql->bindParam(':password', $_POST['accountSenha']);
            $sql->bindParam(':telefone', $telefoneFixo);
            $sql->execute();

            $menssagem .= 'Efetuado com sucesso!';
            header("Location: ../../../index/components/cadastro/cadastro-cliente.php?resultado=alert-success&menssagem=$menssagem");

            }
        catch(PDOException $e)
            {
            $menssagem .= 'Erro ao gravar no banco de dados';
            header("Location: ../../../index/components/cadastro/cadastro-cliente.php?resultado=alert-error&menssagem=$menssagem");
            }
            $conn = null;
    }else{
        $menssagem .= 'Erro ao efetuar o cadastro!<br>Verifique os campos';
        header("Location: ../../../index/components/cadastro/cadastro-cliente.php?resultado=alert-error&menssagem=$menssagem");
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