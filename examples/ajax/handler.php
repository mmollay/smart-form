<?php
foreach ( $_POST as $key => $value ) {
	//$GLOBALS[$key] = $GLOBALS['mysqli']->real_escape_string ( $value );
	//if ($value)
		$td .= "<tr><td>$key</td><td>$value</td></tr>";
}

echo "
<div class='ui header'>Post</div>
<table class='ui small celled striped very compact table'>
<thead><tr><th>Key</th><th>Value</th></tr></thead>
<tbody>$td</tbody>
</table><br><br>";