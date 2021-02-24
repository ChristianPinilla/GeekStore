/* Headear*/

$(function(){
    var menuIcono = $('#menu-icono'),
        lista = $('.nav ul.lista');

    menuIcono.on('click', function(){

        if( lista.hasClass('show') ){
            lista.removeClass('show');
        }else{
            lista.addClass('show');
        }

    });

    var menuColeccion = $('.nav-coleccion span'),
        listaColeccion = $('.nav-coleccion ul');

    menuColeccion.on('click', function(){
        
        if( listaColeccion.hasClass('show') ){
            listaColeccion.removeClass('show');
        }else{
            listaColeccion.addClass('show');
        }

    });
});

/* Fin de Header */