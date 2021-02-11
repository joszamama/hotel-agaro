$(document).ready(function () {

    //crear objetos
    var banners = $('.banner');

    var oBanners = Array();

    for (let i = 0; i < banners.length; i++) {
        oBanners[i] = new Banner(banners[i], $(".banner").eq(i).children('.slide').length, 1);
    }

    /*
        // Objeto del Banner	
        var banner = {
            padre: $('#banner'),
            numeroSlides: $('#banner').children('.slide').length,
            posicion: 1
        };
    */

    oBanners.forEach(banner => {

        // Establecemos que el primer slide aparecera desplazado
        $(banner.padre).children('.slide').first().css({
            'left': 0
        });

        // Funcion para calcular el alto que tendran los habitaciones padre
        var altoBanner = function () {
            var alto = $(banner.padre).children('.slide').outerHeight();
            $(banner.padre).css({
                'height': alto + 'px'
            });
        };


        // Ejecutamos las funciones para calcular los altos.
        altoBanner();

        // Si cambiamos el tamaño de la pantalla se
        // ejecuta esta funcion para saber el nuevo
        // tamaño del elemento padre
        $(window).resize(function () {
            altoBanner();
        });


        // Declaramos que el primer elemento inicie con su clase active
        $('#botones').children('span').first().addClass('active');

        // ---------------------------------------
        // ----- Banner
        // ---------------------------------------

        // Boton Siguiente

        //console.log($(banner.padre).next().next());
        //$('#banner-next').on('click', function (e) {

        $(banner.padre).next().next().on('click', function (e) {
            e.preventDefault();

            if (banner.posicion < banner.numeroSlides) {
                // Nos aseguramos de que las demas slides empiecen desde la derecha.
                $(banner.padre).children().not('.active').css({
                    'left': '100%'
                });

                //$(banner.padre).children(".active")

                // Quitamos la clase active y se la ponemos al siguiente elemento.Y lo animamos

                //$('#banner .active').removeClass('active').next().addClass('active').animate({
                $(banner.padre).children(".active").removeClass('active').next().addClass('active').animate({
                    'left': 0
                });

                // Animamos el slide anterior para que se deslaza hacia la izquierda
                $(banner.padre).children(".active").prev().animate({
                    'left': '-100%'
                });

                banner.posicion = banner.posicion + 1;
            } else {
                // Hacemos que el slide activo (es decir el ultimo), se anime hacia la derecha
                $(banner.padre).children(".active").animate({
                    'left': '-100%'
                });

                // Seleccionamos todos los slides que no tengan la clase .active
                // y los posicionamos a la derecha
                $(banner.padre).children().not('.active').css({
                    'left': '100%'
                });

                // Eliminamos la clase active y se la ponemos al primer elemento.
                // Despues lo animamos.
                $(banner.padre).children(".active").removeClass('active');
                $(banner.padre).children().first().addClass('active').animate({
                    'left': 0
                });

                // Reseteamos la posicion a 1
                banner.posicion = 1;
            }
        });

        // Boton Anterior
        $(banner.padre).next().on('click', function (e) {
            e.preventDefault();

            if (banner.posicion > 1) {

                // Nos asegramos de todos los elementos hijos (que no sean) .active
                // se posicionen a la izquierda
                $(banner.padre).children().not('.active').css({
                    'left': '-100%'
                });

                // Deslpazamos el slide activo de izquierda a derecha
                $(banner.padre).children(".active").animate({
                    'left': '100%'
                });

                // Eliminamos la clase active y se la ponemos al slide anterior.
                // Y lo animamos
                $(banner.padre).children(".active").removeClass('active').prev().addClass('active').animate({
                    'left': 0
                });

                // Reiniciamos la posicion a 1
                banner.posicion = banner.posicion - 1;
            } else {

                // Nos aseguramos de que los slides empiecen a la izquierda
                $(banner.padre).children().not('.active').css({
                    'left': '-100%'
                });

                // Animamos el slide activo hacia la derecha
                $(banner.padre).children(".active").animate({
                    'left': '100%'
                });

                // Eliminamos la clase active y se la ponemos al primer elemento.
                // Despues lo animamos.
                $(banner.padre).children(".active").removeClass('active');
                $(banner.padre).children().last().addClass('active').animate({
                    'left': 0
                });

                // Reseteamos la posicion a 1
                banner.posicion = banner.numeroSlides;
            }

        });

    });

});