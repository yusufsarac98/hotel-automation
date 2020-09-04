<?php
include"header.php";

$id = $_GET['id'];
$detay = $db->prepare("SELECT * FROM musteri WHERE musteri_id = ?");
$detay->execute(array($id));
$detay = $detay->fetch(PDO::FETCH_ASSOC);
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Müşteri Düzenle</h1>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
   </div>

      <div class="card-body">
 


 
 <form method="post" action="">

  <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri TC:</label> 
   <input type="text" name="musteri_tc" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Tc No..." value="<?php echo $detay['musteri_tc']; ?>"> 
   <small class="form-text text-muted">Müşterinin Tc Numarasını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Adı:</label> 
   <input type="text" name="musteri_ad" class="form-control" id="exampleInputEmail1" placeholder="Müşteri adı..." value="<?php echo $detay['musteri_ad']; ?>"> 
   <small class="form-text text-muted">Müşterinin Adını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Soyadı:</label> 
   <input type="text" name="musteri_soyad" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Soyadı..." value="<?php echo $detay['musteri_soyad']; ?>"> 
   <small class="form-text text-muted">Müşterinin Soyadını Giriniz</small> 
 </div>  

 <div class="form-group"> 
   <label for="exampleInputEmail1">Müşteri Telefonu:</label> 
   <input type="text"  name="musteri_tel" class="form-control" id="exampleInputEmail1" placeholder="Müşteri İletişim..." value="<?php echo $detay['musteri_tel']; ?>"> 
   <small class="form-text text-muted">Müşterinin Tel Numarasını Giriniz</small> 
 </div> 

 <select class="form-control" name="musteri_cinsiyet"> 
  <?php if($detay['musteri_cinsiyet'] == 0){ ?>
 <option value="0">Şuan Seçili: Kadın</option> 
  <?php }else{ ?>
 <option value="1">Şuan Seçili: Erkek</option> 
  <?php } ?>
   <option value="">Cinsiyet Seçiniz</option> 
   <option value="0">Kadın</option> 
   <option value="1">Erkek</option> </select></br>

   <div class="form-group"> 
    <label for="exampleInputEmail1">Müşteri Doğum Tarihi:</label> 
    <input type="text" name="musteri_dogum_t" class="form-control" id="exampleInputEmail1" placeholder="Müşteri Doğum Tarihi..." value="<?php echo $detay['musteri_dogum_t']; ?>"> 
    <small class="form-text text-muted">Müşterinin Doğum Tarihini Giriniz</small> 
  </div>  


  <input type="hidden" name="id" value="<?php echo $detay['musteri_id']; ?>">
  <button type="submit" name="duzenle" class="btn btn-primary">Müşteriyi Düzenle</button>
</form>

<?php if(isset($_POST['duzenle'])){
  $ad = $_POST['musteri_ad'];
  $soyad = $_POST['musteri_soyad'];
  $tc = $_POST['musteri_tc'];
  $telefon = $_POST['musteri_tel'];
  $cinsiyet = $_POST['musteri_cinsiyet'];
  $dogumtarihi = $_POST['musteri_dogum_t'];
  $id = $_POST['id'];

  $guncelle = $db->prepare("UPDATE musteri SET musteri_ad = ?,musteri_soyad = ?,musteri_tc = ?,musteri_tel = ?,musteri_cinsiyet = ?,musteri_dogum_t = ? WHERE musteri_id = ?");
  $guncelle->execute(array($ad,$soyad,$tc,$telefon,$cinsiyet,$dogumtarihi,$id));
  if ($guncelle) {
    header("Location:musteri.php");
    exit();
  }else{
     header("Location:musteri-duzenle.php?id=".$id."");
    exit();
  }


} ?>


</div>
</div>
</div>

</div>
<!-- /.container-fluid -->




<?php
include"footer.php";
?>