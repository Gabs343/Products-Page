$(document).ready(function(){
    /*$('li a').on('click',function(e){ 
        $(this).parent().find('li.active').removeClass('active'); 
        $(this).addClass('active');  
      });*/
      $("li a").on("click", function(){
            $(this).parent().css( "background-color", "red");
      }); 
});