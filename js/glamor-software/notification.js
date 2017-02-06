var notes = [];

//notes['alert'] = 'Best check yo self, you\'<strong>re not looking too good</strong>.';
notes['error'] = '<strong>Não foi possivel completar a ação.</strong> Erro.';
notes['success'] = '<strong>Sucesso!</strong> Ação completada.';
//notes['information'] = 'This alert needs your attention, but it\'s not super <strong>important</strong>.';
//notes['warning'] = '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.';
notes['confirm'] = 'Deseja continuar?';



$(document).ready(function () {

//Evento para excluir!
    $('.btn.runner').click(function () {

        //Pegar id do usuario selecionado.
        var id =  $(this).attr("id");
        var classe = $(this).attr("class");
        //
        var self = $(this);       
     
        notyfy({
            text: notes[self.data('type')],
            type: self.data('type'),
            dismissQueue: true,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [{
                addClass: 'btn btn-blue btn-small',
                text: '<i class="fontello-icon-check"></i> Ok',
                onClick: function ($notyfy) {
                    if($( "#"+id ).hasClass( "clienteRemove" )){//Se for clientes (manda para o controller do cliente)
                      window.location.href = "../../../php/controllers/clienteController.php?removeID="+id; 
                    }else if($( "#"+id ).hasClass( "fornecedorRemove" )){
                      window.location.href = "../../../php/controllers/clienteFornecedor.php?removeID="+id; 
                    }
                }
            }, {
                addClass: 'btn btn-red btn-small',
                text: 'Cancel',
                onClick: function ($notyfy) {
                    $notyfy.close();
                    notyfy({
                        force: true,
                        text: '<strong>Ação cancelada &nbsp<li class="btn btn-red runner">ok</li><strong>',
                        type: 'error',
                        layout: self.data('layout')
                    });
                }
            }]
        });
        return false;
    });

});



$(function () {

	$('#add-regular').click(function () {
		$.gritter.add({
			title: 'This is a regular notice!',// the heading of the notification
			text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.',
			image: 'assets/img/demo/demo-avatar9604.jpg',// (string | optional) the image to display on the left
			sticky: false,// if you want it to fade out on its own or just sit there
			time: 1500, // the time you want it to be alive for before fading out
			position: 'bottom-right',
		});
		return false;
	});
	
    $('#add-sticky').click(function () {
		var unique_id = $.gritter.add({
            title: 'This is a sticky notice!',
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.',
            image: 'assets/img/demo/demo-avatar9604.jpg',
            sticky: true,
            time: '',
            class_name: 'my-sticky-class' // the class name you want to apply to that specific message
        });

        // You can have it return a unique id, this can be used to manually remove it later using
        /*
			setTimeout(function(){
				$.gritter.remove(unique_id, {
					fade: true,
					speed: 'slow'
				});
			}, 6000)
		*/

        return false;

    });

    $('#add-max').click(function () {
		$.gritter.add({
            title: 'This is a notice with a max of 3 on screen at one time!',
            text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.',
            image: 'assets/img/demo/demo-avatar9604.jpg',
            sticky: false,
            // (function) before the gritter notice is opened
            before_open: function () {
                if($('.gritter-item-wrapper').length == 3) {
                    // Returning false prevents a new gritter from opening
                    return false;
                }
            }
        });

        return false;

    });

    $('#add-without-image').click(function () {
		$.gritter.add({
            title: 'This is a notice without an image!',
            text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.'
        });
		return false;
    });

    $('#add-gritter-light').click(function () {

        $.gritter.add({
            title: 'This is a light notification',
            text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
            class_name: 'gritter-light',
            time: 1500
        });
		return false;
    });

    $('#add-with-callbacks').click(function () {

        $.gritter.add({
            title: 'This is a notice with callbacks!',
            text: 'The callback is...',
            // (function | optional) function called before it opens
            before_open: function () {
                alert('I am called before it opens');
            },
            // (function | optional) function called after it opens
            after_open: function (e) {
                alert("I am called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
            },
            // (function | optional) function called before it closes
            before_close: function (e, manual_close) {
                var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
                alert("I am called before it closes: I am passed the jQuery object for the Gritter element... \n" + manually);
            },
            // (function | optional) function called after it closes
            after_close: function (e, manual_close) {
                var manually = (manual_close) ? 'The "X" was clicked to close me!' : '';
                alert('I am called after it closes. ' + manually);
            }
        });
		return false;
    });

    $('#add-sticky-with-callbacks').click(function () {
		$.gritter.add({
            title: 'This is a sticky notice with callbacks!',
            text: 'Sticky sticky notice.. sticky sticky notice...',
            sticky: true,
            before_open: function () {
                alert('I am a sticky called before it opens');
            },
            after_open: function (e) {
                alert("I am a sticky called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
            },
            before_close: function (e) {
                alert("I am a sticky called before it closes: I am passed the jQuery object for the Gritter element... \n" + e);
            },
            after_close: function () {
                alert('I am a sticky called after it closes');
            }
        });
		return false;
	});

    $("#remove-all").click(function () {
		$.gritter.removeAll();
        return false;
	});

    $("#remove-all-with-callbacks").click(function () {
		$.gritter.removeAll({
            before_close: function (e) {
                alert("I am called before all notifications are closed.  I am passed the jQuery object containing all  of Gritter notifications.\n" + e);
            },
            after_close: function () {
                alert('I am called after everything has been closed.');
            }
        });
        return false;
	});
	
	
	$('#add-dark-image').click(function () {
		$.gritter.add({
			title: 'This notice with image',
			text: 'This will fade out after a certain amount of time.',
			image: 'assets/img/demo/demo-avatar9604.jpg',
			sticky: false,
			time: 2000
		});
		return false;
	});
	
	$('#add-light-image').click(function () {
		$.gritter.add({
			title: 'This notice with image',
			text: 'This will fade out after a certain amount of time.',
			image: 'assets/img/demo/demo-avatar9604.jpg',
			sticky: false,
			time: 2000,
			class_name: 'gritter-light'
		});
		return false;
	});
	
	


});