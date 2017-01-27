//As mascaras estao no aplication.js
$(document).ready(function ($) {
		$(function (accForm) {
				
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
								accountPassword: {//Senha
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
								accountPassword: {//Senha
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
						},
						errorPlacement: function (error, label) {
								$(label).closest('.controls').append(error);
						}
				})
		});


//Outro Forumulario (outra aba)
		$(function (itemForm) {
				
				itemForm('#itemForm').validate({
						ignore: "#articleCategory input[type=hidden]",
						rules: {
								articleTitle: {
										required: true,
										minlength: 3
								},
								articleAlias: {
										required: true,
										minlength: 3
								},
								articleCategory: {
										required: true,
										minlength: 1
								},
								articleTags: {
										required: true
								},
								articleAuthor: {
										required: true,
										minlength: 3,
										maxlength: 50
								},
								articleAuthorAlias: {
										required: true,
										minlength: 3,
										maxlength: 50
								}
						},
						messages: {
								articleTitle: {
										required: "Please enter a Title for Article",
										minlength: "Title must be at least 3 characters"
								},
								articleAlias: {
										required: "Please enter a Alias for Article",
										minlength: "Alias must be at least 3 characters and must not contain spaces"
								},
								articleCategory: {
										required: "Please select a Category",
								},
								articleTags:{
										required: "Please enter Autor name",
										maxlength: "Only 50 characters"
								},
								articleAuthor: {
										required: "Please enter Autor name",
										maxlength: "Only 50 characters"
								},
								articleAuthorAlias: {
										required: "Please enter Autor alias",
										maxlength: "Only 50 characters"
								}
						},
		
						highlight: function (label) {
								$(label).closest('.control-group').addClass('error');
						},
						unhighlight: function(element) {
								$(label).closest('.control-group').removeClass("error");
						}, 
						success: function (label) {
								$(label).text('OK!').addClass('valid')
										.closest('.control-group').removeClass("error")
										.closest('.control-group').addClass('success');
						},
						errorPlacement: function (error, label) {
								$(label).closest('.controls').append(error);
						}
		
				});
		});
		
		
});
