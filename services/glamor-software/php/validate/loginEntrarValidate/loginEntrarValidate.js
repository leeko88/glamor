var resultadoVerificacaoEntrar;
$('#button-entrar').click(function(){
    limparCamposLogin();
    //tipo de login (valorDoSpan)
    var valorDoSpanII = $("#modo-login").text();
    resultadoVerificacaoEntrar = true;
//1) Verificando se os campos estão vazios
    //nome
if(valorDoSpanII == 'EMPRESA'){
    //modo Empresa
    //ID Empresa
    if($('#idLogin').val().trim() == ''){
        $('#idErroLogin').removeClass( 'hide' );
        $('#idErroLogin').append('<strong style="color: red">Atenção!</strong> Entre com o ID da Empresa.');
        resultadoVerificacaoEntrar = false;
    }else if(!isNumberII($('#idLogin').val().trim())){
        $('#idErroLogin').removeClass( 'hide' );
        $('#idErroLogin').append('<strong style="color: red">Atenção!</strong> O ID deve conter apenas numeros.');
        resultadoVerificacaoEntrar = false;
    }else{
        verificarCodEmpresaII('glamor_emp_'+$('#idLogin').val().trim()); 
    }
    //password
    if($('#idPassword').val().trim() == ''){
        $('#idErroPassword').removeClass( 'hide' );
        $('#idErroPassword').append('<strong style="color: red">Atenção!</strong> Entre com a Senha.');
        resultadoVerificacaoEntrar = false;
    }
}else{//modo Cliente
    //Email
    if($('#idLogin').val().trim() == ''){
        $('#idErroLogin').removeClass( 'hide' );
        $('#idErroLogin').append('<strong style="color: red">Atenção!</strong> Entre com seu Email.');
        resultadoVerificacaoEntrar = false;
    }else if(!isEmailII($('#idLogin').val().trim())){
        $('#idErroLogin').removeClass( 'hide' );
        $('#idErroLogin').append('<strong style="color: red">Atenção!</strong> Entre com um Email valido.');
    }
    //Password
     if($('#idPassword').val().trim() == ''){
        $('#idErroPassword').removeClass( 'hide' );
        $('#idErroPassword').append('<strong style="color: red">Atenção!</strong> Entre com a Senha.');
        resultadoVerificacaoEntrar = false;
    }
    //ID Empresa
     if($('#idEmpresa').val().trim() == ''){
        $('#idErroEmpresa').removeClass( 'hide' );
        $('#idErroEmpresa').append('<strong style="color: red">Atenção!</strong> Entre com o ID da Empresa.');
        resultadoVerificacaoEntrar = false;
    }else if(!isNumberII($('#idEmpresa').val().trim())){
        $('#idErroEmpresa').removeClass( 'hide' );
        $('#idErroEmpresa').append('<strong style="color: red">Atenção!</strong> O ID deve conter apenas numeros.');
        resultadoVerificacaoEntrar = false;
    }else{
        verificarCodEmpresaII('glamor_emp_'+$('#idEmpresa').val().trim()); 
    }
}
   //Limpar erros do campo de cadastro (outro form)
   limparErros();
    //Se não conter erro no login
    if(resultadoVerificacaoEntrar == true){
        if(valorDoSpanII == 'EMPRESA'){
            $.post("php/validate/loginServerValidate/valida.php",{
            loginId: $('#idLogin').val().trim(),
            senha: $('#idPassword').val().trim(),
            dBDados: 'client_emp_glamor',
            tabela: 'user_emp_client',
            tipo: 'empresa',
            }, function(resultado){
                var dadoRecebido = resultado;
                if(dadoRecebido){
                    window.location.replace("index/index.php");
                }else{
                    $('#MessageForm').text('');
                    $('#MessageForm').removeClass( 'hide' );
                    $('#MessageForm').addClass( 'alert-error' );
                    $('#MessageForm').append('<strong style="color: red">Atenção!</strong> Não foi possivel entrar.');
                }
            });
        }else{
            $.post("php/validate/loginServerValidate/valida.php",{
            loginId: $('#idLogin').val().trim(),
            senha: $('#idPassword').val().trim(),
            dBDados: 'glamor_emp_'+$('#idEmpresa').val().trim(),
            tabela: 'user_client',
            tipo: 'cliente',
            }, function(resultado){
                var dadoRecebido = resultado;
                if(dadoRecebido){
                    window.location.replace("index/index.php");
                }else{
                    $('#MessageForm').text('');
                    $('#MessageForm').removeClass( 'hide' );
                    $('#MessageForm').addClass( 'alert-error' );
                    $('#MessageForm').append('<strong style="color: red">Atenção!</strong> Não foi possivel entrar.');
                }
            });
        }
    }
});

//Ocultando os erros e Menssagens
    //Quando for digitado no input
    //Login
    $('#idLogin').on("change paste keyup", function() {
    $('#idErroLogin' ).addClass( 'hide' );
    });
    //Password
    $('#idPassword').on("change paste keyup", function() {
    $('#idErroPassword' ).addClass( 'hide' );
    });
    //ID Empresa
    $('#idEmpresa').on("change paste keyup", function() {
    $('#idErroEmpresa' ).addClass( 'hide' );
    });

//função limpar campos de erros
function limparCamposLogin(){
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

//função para testar o email     
function isEmailII(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

//função para verificar o codigo de empresa
//apenas numeros
function isNumberII(codigo) {
    return !isNaN(parseFloat(codigo)) && isFinite(codigo);
}

//função verificar codigo de empresa com conexão
function verificarCodEmpresaII(codigoEmpresa){
//O codigoEmpresa é o banco de dados da empresa.
$.get("php/validate/loginEntrarValidate/loginEntrarValidate.php?codigoEmpresa="+codigoEmpresa, function(resultadoVerificacaoCodEmpresa){
 var dadoRecebido = resultadoVerificacaoCodEmpresa;
        if(dadoRecebido == true){
            $('#idErroEmpresa').removeClass( 'hide' );
            $('#idErroEmpresa').append('<strong style="color: red">Atenção!</strong> Empresa não encontrada.');
        } 
    });
}