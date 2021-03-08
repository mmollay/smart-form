
<?php
header ( 'Content-Type: text/html; charset=UTF-8' );
if (ob_get_level () == 0)
	ob_start ();
for($i = 1; $i < 6; $i ++) {
	echo "<br> Line to show  $i";

	//echo str_pad('',4096)."\n";
	ob_flush ();
	flush ();
	sleep ( 1 );
}
echo "<br>Done.";


//ob_end_flush ();