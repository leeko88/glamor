<?php
session_start();
require_once('php/connection/connection.php');
if(isLoggedIn()){
 header('Location: index/index.php'); 
}
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
<meta charset="utf-8">
<title>Glamor software - Gerenciamento de SPA, Pilates, Fisioterapia e Salões</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Login Glamor software - Entre e gerencie seu estabelecimento de Pilates, Fisioterapia, SPA e Salões.">
<meta name="author" content="Infor Sistema">

<!-- Custom styles -->
<style type="text/css">
.signin-content {
  max-width: 360px;
  margin: 0 auto 20px;
}
</style>

<!-- (ALL OK) Le styles -->
<link href="../../css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="../../css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
<link href="../../css/boo/boo-extension.css" rel="stylesheet">
<link href="../../css/boo/boo.css" rel="stylesheet">
<link href="../../css/boo/boo-coloring.css" rel="stylesheet">
<link href="../../css/boo/boo-utility.css" rel="stylesheet">

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../../images/glamor-software/ico/favicon.ico"> 
<link rel="icon" href="../../images/glamor-software/ico/favicon.ico"> 
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../images/glamor-software/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../images/glamor-software/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../images/glamor-software/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../../images/glamor-software/ico/apple-touch-icon-57-precomposed.png">
</head>

