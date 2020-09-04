<?php 

   if($_FILES){
	   
	  
       $maxBoyut       = 70000000;
	   $dosyaUzantisi  = substr($_FILES["dosya"]["name"],-4,4);
	   $dosyaAdi       = rand(1,99999).$dosyaUzantisi;
	   $dosyaYolu      = "dosya/".$dosyaAdi;
	   
	   
	     if($_FILES["dosya"]["size"]>$maxBoyut){
			 
			 echo "<h2>Resim boyutu 700kb'dan yuksek olamaz...</h2>";
			 header("Refresh: 1; url=foto.php");
		 }else {
			 
			 
			 $dosya = $_FILES["dosya"]["type"];
			 
		 if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif" || $dosya == "application/zip"){
			 
			 
			 if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){
				 
				 
				 $tasi = move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
				 
				 $kayit = $db->prepare("insert into resimler set  
				 
				               resim_adi=?,
							   resim_turu=?,
							   resim_size=?
				 
				 ");
				 
				 $resimTuru = $_FILES["dosya"]["type"];
				 $resimSize = $_FILES["dosya"]["size"];
				 
				 $kayit->execute(array($dosyaYolu,$resimTuru,$resimSize));
				 
				 if($tasi){
					 
					echo "<h2>Resim basarıyla yuklendi...</h2>";
                  
                    header("Refresh: 1; url=foto.php");			  
					 
				 }else {
					 
					 echo "<h2>Resim tasınırken bir hata olustu...</h2>";
					 header("Refresh: 1; url=foto.php");
					 
				 }
				 
				 
			 } else {
				 
				 echo "<h2>Resim tasınırken bir hata olustu...</h2>";
				 header("Refresh: 1; url=foto.php");
			 }
			 
			 
		 }else {
			 
			 
			echo "<h2>Resim formati sadece jpg,png yada gif formatinda olmalıdır...</h2>"; 
			header("Refresh: 1; url=foto.php"); 
			 
		 }
			 
			 
		 }
	   
	  
	   
   }else {
	   
	    ?>  
		
		
		<div class="dosya"> 
		<h2>RESİM YÜKLE..</h2>
		<form action="" method="post" enctype="multipart/form-data"> 
		<input  class="btn btn-outline-primary" type="file" name="dosya" />
		<button  type="submit">YÜKLE</button>
		
		</form>
		</div>
		

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Resimler</h6>
            </div>
            <div class="card-body">
            <div class="row">
 <div class="col-md-12">

  <div style="display: flex; flex-wrap: wrap;">
		<?php
		
		   
		    $resim = $db->prepare("select * from resimler");
			$resim->execute(array());
			$d = $resim->fetchAll(PDO::FETCH_ASSOC); 
		 
		     
				   
				    
     
     
	  foreach($d as $m){ ?>
				 <figure class="col-md-4">
				  
				   
				   <img src="<?php echo $m["resim_adi"];?>"width="350" height="200" alt="" /> <br/>
				   <a class="btn btn-outline-primary" href="?do=sil&id=<?php echo $m["resim_id"];?>">SİL</a> &nbsp; 
				   <a class="btn btn-outline-primary"  href="?do=duzenle&id=<?php echo $m["resim_id"];?>">DEĞİŞTİR</a>  
				  
				  
				   
				   
 

     </figure>
				 <?php
				 
			 }
	   
   } 
?>
</div>
  </div>

 </div>
</div>
</div>