<?php
//Listar clientes


//Valida o usuario e senha digitados
function listarUsuario(){
//solicita a conexao com o banco de dados do connection.php
//atraves do seu metodo conexaoComBancoDeDados()
$PDO = conexaoComBancoDeDados($_SESSION['user_bd']);

$sql = "SELECT * FROM user_client";
$stmt = $PDO->prepare($sql);

$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo 'Sem usuarios'; //Sem usuario
    exit;
}
 
 echo  "<section>
                    <div class='page-header'>
                        <h3><i class='aweso-icon-table opaci35'></i> Injekt Toolbar <small>.btn-toolbar</small></h3>
                        <p>base toolbar injekt in header, full pagination</p>
                    </div>
                    <div class='row-fluid'>
                        <div class='span12'>
                            <div class='widget widget-simple widget-table'>
                                <table id='exampleDTB-1' class='table boo-table table-striped table-content table-hover'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>ID <span class='column-sorter'></span></th>
                                            <th scope='col'>Name <span class='column-sorter'></span></th>
                                            <th scope='col'>City <span class='column-sorter'></span></th>
                                            <th scope='col'>Email <span class='column-sorter'></span></th>
                                            <th scope='col'>Date of birth <span class='column-sorter'></span></th>
                                        </tr>
                                    </thead>";
                                    

foreach ($users as $usuarios) {
   echo       "                      <tbody>
                                            <td>".$usuarios['id']."</td>
                                            <td>".$usuarios['nome']."</td>
                                            <td>".$usuarios['nascimento']."</td>
                                            <td>".$usuarios['celular']."</td>
                                            <td>".$usuarios['email']."</td>
                                        </tr>
                                    </tbody>";                           
}

echo "  </table>
                                <!-- // DATATABLE - DTB-1 -->
                                
                            </div>
                            <!-- // Widget -->
                            
                        </div>
                        <!-- // Column -->
                        
                    </div>
                     
                </section>";

$PDO = NULL;
}
?>
