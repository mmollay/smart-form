<?php 
session_start();
$dir = $_SESSION['upload_dir']; 
$name = $_POST['name'];
$id = $_POST['id'];

exec("rm '$dir$name' ");
exec("rm '$dir"."thumbnail/$name' ");
echo 'ok';
