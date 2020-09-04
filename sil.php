<?php 

  $id = $_GET["id"];

  $select = $db->prepare("select * from resimler where resim_id=?");
  $select->execute(array($id));
  $bul =  $select->fetch(PDO::FETCH_ASSOC); 
  
 
 
 
    $sil = $db->prepare("delete from resimler where resim_id=?");
	$ok = $sil->execute(array($id));
	
	if($ok){
		
		echo "<h2>Resim basarıyla silindi</h2>";
		
		header("refresh: 1; url=foto.php");
		
	}else {
		
	 echo "<h2>Resim silinirken bir hata olustu..</h2>";	
		
		
	}

?>