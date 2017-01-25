var resultadoVerificacaoCadastro;
$('#idButtonCad').click(function(){
    resultadoVerificacaoCadastro = true;
//tirar todos os erros para uma verificação limpa.
    limparErros();
//1) Verificando se os campos estão vazios
//2) Verificando o tamanho dos campos
    //nome
    if($('#idNome').val().trim() == ''){
        $('#idErroNome').removeClass( 'hide' );
        $('#idErroNome').append('<strong style="color: red">Atenção!</strong> Preencha o campo Nome.');
        resultadoVerificacaoCadastro = false;
    }else if($('#idNome').val().length < 3){
        $('#idErroNome').removeClass( 'hide' );
        $('#idErroNome').append('\n<strong style="color: red">Atenção!</strong> Nome muito curto.');
        resultadoVerificacaoCadastro = false;
    }
    //nascmiento
    var dateOne = $('#idNascimento').val();
    var yearDateOne = new Date(dateOne.substring(6),dateOne.substring(5,3),dateOne.substring(2,0)).getFullYear(); //Year, Month, Day
    var yearDateTwo = new Date().getFullYear(); //Data atual

    if($('#idNascimento').val().trim() == ''){
        $('#idErroNascimento').removeClass( 'hide' );
        $('#idErroNascimento').append('<strong style="color: red">Atenção!</strong> Preencha o Nascimento.');
        resultadoVerificacaoCadastro = false;
    }else if(yearDateOne >= yearDateTwo){
        $('#idErroNascimento').removeClass( 'hide' );
        $('#idErroNascimento').append('\n<strong style="color: red">Atenção!</strong> Verifique o ano');
        resultadoVerificacaoCadastro = false;
    }else if((yearDateTwo - yearDateOne) <= 15){
        $('#idErroNascimento').removeClass( 'hide' );
        $('#idErroNascimento').append('\n<strong style="color: red">Atenção!</strong> Idade minima: 16 anos');
        resultadoVerificacaoCadastro = false;
    }else if($('#idNascimento').val().length > 10 && $('#idNascimento').val().length < 10 ){
        $('#idErroNascimento').removeClass( 'hide' );
        $('#idErroNascimento').append('\n<strong style="color: red">Atenção!</strong> Formato invalido');
        resultadoVerificacaoCadastro = false;
    }
    //celular
    if($('#idCel').val().trim() == ''){
        $('#idErroCel').removeClass( 'hide' );
        $('#idErroCel').append('<strong style="color: red">Atenção!</strong> Preencha o Celular.');
        resultadoVerificacaoCadastro = false;
    }else if($('#idCel').val().length > 14 && $('#idCel').val().length < 14){
        $('#idErroCel').removeClass( 'hide' );
        $('#idErroCel').append('<strong style="color: red">Atenção!</strong> Formato invalido.');
        resultadoVerificacaoCadastro = false;
    }
    //telefone
     if($('#idFixo').val().trim() > 13 && $('#idFixo').val().trim() < 13 ){
        $('#idErroFixo').removeClass( 'hide' );
        $('#idErroFixo').append('<strong style="color: red">Atenção!</strong> Formato invalido.');
        resultadoVerificacaoCadastro = false;
    }    
    //email
    if($('#idMail').val().trim() == ''){
        $('#idErroMail').removeClass( 'hide' );
        $('#idErroMail').append('<strong style="color: red">Atenção!</strong> Preencha o Email.');
        resultadoVerificacaoCadastro = false;
    }else if(!isEmail($('#idMail').val().trim())){
        $('#idErroMail').removeClass( 'hide' );
        $('#idErroMail').append('<strong style="color: red">Atenção!</strong> Formato invalido de Email.');
        resultadoVerificacaoCadastro = false;
    }
    //codigo empresa
    if($('#idCodEmpresa').val().trim() == ''){
        $('#idErroCodEmpresa').removeClass( 'hide' );
        $('#idErroCodEmpresa').append('<strong style="color: red">Atenção!</strong> Preencha o Cod. Empresa.');
        resultadoVerificacaoCadastro = false;
    }else if(!isNumber($('#idCodEmpresa').val().trim())){
        $('#idErroCodEmpresa').removeClass( 'hide' );
        $('#idErroCodEmpresa').append('<strong style="color: red">Atenção!</strong> Apenas codigo numerico.');
        resultadoVerificacaoCadastro = false;
    }
     //senha 01
    if($('#idPassw').val().trim() == ''){
        $('#idErroPassw').removeClass( 'hide' );
        $('#idErroPassw').append('<strong style="color: red">Atenção!</strong> Preencha a Senha.');
        resultadoVerificacaoCadastro = false;
    }else if(!verificarSenha($('#idPassw').val().trim())){
        $('#idErroPassw').removeClass( 'hide' );
        $('#idErroPassw').append('<strong style="color: red">Atenção!</strong> Deve ter letras minuscula, maiuscula e numeros.');
        resultadoVerificacaoCadastro = false;
    }
     //senha 02
    if($('#idPassw2').val().trim() == ''){
        $('#idErroPassw2').removeClass( 'hide' );
        $('#idErroPassw2').append('<strong style="color: red">Atenção!</strong> Repita a Senha.');
        resultadoVerificacaoCadastro = false;
    }else if($('#idPassw2').val().trim() != ($('#idPassw').val().trim())){
        $('#idErroPassw2').removeClass( 'hide' );
        $('#idErroPassw2').append('<strong style="color: red">Atenção!</strong> Senhas não correspondem.');
        resultadoVerificacaoCadastro = false;
    }

    //Limpar erros dos campos de Login
    limparCamposLogin();
    //Se não conter erro no cadastro
    //O cadastro irá ser Gravado

    if(resultadoVerificacaoCadastro == true){
        $.post("php/validate/loginCadastroValidate/loginCadastroValidate.php",{
        nome: $('#idNome').val().trim(),
        nascimento: $('#idNascimento').val().trim(),
        celular: $('#idCel').val().trim(),
        telefone: $('#idFixo').val().trim(),
        email: $('#idMail').val().trim(),
        codEmpresa: $('#idCodEmpresa').val().trim(),
        password: $('#idPassw').val().trim(),
        }, function(resultado){
            var dadoRecebido = resultado;
            if(dadoRecebido){
                $('#idMessageForm').text('');
                $('#idMessageForm').removeClass( 'hide alert-error' );
                $('#idMessageForm').addClass( 'alert-success' );
                $('#idMessageForm').append('<strong style="color: red">Sucesso!</strong> Cadastro efetuado! Você já pode efetuar o login');
                //limpando os campos
                $('#idNome').val('');
                $('#idNascimento').val('');
                $('#idCel').val('');
                $('#idFixo').val('');
                $('#idMail').val('');
                $('#idCodEmpresa').val('');
                $('#idPassw').val('');
                $('#idPassw2').val('');
            }
            else{
                $('#idMessageForm').text('');
                $('#idMessageForm').removeClass( 'hide alert-success' );
                $('#idMessageForm').addClass( 'alert-error' );
                $('#idMessageForm').append('<strong style="color: red">Atenção!</strong> Não foi possivel fazer o cadastro.'+ 
                'O Id da empresa talves não exista ou email já cadastrado. Caso o erro continue entre em <a href="http://localhost/pluton/#contact">contato</a>');
            }
        });
    }
});

