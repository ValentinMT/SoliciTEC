//alert("Iniciando");

$(document).ready(function() {
    $('select').material_select();

    $(".button-collapse").sideNav();

	$('.slider').slider();

	$('.fixed-action-btn').openFAB();

	$('#textarea1').val('New Text');
  	
  	$('#textarea1').trigger('autoresize');

  	$('.collapsible').collapsible({
    	accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});

	//$('select').material_select('destroy');