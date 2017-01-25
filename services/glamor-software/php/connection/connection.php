<?php

//Retorna a conexão com o banco de dados
function conexaoComBancoDeDados($bancoDeDados){
$connection = new PDO('mysql:host=localhost;dbname='.$bancoDeDados, 'root', 'root', array(
    PDO::ATTR_PERSISTENT => true
));
return $connection;
}

//Verifica se o usuario esta logado
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
    return true;
}