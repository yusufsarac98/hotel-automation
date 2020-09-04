
<?php
include"header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Oda Listesi</h1>
          <p class="mb-4"> Mavi renk DOLU, Turuncu renk BOŞ odaları temsil etmektedir.
          <a target="_blank" href=""></a></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Odalar</h6>
            </div>
            <div class="card-body">
            <div class="row">
            <?php

$odasor=$db->prepare("SELECT * FROM oda");
$odasor->execute(array());



while ($odacek = $odasor -> fetch(PDO::FETCH_ASSOC)) {  
  $odakontrol = $db->prepare("SELECT * FROM konaklayan WHERE oda_id = ?");
  $odakontrol->execute(array($odacek['oda_id']));
  $odakontrol = $odakontrol->rowCount();

  ?>


 
<?php if($odakontrol > 0){ ?>
    <div class="col-lg-3 mb-4">
      <div class="card bg-primary text-white shadow">
        <div class="card-body">
          <?php echo $odacek['oda_no']; ?>
          <div class="text-white-50 small">Numaralı odamız doludur</div>
        </div>
      </div>
    </div>
<?php }else{ ?>
  

    <div class="col-lg-3 mb-4">
      <div class="card bg-warning text-white shadow">
        <div class="card-body">
           <?php echo $odacek['oda_no']; ?>
          <div class="text-white-50 small">Numaralı odamız müsaittir</div>
        </div>
      </div>
    </div>
    <?php
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