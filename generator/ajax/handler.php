<?php
foreach ( $_POST as $key => $value ) {
	if ($value)
		$td .= "<tr><td>$key</td><td>$value</td></tr>";
}


// $output = "
// <div class='ui header'>Post</div>
// <table class='ui small celled striped very compact table'>
// <thead><tr><th>Key</th><th>Value</th></tr></thead>
// <tbody>$td</tbody>
// </table><br><br>";

echo "alert('submit success');";