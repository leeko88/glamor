//As mascaras estao no aplication.js
$(document).ready(function ($) {
		$(function (accForm) {

		var resultadoValidacaoCadCli = false;		
						
				accForm('#accounForm').validate({
						ignore: "",
						rules: {//Nome Completo
								accountEmpresaName: {
										required: true,
										minlength: 5,
										maxlength: 45
								},
							
								accountEndereco: {//Data Nascimento
										required: true,
										minlength: 10
								},
                                accountCNPJ: {//CNPJ
										required: true,
								},
								accountEmail: {//email
										required: true,
										email: true,
										maxlength: 45
								},
                                accountContato: {//Senha
										required: true,
										minlength: 10
								},
                                accountFaxNumber: {
										required: true,
								},
						},
						messages: {
								accountEmpresaName: {
										required: "Digite o nome Fantasia ou Razão Social",
										minlength: "Tamanho minimo é 5 caracteres",
										maxlength: "Tamanho maximo é 45 caracteres"
								},
								accountEndereco: {
										required: "Entre com o endereço",
										minlength: "Endereço muito curto"
								},
                                accountCNPJ: {//CNPJ
										required: "CNPJ ou CPF é obrigadorio",
								},
								accountEmail: {
										required: "Digite o Email",
										email: "Digite um email valido - nome@exemplo.com",
										maxlength: "Tamanho maximo é 45 caracteres"
								},
								accountContato: {//Senha
										required: "Digite o nome do contato na empresa",
										minlength: "Nome muito curto."
								},
								accountFaxNumber: {
										required: "Digite um numero (Celular ou Fixo)",
								}
						},
						
						highlight: function (label) {
								$(label).closest('.control-group').addClass('error');
						},
						success: function (label) {
								$(label).text('OK!').addClass('valid')
										.closest('.control-group').addClass('success');
						resultadoValidacaoCadCli = true;
								
						},
						errorPlacement: function (error, label) {
								$(label).closest('.controls').append(error);
						resultadoValidacaoCadCli = false;
						}
				})
		});
});

function sussessoNoCadastro(){
	$('#divSucesso').removeClass( 'hide' );
	$('#divSucesso').addClass( 'alert-success' );
    $('#divSucesso').append('<strong style="color: green">Sucesso!</strong> Cadastro efetuado!');
}

function erroNoCadastro(){
	$('#divSucesso').removeClass( 'hide' );
	$('#divSucesso').addClass( 'alert-error' );
    $('#divSucesso').append('<strong style="color: red">Erro!</strong> Não foi possivel gravar!');
}