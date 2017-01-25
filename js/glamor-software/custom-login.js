//função para o tipo de modo no login
$('#alter-modo').click(function () {
    var valorDoSpan = $("#modo-login").text();
    if (valorDoSpan == 'EMPRESA') {
        limparCampos();
        $("#idEmpresa").show();
        $("#modo-login").text('CLIENTE');
        $("#alter-modo").text('Entrar no modo EMPRESA');
        $("#idLogin").attr("placeholder", "Entre com seu email");
    } else if (valorDoSpan == 'CLIENTE') {
        limparCampos();
        $("#modo-login").text('EMPRESA');
        $("#alter-modo").text('Entrar no modo CLIENTE');
        $("#idLogin").attr("placeholder", "Entre com o ID de sua empresa");
        $("#idEmpresa").hide();
    }
});
$('.registrar-esqueceu-senha').click(function () {
    $('#alter-modo').hide();
    $('.registrar-esqueceu-senha').hide();
});
$('.login-again').click(function () {
    $('#alter-modo').show();
    $('.registrar-esqueceu-senha').show();
});

//função para maskara do registro

$("#idNascimento").mask("99/99/9999");

$("#idCel").mask("(99)9.9999-9999");

$("#idFixo").mask("(99)9999-9999");

//Limpa os erros da tela.
function limparCampos(){
    //Login
    $('#idErroLogin' ).addClass( 'hide' );
    $('#idErroLogin').text('');
    //Password
    $('#idErroPassword' ).addClass( 'hide' );
    $('#idErroPassword').text('');
    //ID Empresa
    $('#idErroEmpresa' ).addClass( 'hide' );
    $('#idErroEmpresa').text('');
}