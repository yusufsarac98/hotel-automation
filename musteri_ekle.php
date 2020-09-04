<?php
include"header.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Müşteri Kayıt Ekle</h1>
  
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
           lütfen Alanları doldurunuz boş kayıt yapılamaz
           <a class="alert-link" href="#"></a>.
         </div>

       <?php } elseif ($_GET['durum']=="basarili"){?>

        <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         Müşteri başarı ile kaydedildi
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
   <label for="exampleInputEmail1">Müşteri TC:</label> 
   <input type="text" name="musteri_tc" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Tc No..."> 
   <small class="form-text text-muted">Müşterinin Tc Numarasını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Adı:</label> 
   <input type="text" name="musteri_ad" class="form-control" id="exampleInputEmail1" placeholder="Müşteri adı..."> 
   <small class="form-text text-muted">Müşterinin Adını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Soyadı:</label> 
   <input type="text" name="musteri_soyad" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Soyadı..."> 
   <small class="form-text text-muted">Müşterinin Soyadını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Telefonu:</label> 
   <input type="text"  name="musteri_tel" class="form-control" id="exampleInputEmail1" placeholder="Müşteri İletişim..."> 
   <small class="form-text text-muted">Müşterinin Tel Numarasını Giriniz</small> 
 </div> 

 <select class="form-control" name="musteri_cinsiyet"> 
   <option value="">Cinsiyet Seçiniz</option> 
   <option value="0">Kadın</option> 
   <option value="1">Erkek</option> </select></br>

   <div class="form-group"> 
    <label for="exampleInputEmail1">Müşteri Doğum Tarihi:</label> 
    <input type="text" name="musteri_dogum_t" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Doğum Tarihi..."> 
    <small class="form-text text-muted">Müşterinin Doğum Tarihini Giriniz</small> 
  </div>  


  <input type="hidden" name="musteri_ekle">
  <button type="submit" class="btn btn-primary">Müşteriyi Kaydet</button>
</form>

</div>
</div>

</div>
<!-- /.container-fluid -->




<?php
include"footer.php";
?>