//função para limpar os campos
function limparCampos(){
    $('#idNome').val('');
    $('#idNascimento').val('');
    $('#idCel').val('');
    $('#idFixo').val('');
    $('#idMail').val('');
    $('#idCodEmpresa').val('');
    $('#idPassw').val('');
    $('#idPassw2').val('');
}

//Ocultando os erros e Menssagens
    //Quando for digitado no input
    //nome
$("#idNome").on("change paste keyup", function() {
   $('#idErroNome' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});
    //nascmiento
$("#idNascimento").on("change paste keyup", function() {
   $('#idErroNascimento' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});
    //celular
$("#idCel").on("change paste keyup", function() {
   $('#idErroCel' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});
    //email
$("#idMail").on("change paste keyup", function() {
   $('#idErroMail' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});  
  //codigo Empresa
$("#idCodEmpresa").on("change paste keyup", function() {
   $('#idErroCodEmpresa' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});
  //senha 01
$("#idPassw").on("change paste keyup", function() {
   $('#idErroPassw' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});
  //senha 02
$("#idPassw2").on("change paste keyup", function() {
   $('#idErroPassw2' ).addClass( 'hide' );
   $('#idMessageForm').addClass( 'hide' );
});

//função para testar o email     
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

//função para verificar o codigo de empresa
//apenas numeros
function isNumber(codigo) {
    return !isNaN(parseFloat(codigo)) && isFinite(codigo);
}

//verificar caracteres da senha
function verificarSenha(senha){
     return /^[A-Za-z0-9\d=!\-@._*]*$/.test(senha) // consists of only these
       && /[a-z]/.test(senha) // has a lowercase letter
       && /[A-Z]/.test(senha) // has a upercase letter
       && /\d/.test(senha) // has a digit
}

//função para limpar os erros
function limparErros(){
     //nome
     $('#idErroNome' ).addClass( 'hide' );
     $('#idErroNome').text('');
     //nascimento
     $('#idErroNascimento' ).addClass( 'hide' );
     $('#idErroNascimento').text('');
     //celular
     $('#idErroCel' ).addClass( 'hide' );
     $('#idErroCel').text('');
     //telefone
     //
     //email
     $('#idErroMail' ).addClass( 'hide' );
     $('#idErroMail').text('');
     //empresa
     $('#idErroCodEmpresa' ).addClass( 'hide' );
     $('#idErroCodEmpresa').text('');
     //senha 01
     $('#idErroPassw' ).addClass( 'hide' );
     $('#idErroPassw').text('');
     //senha 02
     $('#idErroPassw2' ).addClass( 'hide' );
     $('#idErroPassw2').text('');
}
