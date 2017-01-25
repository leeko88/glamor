//Quando clicar na imagem de perfil, aciona a função de upload
$('#imagePerfil').click(function(){
    $('#imageUpload').click();
});
    //função de upload
 $('#imageUpload').live('change',function(){
         //$('#visualizar').html('<img src="ajax-loader.gif" alt="Enviando..."/> Enviando...');
        /* Efetua o Upload sem dar refresh na pagina */           
        $('#formularioImage').ajaxForm({
            target:'#imagePerfil' // o callback será no elemento com o id #visualizar
         }).submit();
     });