
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Smart - List - Example</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
<script src="../jquery/jquery.min.js"></script>
<script src="../semantic/dist/semantic.min.js"></script>
<script>
$(document).ready( function() {
	$('.segment')
	  .visibility({
	    continuous: true,	 
	    once: false,
	    // update size when new content loads
	    observeChanges: true,
	    // load content on bottom edge visible
	    onBottomVisible: function() {
		
		$.ajax( {				
			url :"inc/fake_content.php",
			global   : false,
			type     : "POST",	
			dataType : "html",
			beforeSend: function () { $('#scroll_loader').addClass('active');  },
			success:    function(data){  
				$(".segment").append(data);
				$('#scroll_loader').removeClass('active');  
			},
		});
	    }
	  });
});
</script>
</head>
<body>
	<br><div class="ui container">
		<div class="ui demo segment">
			<h3 class="ui dividing center aligned header">Infinite Scroll Example</h3>
			<p></p>
			<div style="border: 1px solid red; height: 100px;"></div>
			<div class="ui divider"></div>
		</div>
		<div id='scroll_loader' class="ui centered inline loader "></div>
	</div>
	</div>
</body>
</html>