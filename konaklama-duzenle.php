<?php
include"header.php";

$detay = $db->prepare("SELECT * FROM konaklayan,oda,musteri WHERE musteri.musteri_id = konaklayan.musteri_id and konaklayan.oda_id = oda.oda_id and konaklayan.konaklayan_id = ?");  
$detay->execute(array($_GET['id']));
$detay = $detay->fetch(PDO::FETCH_ASSOC);

$odalar = $db->prepare("SELECT * FROM oda WHERE oda_id != ?");
$odalar->execute(array($detay['oda_id']));
$odalar = $odalar->fetchAll(PDO::FETCH_ASSOC);

$musteriler = $db->prepare("SELECT * FROM musteri WHERE musteri_id != ?");
$musteriler->execute(array($detay['musteri_id']));
$musteriler = $musteriler->fetchAll(PDO::FETCH_ASSOC);



?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Konaklama Kayıt</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
           </div>
            <div class="card-body">
                       <?php
     

        if (isset($_GET['durum']) and $_GET['durum']=="bos"){ ?>

          <div class="alert alert-danger alert-dismissable">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           lütfen Alnaları doldurunuz boş kayıt yapılamaz
           <a class="alert-link" href="#"></a>.
         </div>

       <?php } elseif (isset($_GET['durum']) and $_GET['durum']=="basarili"){?>

        <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         Kayıt başarı ile kaydedildi
         <a class="alert-link" href="#"></a>.
       </div>

     <?php } elseif (isset($_GET['durum']) and $_GET['durum']=="hata"){?>

      <div class="alert alert-danger alert-dismissable">
       <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
       form kaydedilirken hata oluştu..
       <a class="alert-link" href="#"></a>.
     </div>

   <?php }  ?>



            <form method="POST"action="">


 <div class="col-md-3">
  <select class="form-control" name="musteri"> 
     <option value="<?php echo  $detay['musteri_id']; ?>">Şuan Seçili: <?php echo  $detay['musteri_ad']." ".$detay['musteri_soyad']; ?></option>
     <?php foreach ($musteriler as $musteriler) { ?>
      <option value="<?php echo $musteriler['musteri_id']; ?>"><?php echo $musteriler['musteri_id']; ?></option>
     <?php } ?>
  </select>
</div></br>

  <div class="form-group"> 
   <label for="exampleInputEmail1">Giriş Tarihi:</label> 
   <input type="text" name="konaklayan_kayit_t" class="form-control" id="exampleInputEmail1" placeholder="Giriş Tarihi..." value="<?php echo $detay['konaklayan_kayit_t']; ?>"> 
   <small class="form-text text-muted">Giriş Tarihini Giriniz</small> 
 </div>  



 <div class="col-md-3">
  <select class="form-control" name="oda_id"> 
     <option value="<?php echo  $detay['oda_id'] ?>">Şuan Seçili: <?php echo  $detay['oda_no'] ?></option>
     <?php foreach ($odalar as $odalar) { ?>
      <option value="<?php echo $odalar['oda_id']; ?>"><?php echo $odalar['oda_no']; ?></option>
     <?php } ?>
  </select>
</div></br>

 <div class="form-group"> 
   <label for="exampleInputEmail1">Çıkış Tarihi:</label> 
   <input type="text" name="konaklayan_cikis_t" class="form-control" id="exampleInputEmail1" placeholder="Çıkış Tarihi..." value="<?php echo $detay['konaklayan_cikis_t']; ?>"> 
   <small class="form-text text-muted">Çıkış Tarihini Giriniz</small> 
 </div>  

<br>

<input type="hidden" name="id" value="<?php echo  $detay['konaklayan_id']; ?>">
<button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
</form>
  <?php 
  if (isset($_POST['guncelle'])) {
    $giristarih = $_POST['konaklayan_kayit_t'];
    $cikistarih = $_POST['konaklayan_cikis_t'];
    $oda = $_POST['oda_id'];
    $musteri = $_POST['musteri'];
    $id = $_POST['id'];
    $guncelle = $db->prepare("UPDATE konaklayan SET konaklayan_kayit_t = ?,konaklayan_cikis_t = ?,musteri_id = ?,oda_id = ? WHERE konaklayan_id = ?");
    $guncelle->execute(array($giristarih,$cikistarih,$musteri,$oda,$id));
    if($guncelle){
      header("Location:musteri.php");
      exit();
    }else{
      header("Location:konaklama-duzenle.php?id=".$id."");
      exit();
    }
  }

   ?>



            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        



        <?php
        include"footer.php";
        ?>