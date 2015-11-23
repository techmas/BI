var main = function() {};

$('.inboard').on('click', '.extend', function()
 {
	  $(this).parent().children('.customize-graph').show(200);
	  $(this).parent().children('.ask-content').show(200);
	  $(this).parent().children('.check-list').show(200);
	  $(this).parent().addClass('inboard-active').removeClass('inboard');
	  $(this).parent().children('.close').show(200);
	  $(this).hide();
	}   );

$('.close').click( function()	
	{ 
	  $(this).parent().children('.customize-graph').hide(200);
	  $(this).parent().children('.ask-content').hide(200);
	  $(this).parent().children('.check-list').hide(200);
	  $(this).parent().addClass('inboard').removeClass('inboard-active');
	  $(this).hide();
	  $(this).parent().children('.extend').show(200);
	  event.stopPropagation();
	} );



	$('.show-add-number').click(function() {
	  $('.graphic-add').children('div').slideDown(300);
	 
	} );

	$('.close-add-number').click(function() {
	  $('.graphic-add').children('div').slideUp(300);
	 
	} );

	
	$( '.flash-success' ).delay( 3000 ).slideUp( 300 );


/*
	$('.inbord').click(function() {

	$(this).find('> div.customize-graph').stop(true, true);
		
		$(this).find('> div.customize-graph').slideDown(500);
	    
	    },
	    function() {            
	    	$(this).find('> div.customize-graph').slideUp(500);
	    }
	);

*/

$(document).ready(main);