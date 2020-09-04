<?php
include"header.php";
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Konaklama Kayıt</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="btn-group" role="group" aria-label="Basic example"> 
            <a href="musteri_ekle.php"><button type="button" class="btn btn-secondary">Müşteri</button></a>
            <a href="oda_ekle.php"><button type="button" class="btn btn-secondary">Oda</button></a>
            <a href="kayit.php"><button type="button" class="btn btn-secondary">Kayıt</button></a>
            </div>
            <div class="card-body">
            </div> 

            <?php
      if ($_GET) {


        if ($_GET['durum']=="bos"){?>

          <div class="alert alert-danger alert-dismissable">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           lütfen Alnaları doldurunuz boş kayıt yapılamaz
           <a class="alert-link" href="#"></a>.
         </div>

       <?php } elseif ($_GET['durum']=="basarili"){?>

        <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         Kayıt başarı ile kaydedildi
         <a class="alert-link" href="#"></a>.
       </div>

     <?php } elseif ($_GET['durum']=="hata"){?>

      <div class="alert alert-danger alert-dismissable">
       <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
       form kaydedilirken hata oluştu..
       <a class="alert-link" href="#"></a>.
     </div>

   <?php }  }?>



            <form method="POST"action="kontrol/islem.php">

  <div class="form-group"> 
   <label for="exampleInputEmail1">Giriş Tarihi:</label> 
   <input type="text" name="konaklayan_kayit_t" class="form-control" id="exampleInputEmail1" placeholder="Giriş Tarihi..."> 
   <small class="form-text text-muted">Giriş Tarihini Giriniz</small> 
 </div>  


 <div class="col-md-3">
  <select class="form-control" name="oda_id"> 
    <?php 
    $odasor=$db->prepare("SELECT * FROM oda ORDER BY oda_id DESC");
    $odasor->execute(array()); ?>
    <option> Oda  Seçiniz</option> 
    <?php while ($odacek = $odasor -> fetch(PDO::FETCH_ASSOC)){  ?>
      <option value="<?php echo $odacek['oda_id'] ?>"><?php echo $odacek['oda_no'] ?></option> 
    <?php } ?>
  </select>
</div></br>

 <div class="form-group"> 
   <label for="exampleInputEmail1">Çıkış Tarihi:</label> 
   <input type="text" name="konaklayan_cikis_t" class="form-control" id="exampleInputEmail1" placeholder="Çıkış Tarihi..."> 
   <small class="form-text text-muted">Çıkış Tarihini Giriniz</small> 
 </div>  


 <div class="col-md-3">
  <select class="form-control" name="musteri_id"> 
    <?php 
    $musterisor=$db->prepare("SELECT * FROM musteri ORDER BY musteri_id DESC");
    $musterisor->execute(array()); ?>
    <option value=""> Müşteri  Seçiniz</option> 
    <?php while ($mustericek = $musterisor -> fetch(PDO::FETCH_ASSOC)){  ?>
      <option value="<?php echo $mustericek['musteri_id'] ?>"><?php echo $mustericek['musteri_ad'] ?></option> 
    <?php } ?>
  </select>
</div></br>

<input type="hidden" name="kaydolan_ekle">
<button type="submit" class="btn btn-primary">Kaydı oluştur</button>
</form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        



        <?php
        include"footer.php";
        ?>