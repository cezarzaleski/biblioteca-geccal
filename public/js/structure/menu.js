$(document).ready(function() {	
    
    
    
    $('#tabMenu li').click(function(){
    
        
        if (!$(this).hasClass('selected')) {    
           $('#tabMenu li').removeClass('selected');
	    //$('div.boxBody div').removeClass('show parent');
            
            $(this).addClass('selected');
	    
            
            $('.boxBody div.parent').slideUp('1500');
	    
            //alert($('#tabMenu > li').index(this));
            $('.boxBody div.parent:eq(' + $('#tabMenu > li').index(this) + ')').slideDown('1500');
	    
        }
    
    }).mouseover(function() {

        //Add and remove class, Personally I dont think this is the right way to do it, anyone please suggest    
        $(this).addClass('mouseover');
        $(this).removeClass('mouseout');   
    
    }).mouseout(function() {
    
        //Add and remove class
        $(this).addClass('mouseout');
        $(this).removeClass('mouseover');    
    
    });

    //Mouseover with animate Effect for Category menu list
    $('.boxBody li').click(function(){

        //Get the Anchor tag href under the LI
        window.location = $(this).children().attr('href');
    }).mouseover(function() {

        //Change background color and animate the padding
        $(this).css('backgroundColor','#888');
        $(this).children().animate({
            paddingLeft:"20px"
        }, {
            queue:false, 
            duration:300
        });
    }).mouseout(function() {
    
        //Change background color and animate the padding
        $(this).css('backgroundColor','');
        $(this).children().animate({
            paddingLeft:"0"
        }, {
            queue:false, 
            duration:300
        });
    });  
	
    //Mouseover effect for Posts, Comments, Famous Posts and Random Posts menu list.
    $('#.boxBody li').click(function(){
        window.location = $(this).children().attr('href');
    }).mouseover(function() {
        $(this).css('backgroundColor','#FBEC88');
    }).mouseout(function() {
        $(this).css('backgroundColor','');
    });  	
	
});