<body class="signin signin-vertical">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container"> </div>
                </div>
            </div>
            <!-- // navbar -->
            
            <div class="header-drawer" style="height:3px"> </div>
            <!-- // breadcrumbs --> 
        </div>
        <!-- // drawer --> 
    </div>
    <!-- // header-container -->
    
    <div id="main-container">
        <div id="main-content" class="main-content container">
            <div class="signin-content">
                <h1 class="welcome text-center" style="line-height: 0.6; color: red; font-size: 80px;"><span style="margin-left:20px; color: black">Bem vindo</span><br />
                    Glamor<small>soft.</small></h1>
                <div class="well well-black well-impressed">
                    <div class="tab-content overflow">
                        <div class="tab-pane fade in active" id="login">
                            <h3 class="no-margin-top"><i class="fontello-icon-user-4"></i> Entre com seu ID</h3>
                            <!-- Formulario de LOGIN -->
                        <div id="MessageForm" class="alert hide"><button type="button" class="close" data-dismiss="alert">&times;</button></div>
                            <form class="form-tied margin-00" method="post" name="login_form">
                                <fieldset>
                                   <legend style="text-align: center;" class="two">Modo <span style="color: lightseagreen" id="modo-login">EMPRESA</span></legend>
                                    <ul>                                        
                                        <li>
                                            <input id="idLogin" class="input-block-level" type="text" name="id_login_id" placeholder="Entre com o ID de sua empresa">                                            
                                        </li>
                                        <div id="idErroLogin" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>                                        
                                        <li>
                                            <input id="idPassword" class="input-block-level" type="password" name="id_login_password" placeholder="senha">
                                        </li>
                                        <div id="idErroPassword" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                         <li>
                                            <input id="idEmpresa" class="input-block-level" type="text" style="display: none;" name="id_login_empresa" placeholder="Entre com o ID da empresa">
                                        </li>
                                        <div id="idErroEmpresa" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                    </ul>
                                    <button id="button-entrar" type="button" class="btn btn-yellow btn-block btn-large">Entrar</button>
                                    <hr class="margin-xm">
                                    <a href="#forgot" class="pull-right link registrar-esqueceu-senha" data-toggle="tab">Esqueceu a senha?</a>
                                </fieldset>
                            </form>
                            <!-- // form --> 
                            
                        </div>
                        <!-- // Tab Login -->
                        
                        <div class="tab-pane fade" id="forgot">
                            <h3 class="no-margin-top">Esqueceu a senha?</h3>
                            <form class="margin-00" method="post" action="dashboard-one.html" name="forgot_password">
                                <p class="note">Entre com seu endereço de email, nós iremos enviar um codigo de resete.</p>
                                <input id="email" class="input-block-level" type="email" name="id_email_forgot" placeholder="Seu email">
                                <p class="text-center">ou</p>
                                <input id="email" class="input-block-level" type="tel" name="id_phone_forgot" placeholder="numero do celular">
                                <hr class="margin-xm">
                                <button type="submit" class="btn btn-yellow">Enviar</button>
                                <p>Você já é membro? <a href="#login" class="pull-right link login-again" data-toggle="tab">Tente logar novamente.</a></p>
                            </form>
                            <!-- // form --> 
                            
                        </div>
                        <!-- // Tab Forgot -->
                        
                        <div class="tab-pane fade" id="register">
                        <div id="idMessageForm" class="alert hide"><button type="button" class="close" data-dismiss="alert">&times;</button></div>
                            <h3 class="no-margin-top"><i class="fontello-icon-users"></i> Novo registro</h3>
                            <!-- FORM Cadastro !-->
                            <form id="form_login" class="form-tied margin-00" method="post" name="login_form">
                                <fieldset>
                                    <legend class="two"><span>Informação de conta</span></legend>
                                    <ul style="margin: auto">
                                        <li>
                                            <input id="idNome" class="input-block-level" type="text" name="cad_name" placeholder="Nome*">
                                            <div id="idErroNome" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idNascimento" class="input-block-level" name="cad_nascimento" type="text" placeholder="Nascimento* 00/00/0000">
                                            <div id="idErroNascimento" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idCel" class="input-block-level" type="text" name="cad_celular" placeholder="Celular* (ddd)9.9999-9999">
                                            <div id="idErroCel" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idFixo" class="input-block-level" type="text" name="cad_telefone" placeholder="Telefone (ddd)0000-0000">
                                            <div id="idErroFixo" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idMail" class="input-block-level" type="text" name="cad_email" placeholder="Email*">
                                            <div id="idErroMail" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idCodEmpresa" class="input-block-level" type="text" name="cad_codigoEmpresa" placeholder="Codigo da emrpesa*">
                                            <div id="idErroCodEmpresa" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                    </ul>
                                </fieldset>
                                <fieldset>
                                    <legend class="two"><span>Senha</span></legend>
                                    <ul>
                                        <li>
                                            <input id="idPassw" class="input-block-level" type="password" name="password" placeholder="senha*">
                                            <div id="idErroPassw" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                        <li>
                                            <input id="idPassw2" class="input-block-level" type="password" name="confirm_password" placeholder="confirme a senha*">
                                            <div id="idErroPassw2" class="alert alert-error hide"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                            </div>
                                        </li>
                                    </ul>
                                    <button id="idButtonCad" type="button" class="btn btn-green btn-block btn-large">REGISTRAR</button>
                                    <hr class="margin-xm">
                                    <p>Você já é membro? <a href="#login" class="pull-right link login-again" data-toggle="tab">Tente logar novamente.</a></p>
                                </fieldset>
                            </form>
                            <!-- // form --> 
                            
                        </div>
                        <!-- // Tab Forgot --> 
                        
                    </div>
                </div>
                <!-- // Well-Black --> 
                <a href="#" id="alter-modo" class="btn btn-block btn-yellow btn-large f12" data-toggle="tab">Entrar no modo CLIENTE</a>
                <a href="#register" class="btn btn-block btn-yellow btn-large f12 registrar-esqueceu-senha" data-toggle="tab">Sem conta? Registre gratis</a>
               
                <div class="web-description">
                    <h5>Copyright &copy; 2012 infor Sistema</h5>
                    <p>Glamor software &amp; Infor Sistema. <br />
                        All rights reserved.</p>
                </div>
                
            </div>
            <!-- // sign-content -->
            
        </div>
        <!-- // main-content --> 
        
    </div>
    <!-- // main-container  --> 
    
</div>
<!-- // page-container --> 

<!-- Le javascript --> 

<!-- (ALL OK) Placed at the end of the document so the pages load faster --> 
<script src="../../js/jquery/jquery.js"></script> 
<script src="../../js/bootstrap/bootstrap.js"></script> 

<!-- Validação do Cadastro -->
<script src="php/validate/loginCadastroValidate/loginCadastroValidate.js"></script> 
<script src="php/validate/loginEntrarValidate/loginEntrarValidate.js"></script> 

<!-- plugins -->
<script src="../../js/pl-form/jquery.maskedinput-1.0.js"></script> 

<!-- main js --> 
<script src="../../js/glamor-software/custom-login.js"></script> 

</body>
</html>
