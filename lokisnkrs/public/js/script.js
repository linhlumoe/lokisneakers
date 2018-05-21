// JavaScript Document
//SAN PHAM
$( document ).ready(function() {    
$("[rel='tooltip']").tooltip();         
$('.thumbnail').hover(        
function(){            
$(this).find('.caption').slideDown(250); //.fadeIn(250)        
},        
function(){            
$(this).find('.caption').slideUp(205); //.fadeOut(205)        
}    
); 
});

//TIN TUC
$(document).ready(function() {    
$("#news-slider").owlCarousel({        
items : 3,        
itemsDesktop:[1199,3],        
itemsDesktopSmall:[980,2],        
itemsMobile : [600,1],        
pagination:true,        
autoPlay:true   
});
});
