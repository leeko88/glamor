<?php
    session_start();
    include_once '../../connection/connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verificando se os dados requeridos foram passados
    if(isset($_POST['accountEmpresaName']) &&
    isset($_POST['accountEndereco']) &&
    isset($_POST['accountCNPJ']) &&
    isset($_POST['accountEmail']) &&
    isset($_POST['accountContato']) &&
    isset($_POST['accountFaxNumber'])){
        
        $resultadoDaValidacao = true;

            //Validando telefone celular
        if(strlen($_POST['accountFaxNumber']).trim() <= 0){//verificar se ta no tamanho certo
            $resultadoDaValidacao = false;
            $menssagem .= 'Verifique o campo celuar ou fixo<br>';
        }elseif(strlen($_POST['accountEmpresaName']) < 10 && strlen($_POST['accountEmpresaName']) > 45){//validando Nome
            $resultadoDaValidacao = false;
            $menssagem .= 'Nome invalido<br>';
        }elseif(strlen($_POST['accountEndereco']) < 10){//validando Data NIver
            $resultadoDaValidacao = false;
            $menssagem .= 'Endereço muito pequeno<br>';
        }elseif(strlen($_POST['accountContato']) > 45 ){// Validando senha
            $resultadoDaValidacao = false;
            $menssagem .= 'Verifique a campo contato<br>';
        }elseif(strlen($_POST['accountCNPJ']) <= 0 ){
            $menssagem .= 'Verifique o campo CNPJ';
        }elseif(strlen($_POST['accountEmail']) <= 0 ){
            $menssagem .= 'Verifique o campo Email';
        }
        cadastrarFornecedor($resultadoDaValidacao);
    }else{
        $resultadoDaValidacao = false;
        $menssagem .= 'Nem todos os campos recebido';
    }
}

function cadastrarFornecedor($resultadoDaValidacao){
    if($resultadoDaValidacao){
        try {            
            $bancoDeDados = $_SESSION['user_bd'];
            
            $conn = conexaoComBancoDeDados($bancoDeDados);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // preparar sql and parameters
            if(isset($_GET['editar'])){
                $id = $_GET['editar'];
                $sql = $conn->prepare("UPDATE user_fornecedor SET 
                nome = :nome, endereco = :endereco, cnpj = :cnpj, email = :email, telefone = :telefone, contato = :contato 
                WHERE id = $id");
            }else{
                //Se o email não existir pode cadastrar.
                    if(!verificarEmail($_POST['accountEmail'], $bancoDeDados)){
                        $menssagem .= "Email já cadastrado";
                        header("Location: ../../../index/components/cadastro/cadastro-fornecedor.php?resultado=alert-error&menssagem=$menssagem");
                        $conn = null;
                        exit;
                    }
                $sql = $conn->prepare("INSERT INTO user_fornecedor 
                VALUES (null, nome = :nome, endereco = :endereco, cnpj = :cnpj, email = :email, telefone = :telefone, contato = :contato)");
            }

            $sql->bindParam(':nome', $_POST['accountEmpresaName']);
            $sql->bindParam(':endereco', $_POST['accountEndereco']);
            $sql->bindParam(':cnpj', $_POST['accountCNPJ']);
            $sql->bindParam(':email', $_POST['accountEmail']);
            $sql->bindParam(':contato', $_POST['accountContato']);
            $sql->bindParam(':telefone',  $_POST['accountFaxNumber']);

            $sql->execute();

            $menssagem .= 'Efetuado com sucesso!';
            header("Location: ../../../index/components/cadastro/cadastro-fornecedor.php?resultado=alert-success&menssagem=$menssagem");

            }
        catch(PDOException $e)
            {
            $menssagem .= 'Erro ao gravar no banco de dados';
            header("Location: ../../../index/components/cadastro/cadastro-fornecedor.php?resultado=alert-error&menssagem=$menssagem");
            }
            $conn = null;
    }else{
            $menssagem .= 'Erro ao efetuar o cadastro!<br>Verifique os campos';
            header("Location: ../../../index/components/cadastro/cadastro-fornecedor.php?resultado=alert-error&menssagem=$menssagem");
        }
}

function verificarEmail($email, $bancoDeDados){
  try{
    $PDO = conexaoComBancoDeDados($bancoDeDados);
   
    $sql = "SELECT email FROM user_fornecedor WHERE email = :email";

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