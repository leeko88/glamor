<?php
require_once('../comuns/session.php');

if(isset($_GET['tipo'])){//Se receber o tipo

echo "<!DOCTYPE html>

<html lang='pt-BR'>

<head>
<meta charset='utf-8'>
<title>Glamor Software - Edição de Cadastro</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>
<meta name='apple-mobile-web-app-capable' content='yes'>
<meta name='apple-mobile-web-app-status-bar-style' content='black'>
<meta name='description' content='Editar cadastro'>
<meta name='author' content='Infor Sistema'>";

include_once '../comuns/style-icons.html';

echo " </head>

<body class='sidebar-left '>
<div class='page-container'>";
    
include_once '../comuns/header-container.html';
    
echo "<div id='main-container'>";

include_once '../comuns/sidebar-main.html';

 echo "<div id='main-content' class='main-content container-fluid'>
            <div style='text-align:center;' class='row-fluid page-head'>
                <h2 class='page-title'><i class='aweso-icon-list-alt'></i> Clientes</h2>
                <div class='page-bar'>
                    <div class='btn-toolbar'>
                        <ul class='nav nav-tabs pull-left'>
                            <li class='active'> <a href=''>Editar Cliente</a></li>
                              <li> <a href='cadastro-cliente.php'>Cancelar | Voltar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // page head -->
            <div id='page-content' class='page-content tab-content overflow-y'>                
                <div id='TabTop1' class='tab-pane padding-bottom30 active fade in'>
                    <div class='row-fluid'>
                        <div class='span8 grider'>
                            <div class='widget widget-simple'>
                                <div class='widget-content'>
                                    <div class='widget-body'>";

    //Se for edição de cliente
    if($_GET['tipo'] ==  'cliente'){
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $nascimento = $_GET['nascimento'];
        $celular = $_GET['celular'];
        $telefone = $_GET['telefone'];
        $email = $_GET['email'];
        $password = $_GET['password'];
//Monta o layout
echo                 "<div class='page-header'>
                        <h3><i class='aweso-icon-list-alt opaci35'></i> Editar <small>Clientes</small></h3>
                    </div>
                    <div class='row-fluid'>
                        <div class='span8 grider'>
                            <div class='widget widget-simple'>
                                <div class='widget-content'>
                                    <div class='widget-body'>
                                        <form id='accounForm' class='form-horizontal' method='post' action='../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.php?editar=$id' >
                                            <div class='row-fluid'>
                                                <div class='span12 form-dark'>
                                                    <fieldset>
                                                        <ul class='form-list label-left list-bordered dotted'>
                                                            <li class='section-form'>
                                                                <h4>Dados pessoais</h4>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountFirstName' class='control-label'>Nome completo <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <input id='accountFirstName' class='span11' type='text' name='accountFirstName' value='$nome'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountDob' class='control-label'>Data de nascimento <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <input id='accountDob' class='span6' type='text' name='accountDob' locate='pt-BR' value='$nascimento' placeholder='00-00-0000'>
                                                                </div>
                                                            </li>
                                                            <li class='section-form'>
                                                                <h4>Informação do contato</h4>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountEmail' class='control-label'>Email <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <div class='input-append block'>
                                                                        <input style='width:100%;' id='accountEmail' class='span6' type='text' name='accountEmail' value='$email'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountSenha' class='control-label'>Senha <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <div class='input-append block'>
                                                                        <input style='width:100%;' id='accountSenha' class='span6' type='' name='accountSenha' value='$password'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountPhoneNumber' class='control-label'>Celular <span class='required'>*</span></label>
                                                                <div class='controls controls-row'>
                                                                    <input id='accountPhoneNumber' class='span6 maskPhone margin-right5' type='text' name='accountPhoneNumber' value='$celular'>
                                                                </div>
                                                            </li>
                                                            
                                                            <li class='control-group'>
                                                                <label for='accountFaxNumber' class='control-label'>Fixo</label>
                                                                <div class='controls controls-row'>
                                                                    <input id='accountFaxNumber' class='span6 maskPhoneFixo margin-right5' type='text' name='accountFaxNumber' value='$telefone'>
                                                            </li>
                                                        </ul>
                                                    </fieldset>
                                                    <div class='form-actions'>
                                                        <button class='btn btn-blue'>Atualizar & Validar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                                                      
                        </div>";  
    }elseif($_GET['tipo'] == 'fornecedor'){//se for fornecedor
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $endereco = $_GET['endereco'];
        $cnpj = $_GET['cnpj'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $contato = $_GET['contato'];
//Monta o layout
echo                 "<div class='page-header'>
                        <h3><i class='aweso-icon-list-alt opaci35'></i> Editar <small>Clientes</small></h3>
                    </div>
                    <div class='row-fluid'>
                        <div class='span8 grider'>
                            <div class='widget widget-simple'>
                                <div class='widget-content'>
                                    <div class='widget-body'>
                                        <form id='accounForm' class='form-horizontal' method='post' action='../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.php?editar=$id' >
                                            <div class='row-fluid'>
                                                <div class='span12 form-dark'>
                                                    <fieldset>
                                                        <ul class='form-list label-left list-bordered dotted'>
                                                            <li class='section-form'>
                                                                <h4>Dados pessoais</h4>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountFirstName' class='control-label'>Nome completo <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <input id='accountFirstName' class='span11' type='text' name='accountFirstName' value='$nome'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountDob' class='control-label'>Data de nascimento <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <input id='accountDob' class='span6' type='text' name='accountDob' locate='pt-BR' value='$endereco'>
                                                                </div>
                                                            </li>
                                                            <li class='section-form'>
                                                                <h4>Informação do contato</h4>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountEmail' class='control-label'>Email <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <div class='input-append block'>
                                                                        <input style='width:100%;' id='accountEmail' class='span6' type='text' name='accountEmail' value='$email'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountSenha' class='control-label'>Senha <span class='required'>*</span></label>
                                                                <div class='controls'>
                                                                    <div class='input-append block'>
                                                                        <input style='width:100%;' id='accountSenha' class='span6' type='' name='accountSenha' value='$password'>
                                                                </div>
                                                            </li>
                                                            <li class='control-group'>
                                                                <label for='accountPhoneNumber' class='control-label'>Celular <span class='required'>*</span></label>
                                                                <div class='controls controls-row'>
                                                                    <input id='accountPhoneNumber' class='span6 maskPhone margin-right5' type='text' name='accountPhoneNumber' value='$celular'>
                                                                </div>
                                                            </li>
                                                            
                                                            <li class='control-group'>
                                                                <label for='accountFaxNumber' class='control-label'>Fixo</label>
                                                                <div class='controls controls-row'>
                                                                    <input id='accountFaxNumber' class='span6 maskPhoneFixo margin-right5' type='text' name='accountFaxNumber' value='$telefone'>
                                                            </li>
                                                        </ul>
                                                    </fieldset>
                                                    <div class='form-actions'>
                                                        <button class='btn btn-blue'>Atualizar & Validar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                                                      
                        </div>";  
    }

echo    " </div>
        </div>
    </div>";
     
include_once '../comuns/footer.html';

echo "    
</div>";
include_once '../comuns/javascript.html';
echo "
<script src='../../../../../js/bootstrap/bootstrap-wysihtml5/wysihtml5.js'></script>
<script src='../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.js'></script>

<script>
$(function($) {	    
    $('#cadastro').addClass('active');
    $('#notificacao').removeClass('active');
});
</script>

</body>
</html>"; 
}




?>