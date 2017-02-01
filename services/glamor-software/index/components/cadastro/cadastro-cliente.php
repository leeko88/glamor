<?php
require_once('../comuns/session.php');
require_once('../../../php/controllers/clienteController.php');


?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
<meta charset="utf-8">
<title>Glamor Software - Cadastro de clientes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Cadastrar clientes para serem utilizados para pesquisas e vendas">
<meta name="author" content="Infor Sistema">

     <!-- Styles e Icons -->
<?php include_once '../comuns/style-icons.html';?>
    <!-- End Sytles e Icons -->

</head>

<body class="sidebar-left ">
<div class="page-container">
    
    <!-- Header Containner -->
<?php include_once '../comuns/header-container.html';?>
    <!-- // END header-container -->
    
    <div id="main-container">

<!-- Saidebar MAIN -->
<?php include_once '../comuns/sidebar-main.html';?>
     <!-- // END sidebar -->
        
        <div id="main-content" class="main-content container-fluid">
            <div style="text-align:center;" class="row-fluid page-head">
                <h2 class="page-title"><i class="aweso-icon-list-alt"></i> Clientes</h2>
                <div class="page-bar">
                    <div class="btn-toolbar">
                        <ul class="nav nav-tabs pull-left">
                            <li class="active" id="user-tab"> <a href="#TabTop1" data-toggle="tab">Cadastro de cliente</a></li>
                            <li id="articles-tab"> <a href="#TabTop2" data-toggle="tab">Listar Clientes</a> </li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // page head -->
            
            <div id="page-content" class="page-content tab-content overflow-y">
                <div id="TabTop1" class="tab-pane padding-bottom30 active fade in">
                    <div class="page-header">
                        <h3><i class="aweso-icon-list-alt opaci35"></i> Formulario <small>Clientes</small></h3>
                    </div>
                    <div class="row-fluid">
                        <div class="span8 grider">
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-user"></i>Novo usuario</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">

                                        <!-- INICIO DO FORM CADASTRO CLIENTE-->
                                        <?php if(isset($_GET['resultado'])){ 
                                        echo "<div class='alert ".$_GET['resultado']."'>".$_GET['menssagem']."<button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            </div>";
                                            }elseif(isset($_GET['removesucess'])){
                                                if($_GET['removesucess'] == 'yes'){
                                                echo "<div class='alert alert-success'><strong style='color: green'>Sucesso!</strong> Cliente removido<button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                                </div>";
                                            }else{
                                                echo "<div class='alert alert-error'><strong style='color: red'>Erro!</strong> Não foi possivel remover<button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                                </div>";
                                            }
                                        }
                                        ?>   

                                        <form id="accounForm" class="form-horizontal" method="post" action="../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.php" >
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <ul class="form-list label-left list-bordered dotted">
                                                            <li class="section-form">
                                                                <h4>Dados pessoais</h4>
                                                            </li>
                                                            
                                                            <!-- // section form divider -->
                                                            <li class="control-group">
                                                                <label for="accountFirstName" class="control-label">Nome completo <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="accountFirstName" class="span11" type="text" name="accountFirstName" value="">
                                                                </div>
                                                            </li>

                                                            <!-- // form item -->
                                                            <!--genero -->
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountDob" class="control-label">Data de nascimento <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="accountDob" class="span6" type="text" name="accountDob" locate="pt-BR" value="" placeholder="00-00-0000">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="section-form">
                                                                <h4>Informação do contato</h4>
                                                            </li>
                                                            <!-- // section form divider -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountEmail" class="control-label">Email <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <div class="input-append block">
                                                                        <input id="accountEmail" class="span6" type="text" name="accountEmail" value="">
                                                                </div>
                                                            </li>

                                                            <li class="control-group">
                                                                <label for="accountSenha" class="control-label">Senha <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <div class="input-append block">
                                                                        <input id="accountSenha" class="span6" type="password" name="accountSenha" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountPhoneNumber" class="control-label">Celular <span class="required">*</span></label>
                                                                <div class="controls controls-row">
                                                                    <input id="accountPhoneNumber" class="span6 maskPhone margin-right5" type="text" name="accountPhoneNumber" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountFaxNumber" class="control-label">Fixo</label>
                                                                <div class="controls controls-row">
                                                                    <input id="accountFaxNumber" class="span6 maskPhoneFixo margin-right5" type="text" name="accountFaxNumber" value="">
                                                            </li>
                                                            <!-- // form item -->
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button id="btn-cadCli" class="btn btn-blue">Enviar & Validar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column -->
                        
                    </div>
                    <!-- // Example row --> 
                </div>
                <!-- // Example TAB 1 -->
                
                <div id="TabTop2" class="tab-pane fade padding-bottom30">
                   <div class='page-header'>                      
                        <h3><i class='aweso-icon-table opaci35'></i> Listagem <small>Clientes</small></h3>
                    </div>
                    <div class="row-fluid">
                        <div class="span8 grider">
                            <div class="widget well well-nice">
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="itemForm" class="span12 form-horizontal" method="" action="" >
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <?php 
                                                        listarUsuario();
                                                        ?>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span4 grider">
                            
                            <!-- // Widget -->
                            
                           
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                    <!-- // Example row --> 
                </div>
                <!-- // Example TAB 2 -->
                
                <!-- // Example TAB 3 --> 
                
            </div>
            <!-- // page content --> 
            
        </div>
        <!-- // main-content --> 
        
    </div>
    <!-- // main-container  -->
    
   <!-- footer -->
<?php include_once '../comuns/footer.html';?>
    <!-- // END footer-fix  --> 
    
</div>
<!-- // page-container  --> 

<!-- javascripts comuns --> 
<?php include_once '../comuns/javascript.html';?>
<!-- End javascript comuns -->

<!-- javascript da pagina -->
<script src="../../../../../js/bootstrap/bootstrap-wysihtml5/wysihtml5.js"></script>
<script src="../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.js"></script>
<!-- end javascript -->

<!-- retira o active dos menus e adiciona nele -->
<script>
$(function($) {	    
    $('#cadastro').addClass('active');
    $('#notificacao').removeClass('active');
});
</script>

</body>
</html> 
