<?php 
session_start();
$input = $_SESSION['page_link']['demo_list'];
echo "Copy this link:<br>";
echo"<div class='ui fluid icon input focus'><input value='$input' onFocus='this.select()'></div>";
echo "<br><div class='ui label'>ctrl + c</div> =  Copy";
?>