$(document).ready(function(){
    $('.nav-item').on('click',function(){ 
        $(this).parent().find('.active').removeClass('active'); 
        $(this).addClass('active');  
      }); 
});