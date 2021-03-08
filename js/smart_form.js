$(document).ready(function() {  	
//	$('.ui.accordion').accordion();
//	$('.ui.accordion').accordion({ onOpen: function (item) {  $('.modal').modal('refresh'); } });	
//	$('.tooltip').popup({ position:'right center' });
//	$('.tooltip-right').popup({ position:'right center' });
//	$('.tooltip-click').popup({ on: 'click' });

//	$('.link.remove.icon').hide();
//	$('.ui-input').each(function () {
//	    if ($(this).val())
//	    		$('.link.remove.icon#icon_'+$(this).attr('id')).show();
//	});
});



/*
 * Oeffnet den Finder, wenn Grafik gespeichert werden soll wird der Parament Udate_id übergeben
 */
function call_finder(update_id,id) {
	if (id) { 
		fu_open_finder('?id='+id); 
	}
	else { 
		fu_open_finder('');
	}

	$('#'+id).bind('focus',function()  { 
		if (update_id) {
			save_value_element(update_id,id,$('#'+id).val());
		}
		$('#show_explorer').modal('hide'); 
	});
}

/*
 * Ruft Content auf und uebergibt diesen an das Modal - Fenster
 */

function smart_form_del_file(name,id) {
	$.ajax( {
		url      : smart_form_wp+'ajax/del_file.php',
		global   : false,
		type     : 'POST',
		data     : ({ name : name, id : id}),
		dataType : 'html',
		success : function (data) {
			if (data == 'ok') {		
				$('.single_file_upload').val('');
				$('#sort_'+id+'.uploaded-card').remove();
				if ($('.uploaded-card').length == 0 ) $('#message_empty_cards').show();
			}	
			return false;
			
		}
	});
}

function del_folder() {
	
	$.ajax( {
		url      : smart_form_wp+'ajax/del_folder.php',
		global   : false,
		type     : 'POST',
		dataType : 'html',
		success : function (data) {
			if (data == 'ok') $('.uploaded-cards').html('');
			return false;
			
		}
	});
}

function add_file(name,workpath) {
	$.ajax( {
		url      : smart_form_wp+'ajax/add_file.php',
		global   : false,
		type     : 'POST',
		data     : ({ name : name}),
		dataType : 'html',
		// beforeSend : function () { alert('test');},
		success :  function (data) {
			$(data).appendTo('.uploaded-cards');
			$('.single_file_upload').val(name);
			$('.tooltip').popup({ position: 'top center' });
			
		}
	});
}

//Hängt in dropdown Wert an
function add_val_dropdown(key,value,name) {
	
	//$('#'+key).dropdown('add optionValue', value);
	
	var $menu =  $('#dropdown_'+key).find('.menu');
	//append new option to menu
	$menu.append('<div class="item" data-value="'+value+'">'+name+'</div>');
	//reinitialize drop down
	$('#dropdown_'+key).dropdown();
	//optional, set new value as selected option
	$('#dropdown_'+key).dropdown('set selected',value);
}


function emtpy_val_dropdown(key) {
	var $menu =  $('#dropdown_'+key).find('.menu');
	//append new option to menu
	$menu.empty();
}

