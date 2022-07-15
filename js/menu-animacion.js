$(document).on('ready',function()
                {
      $('.contenedor-menu').on('click',function(){
          
      $('.menu-burger').toggleClass('cruz'); 
          
      $('.menu').toggleClass('fondo'); 
      $('.transparente').toggleClass('transparencia'); 
      })

      var height = $(window).height();

      $('.fondo').height(height);

    })



$(document).on('ready',function()
                {
      $('.contenedor-menu-pc').on('click',function(){
          
      $('.menu-burger-pc').toggleClass('cruz-pc'); 
          
      $('.menu-pc').toggleClass('fondo-pc'); 
      $('.transparente').toggleClass('transparencia'); 
      })

      var height = $(window).height();

      $('.fondo-pc').height(height);

    })