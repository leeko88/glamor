<?php
session_start();

//REMOVER CLIENTES
if(isset($_GET['removeID'])){
require_once('../connection/connection.php');
    try {
    $conn = conexaoComBancoDeDados($_SESSION['user_bd']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM user_client WHERE id='".$_GET['removeID']."'";
    if($conn->exec($sql)){
    $conn = null;
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=yes");
    }else{
    $conn = null;
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=no");
    }
}
catch(PDOException $e)
    {
    $conn = null;
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=no");
    }
    
            
}//END REMOVER CLIENTES

//EDITAR CLIENTES
function editarCliente($id){
    try {
    $conn = conexaoComBancoDeDados($_SESSION['user_bd']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM user_client WHERE id=$id";
    if($conn->exec($sql)){
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=yes");
    }else{
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=no");
    }
}
catch(PDOException $e)
    {
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=no");
    }
}


//LISTAR CLIENTES
function listarUsuario(){
    try{
    $PDO = conexaoComBancoDeDados($_SESSION['user_bd']);
         
    $sql = "SELECT * , DATE_FORMAT(nascimento,'%d/%m/%Y') as aniversario FROM user_client";
    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo   "<section style='margin-left:-13px;'>                    
                        <div class='row-fluid'>
                            <div class='span12'>
                                <div class='widget widget-simple widget-table'>
                                    <table id='exampleDTB-1' class='table boo-table table-striped table-content table-hover'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>ID <span class='column-sorter'></span></th>
                                                <th scope='col'>Nome <span class='column-sorter'></span></th>
                                                <th scope='col'>Celular <span class='column-sorter'></span></th>
                                                <th scope='col'>Email <span class='column-sorter'></span></th>
                                                <th scope='col'>Data de Nasc. <span class='column-sorter'></span></th>
                                                <th scope='col'>Opção <span class='column-sorter'></span></th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                        foreach ($users as $usuario) {
                                            $usuarioID = $usuario['id'];
                                            $nome = $usuario['nome'];
                                            $nascimento = $usuario['aniversario'];
                                            $celular = $usuario['celular'];
                                            $telefone = $usuario['telefone'];
                                            $email = $usuario['email'];
                                            $password = $usuario['password'];
                                                echo "
                                                        <tr>
                                                            <td>".$usuarioID."</td>
                                                            <td>".$nome."</td>
                                                            <td>".$celular."</td>
                                                            <td>".$email."</td>
                                                            <td>".$nascimento."</td>
                                                            <td style='text-align:center;'>
                                                            <a href='../../components/cadastro/editarCadastro.php?tipo=cliente&id=$usuarioID&nome=$nome&nascimento=$nascimento&celular=$celular&telefone=$telefone&email=$email&password=$password'>
                                                            <li style='width:4%;' class='btn btn-blue'>
                                                            <i style='margin-left:-4px;' class='aweso-icon-edit'></i></li></a>                                                            
                                                            <li style='width:4%;' id='".$usuarioID."'
                                                             data-type='confirm' data-layout='center' class='btn btn-red runner clienteRemove'>X</li>                                                            
                                                            </td>                                                        
                                                        </tr>";
                                        }
    echo                           "</tbody>
                                    </table>
                                    <!-- // DATATABLE - DTB-1 -->
                                    
                                </div>
                                <!-- // Widget -->
                                
                            </div>
                            <!-- // Column -->
                            
                        </div>
                        <!-- // Example row -->
                        
                    </section>";

    $PDO = null;

}catch(PDOException $ex){
    $PDO = null;
}
}//END LISTAR CLIENTES

?>

<!-- <li id="articles-tab"> <a href="#TabTop2" data-toggle="tab">Listar Clientes</a> </li>                            
href='../../php/controllers/clienteController.php?edit=$usuarioID' -->