<?php
// Inclui o arquivo com o sistema de segurança
require_once("seguranca.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Salva duas variáveis com o que foi digitado no formulário
  // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $loginId = (isset($_POST['loginId'])) ? $_POST['loginId'] : '';
  $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
  $dBDados = (isset($_POST['dBDados'])) ? $_POST['dBDados'] : '';
  $tabela = (isset($_POST['tabela'])) ? $_POST['tabela'] : '';
  //se é tipo empresa ou cliente
  $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
  
  // Utiliza uma função criada no seguranca.php pra validar os dados digitados
  if (validaUsuario($loginId, $senha, $dBDados, $tabela, $tipo) == true) {
    // O usuário e a senha digitados foram validados, manda pra página interna
    echo true;
  } else {
    // O usuário e/ou a senha são inválidos, manda de volta pro form de login
    // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
    echo false;
  }
}