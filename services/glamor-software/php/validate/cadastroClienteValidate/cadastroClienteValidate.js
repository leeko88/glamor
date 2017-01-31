//As mascaras estao no aplication.js
$(document).ready(function ($) {
		$(function (accForm) {

		var resultadoValidacaoCadCli = false;		
						
				accForm('#accountDob').datepicker({
								format: 'dd-mm-yyyy',
								autoclose: true
						});
				
				accForm('#accounForm').validate({
						ignore: "",
						rules: {//Nome Completo
								accountFirstName: {
										required: true,
										minlength: 10,
										maxlength: 45
								},
							
								accountDob: {//Data Nascimento
										required: true,
										minlength: 10
								},
								accountEmail: {//email
										required: true,
										email: true,
										maxlength: 45
								},
								accountSenha: {//Senha
										required: true,
										maxlength: 45
								},
								accountPhoneNumber: {
										required: true,
								},
						},
						messages: {
								accountFirstName: {
										required: "Digite o nome completo",
										minlength: "Tamanho minimo é 10 caracteres",
										maxlength: "Tamanho maximo é 45 caracteres"
								},
								accountDob: {
										required: "Entre com uma data",
										minlength: "Modelo de data: 00-00-0000"
								},
								accountEmail: {
										required: "Digite o Email",
										email: "Digite um email valido - nome@exemplo.com",
										maxlength: "Tamanho maximo é 45 caracteres"
								},
								accountSenha: {//Senha
										required: "Digite a Senha",
										maxlength: "Tamanho maximo é 45 caracteres"
								},
								accountPhoneNumber: {
										required: "Digite um numero do Celular",
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
    $('#divSucesso').append('<strong style="color: red">Sucesso!</strong> Cadastro efetuado!');
}

function erroNoCadastro(){
	$('#divSucesso').removeClass( 'hide' );
	$('#divSucesso').addClass( 'alert-error' );
    $('#divSucesso').append('<strong style="color: red">Erro!</strong> Não foi possivel gravar!');
}