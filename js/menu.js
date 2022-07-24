$(function () {
	var header = document.getElementById("header");
	var headroom = new Headroom(header);
	headroom.init();

	//menu responsive 
	//calculamos el ancho de la pagina 
	//var ancho = $(window).width(),
	    //enlaces = $("#enlaces"),
	    //btnmenu = $("#btn-menu"),
	    //icono = $("#btn-menu .icono");

	    //if(ancho < 700){
	    //	enlaces.hide();
	    //	icono.addclass("fa-bars");
	    //}

//	    btnmenu.on("click", function(e){
//	    	enlaces.slidetoggle();
//	    	icono.toggleclass("fa-bars");
//	    	icono.toggleclass("fa-times");
//	    });
	    
//	    $(window).on("resize", function(){
//	    	if($(this).width() > 700){
  //              enlaces.show();
//                icono.renoveclass("fa-bars");
//	    } else{
//	    	enlaces.hide();
//	    	icono.toggleclass("fa-bars");
//	    	icono.toggleclass("fa-times");
//	    }

//        });

});

