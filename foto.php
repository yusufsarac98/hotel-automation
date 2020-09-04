<?php ob_start();?>
<?php
include"header.php";
?>
<!DOCTYPE HTML>
<html lang="en-US">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css"> 
	
	
	.dosya {
		
		border:1px solid #ddd;
		text-align:center;
		margin:5px;
		padding:5px;
		
	}
	
	.dosya h2 {
		
		margin:5px;
		padding:10px;
		
	}
	.dosya button {
		
		border:1px solid #ddd;
		font-size:18px;
		width:120px;
		height:35px;
		border-radius:5px;
		cursor:pointer;
		
	}
	
	</style>
</head>
<body>
	<?php  
	
	include("kontrol/baglan.php");
	
	 $do = @$_GET["do"];
	
	    switch ($do) {
			
			
			case "sil":
			include("sil.php");
			break;
			
			case "duzenle":
			include("duzenle.php");
			break;
			
			default:
			include("yukle.php");
			break;
			
			
		}
	
	?>
	<?php
include"footer.php";
?>
</body>
</html>
<?php ob_end_flush();?>