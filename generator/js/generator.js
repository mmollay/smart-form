$(function () {
	$(".draggable").draggable({
	        helper: "clone",
	        cursor     :'move',
	        connectToSortable: ".sortable",
	        start: function( event, ui ) {
	            // Add new class for get id inner sortable
	            $('.draggable').removeClass('move_draggable');
	            $(this).addClass('move_draggable');
	            $(this).addClass('hover_box_blue'); // Color style
	            $('.sortable').addClass('show_sortable'); // Color style
	        },
	        stop: function (event, ui) {
	            $('.sortable').removeClass('show_sortable'); // Color
	            
	        }
	});

	$('#sticky').sticky({ pushing: true, offset : 43, context: '#context_form' });

	$("#set_default").click( function() {
	    call_form('set_default');
	    call_sortable();
	    call_inline_edit();
	});
	call_form();	
});


// Call sortable for input-fields
function call_sortable() {

//    $("#generator_form").hover(
//	function () { $('.sortable').addClass('hover_sortable'); },
//	function () { $('.sortable').removeClass('hover_sortable');
//    })
    
    $(".sortable").sortable({
            connectWith: ".sortable" ,
            items:'.row_field',
            opacity: 0.6, 
            tolerance: 'pointer', 
            revert: true, 
            handle : '.button.move',
            placeholder: "ui-state-highlight",
            forcePlaceholderSize: true,
            start : function(event,ui) { 
		// $( ".row_field" ).addClass('hover_box_blue');
        	$('.sortable').addClass('show_sortable');
            },
            stop: function(event,ui){
        	// $( ".row_field" ).removeClass('hover_box_blue');
        	$('.draggable').removeClass('hover_box_blue');
        	//$('.sortable').addClass('hover_sortable'); 
        	$('.sortable').removeClass('show_sortable');
        	$('.sortable').removeClass('hover_box_blue'); // Color style
        	
            },
            update: function(event, ui){
        	
        	// layer_id and position
    	        id_position = this.id;
    	        	
    	        // Add new field, if is new
		if (ui.item.hasClass("draggable")) {
			var type = $(".move_draggable").attr('id');
			$.ajax( {
			    url :"ajax/new_field.php",
			    global :false,
			    async :false,
			    data :( { type:type, id_position: id_position }),
			    type :"POST",
			    dataType :"html",
			    success  : function(data) {
				// change the content
				// from draggable
				ui.item.replaceWith(data);
				call_sortable();
			    }
			});		
			
		}
		
		$.ajax({ url: "ajax/save_order.php", data : $(this).sortable('serialize'), type: "POST", dataType: 'script'});
		call_inline_edit();
            }
    });
    $( ".sortable" ).disableSelection();
}  

// Load Editbuttons & Quickedit for Layers
function call_inline_edit() {
    	
    	// Show Button if mouse hover for edit field
	$('.row_field').hover(function () {
		var id = this.id;
		$('.button_field').remove();
		// if (Cookies.get("edit_modus") == 'on') {
		$(this).addClass('hover_box_blue');
		// $(this).css({"background-color":"#EEE","outline":"1px dashed
		// siver"});
		$(this).prepend(`
		<div class = 'button_field ui buttons' style='position:absolute; right:16px; z-index:1000;'>
		<a class=' ui icon mini button' data-tooltip='Edit field' onclick=edit_field('`+id+`')><i class='icon edit'></i></a>
		<a id='div`+id+`' class=' ui icon mini button move' data-tooltip='Move field'><i class='icon move'></i></a>
		<a onclick=remove_field('`+id+`') class=' ui icon mini button' data-tooltip='Remove field'><i class='icon trash'></i></a>
		</div>
		`);
		// }
	},function () {
	    	$(this).removeClass('hover_box_blue');
		$('.button_field').remove();
		$('.draggable,.sortable').removeClass('hover_box_blue');
		
	});
	
	// Quick-Edit (Layer)
	$('.label').on('click', function () {
	    
	    // if (Cookies.get("edit_modus") != 'on') {return}
		id = this.id;
		var edit = $(this).quickEdit('create', {
        	id : id,
		blur: false,
                checkold: true,
                space: false,
                showbtn: false,   
                tmpl: '<span qe="scope"><span><input style="border:0px; color:blue;" type="text" qe="input">',
                submit: function (dom, newValue,id) {
                $.ajax( {
	    		url :"ajax/save_label.php",
	    		global :false,
	    		async :false, // do not remove
	    		data :( {  id : id, value : newValue }),
	    		type :"POST",
	    		dataType :"html",
	    		success  : function(data) { dom.text(newValue); }
                });	
            }
        });
        $(this).after(edit);
        $('input', edit)[0].select();
    });

}

// Remove Field
function remove_field(id) {
    $.ajax( {
	url :"ajax/remove_field.php",
	global :false,
	async :false, // do not remove
	data :( {  id : id }),
	type :"POST",
	dataType :"script",
	
     });	
}


// Edit Field
function edit_field(id) {
    $.ajax( {
	url :"ajax/edit_field.php",
	global :false,
	async :false, 
	data :( {  id : id }),
	type :"POST",
	dataType :"html",
	beforeSend : function() { 
	    $('#edit_form').modal('show'); 
	    $('#edit_form > .content').html('<div class=\'ui segment\'><br><br><br><br><br><br><div class=\'ui active inverted dimmer\'><div class=\'ui text loader\'>...loadin</div></div><br><br><br><p></p></div>'); 
	},	
	success  : function(data) { $('#edit_form > .content').html(data);  }
  });	
}

// Check field is empty
function  check_empty_form () {
    if (!$('.formular').length > 0) $('.sortable_formular').html("<div id='empty_field' align=center style='border:1px dashed silver'><br>Drag in the desired element.<br><br></div><br>");
}

// Call Form
function call_form(action){
    $.ajax( {
	    url :"ajax/call_form.php",
	    global :false,
	    async :false,
	    data :( { action : action }),
	    type :"POST",
	    dataType :"html",
	    success  : function(data) {
		$('#generator_form').html(data);
		call_sortable();
		call_inline_edit();
		call_code();
	    }
	});		
}

// Call Form
function call_code(){
    	$.ajax( {
	    url :"ajax/call_code.php",
	    global :false,
	    async :false,
	    type :"POST",
	    dataType :"script",
	});		
}
