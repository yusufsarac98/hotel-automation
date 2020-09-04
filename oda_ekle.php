<?php
include"header.php";
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Oda Ekle</h1>
          
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
         Oda başarı ile kaydedildi
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
             <label for="exampleInputEmail1">Oda No:</label> 
             <input type="text" name="oda_no" class="form-control" id="exampleInputEmail1" placeholder="Oda No..."> 
             <small class="form-text text-muted">Oda Numarasını Giriniz</small> 
             </div>  

             <div class="form-group"> 
             <label for="exampleInputEmail1">Yatak Kapasite:</label> 
             <input type="text" name="oda_kapasite" class="form-control" id="exampleInputEmail1" placeholder="Yatak Kapasite..."> 
             <small class="form-text text-muted">Yatak Kapasitesini Giriniz</small> 
             </div>  

             <div class="form-group"> 
             <label for="exampleInputEmail1">Oda Ücreti:</label> 
             <input type="text" name="oda_ucret"class="form-control" id="exampleInputEmail1" placeholder="Oda Ücreti..."> 
             <small class="form-text text-muted">Oda Ücretini Giriniz</small> 
             </div>  
             
             <input type="hidden" name="oda_ekle">
            <button type="submit" class="btn btn-primary">Odayı Kaydet</button>
             </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        



        <?php
        include"footer.php";
        ?>