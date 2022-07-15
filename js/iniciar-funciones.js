M.AutoInit();

(function($){

  $(function(){
    
    $('.slider').slider({interval: 4000});
    $('.carousel.carousel-slider').carousel({duration:1,dist:1,noWrap:false,indicators:false,shift:0});
  	$(".button-collapse").sideNav();
  	$('.dropdown-button').dropdown();
  	$('.modal').modal();
    $('.tabs').tabs({swipeable:true});
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();



  }); // end of document ready

})(jQuery); // end of jQuery name space

