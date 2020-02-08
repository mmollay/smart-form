$(document).ready( function() {
	//Auto - Reloader
	setInterval(function() {		
		if ( $('.reload_table').length) {
			$('.reload_table'). each (function() {
				var table_id = this.id;
				var reload_loader = $('.reload_loader#'+table_id).attr("value");
				//alert(reload_loader);
				if ($('.reload_table#'+table_id).is(':checked')) {
					table_reload(table_id,reload_loader);
				}
			});
		}
	}, 14000);
});
		

//var smart_form_wp wird auf der index.php oder ssiPlattform.php übergeben

function call_semantic_form(ID,key,url,list_id,autofocus) {
	
	if (!autofocus) var autofocus = '';
	if (url) {
		$(this)
		.api({
		  url: url,
		  method: 'post',
		  on: 'now',
		  dataType: 'html',
		  data     : ({ update_id : ID, ajax : true, list_id : list_id }),
		  onRequest: function () {
			  $('#'+key+">.content").html("<div class='ui loading segment'><br><br><br><br><br><br><br><br><br><br><br><br></div>");
			  $('#'+key).modal({closable : false, allowMultiple: true, observeChanges : true, autofocus: autofocus}); //closable:false
			  
			  //$('#'+key).modal({ onDeny : function() { alert('test'); $('#'+key).modal('hide'); } });
			  $('#'+key).modal('show');
			  $('.tooltip').popup('hide all');
			  
		  },
		  onSuccess: function(data) { 		
			  $('#'+key+">.content").html(data);
			  $('#'+key+' a[data-tab]').on('click', function () { $('#'+key).modal('refresh'); });
			  //$('#'+key).modal('show');
			  $('.tooltip').popup();
		  },
		  onComplete: function() {
			  //$('#'+key).transition('pulse');
		  }
		});

	} else {
		$('#'+key).modal('refresh');
		$('#'+key).modal('show');
	}	
}


var xhr = null;

function call_semantic_table(list_id,filter_type, filter_name, filter_value) {	
	
	if( xhr != null ) {
        xhr.abort();
        xhr = null;
	}
	
	xhr = $.ajax( {
		url      : smart_form_wp+"call_table.php",
		data     : ({list_id: list_id, filter_type : filter_type, filter_name:filter_name, filter_value:filter_value }),
		type     : 'POST',
		dataType : 'html',
		beforeSend: function () {
			$('.tooltip').popup('hide all');
			$('.loader').html('<div class="ui active loader large"></div>');
		},
		success  : function(data) {
			$('.loader').html('');	
			//$('.smart_list#'+list_id).replaceWith(data);
			$('.smart_list#'+list_id).replaceWith(data);
			$('.tooltip').popup();
		}
	});
}

var xhr2 = null;

function table_reload(id,loader) {

//	if( xhr2 != null ) {
//        xhr2.abort();
//        xhr2 = null;
//	}
	
	//Wenn keine ID definert ist wird die erste genommen
	if (!id) { var id = $('.smart_list').attr('id'); }
	
	xhr2 = $.ajax( {
		url      : smart_form_wp+"call_table.php",
		global   : false,
		data     : ({list_id: id }),
		type     : 'POST',
		dataType : 'html',
		beforeSend: function () {
			$('.tooltip').popup('hide all');
		//	if(currentRequest != null) { currentRequest.abort(); }
			if (!loader) $('.loader').html('<div class="ui active inverted dimmer large"><div class="ui text loader">Loading</div></div>');
		},
		success  : function(data) {
			$('.loader').html('');
			$('.smart_list#'+id).replaceWith(data);
			 $('.tooltip').popup();
		  
			
			//Schließt nach laden der Tabelle alle modal	
			//$('.ui.modal').modal('hide');
			//Content entfernen - Wichtig, damit Form nicht aus dem Cache verwendet wird wegen Fomularabrage
			//$('.ui.modal>.content').html('');
			
		}
	});
}

function change_filter_button_class(id,set)  {
	$('.'+id).removeClass('active');
}

/*
 * Schnell - AJAX-Zugriff Bsp.: content = $.ssi_ajax({ url : 'pfad.php', data :('id':'1') });
 */
;( function(jQuery) {
	jQuery.ssi_ajax = function(settings) {
		settings = jQuery.extend( { url : '', data : '' }, settings);
		
		var url = settings.url;
		var data = settings.data;
		
		var arrayFromPHP = $.ajax( {
			url      : url,
			global   : false,
			async :false,
			type     : "POST",
			data     : data,
			dataType : "html"
		}).responseText;
		return arrayFromPHP;
	}
})(jQuery);
