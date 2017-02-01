<?php
session_start();

//REMOVER CLIENTES
if(isset($_GET['removeID'])){
require_once('../connection/connection.php');
   try{
    $PDO = conexaoComBancoDeDados($_SESSION['user_bd']);
    echo $_SESSION['user_bd'];

    $sql = "DELETE FROM user_client WHERE id = '".$_GET['removeID']."'";
    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    $PDO = NULL;
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=yes");
    
    }catch(PDOException $e){
    $PDO = NULL;
    header("Location: ../../index/components/cadastro/cadastro-cliente.php?removesucess=no");
    }         
}//END REMOVER CLIENTES

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
                                                echo "
                                                        <tr>
                                                            <td>".$usuarioID."</td>
                                                            <td>".$usuario['nome']."</td>
                                                            <td>".$usuario['celular']."</td>
                                                            <td>".$usuario['email']."</td>
                                                            <td>".$usuario['aniversario']."</td>
                                                            <td style='text-align:center;'>
                                                            <a href=''><i class='aweso-icon-edit'></i></a>&nbsp|&nbsp                                                       
                                                            <a href='../../../php/controllers/clienteController.php?removeID=$usuarioID'><i class='aweso-icon-remove'></i></a>
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

    $PDO = NULL;

}catch(PDOException $ex){
    $PDO = NULL;
}
}//END LISTAR CLIENTES


?>
