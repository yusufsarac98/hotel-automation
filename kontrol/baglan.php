<?php 
try
{
 $db=new PDO("mysql:host=localhost;dbname=otel;charset=utf8",'root','');
 //echo "baglantı başarılı";

} catch (PDOException $e) 
{
 echo $e-> getMessage();
}

ob_start();
?>

