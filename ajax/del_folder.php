<?php 
session_start();
$dir = $_SESSION['upload_dir']; 
exec("rm -rf $dir ");
echo 'ok';
?>