<?php
include"header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Konaklayanlar</h1>
  <p class="mb-4">Otelimizde konaklayan müşterilerimiz aşağıda listelenmiştir.<a target="_blank" href=""></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Misafir Listesi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <thead>
            <tr>
              <th>Müşteri Adı</th>
              <th>Soyadı</th>
              <th>Tc No</th>
              <th>Tel No</th>
              <th>Oda No</th>
              <th>İslemler</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $kulsor=$db->prepare("SELECT * FROM musteri");
            $kulsor->execute(array());
            ?>
            <?php while ($kulcek = $kulsor -> fetch(PDO::FETCH_ASSOC)){ ?> 
              <?php  if ($kulcek['musteri_durum']==1) { 

                $odasor=$db->prepare("SELECT * FROM konaklayan,oda where konaklayan.oda_id = oda.oda_id and konaklayan.musteri_id = ?");
                $odasor->execute(array($kulcek['musteri_id']));
                $odacek = $odasor -> fetch(PDO::FETCH_ASSOC)
                ?>

                <tr>
                 <td><?php echo $kulcek['musteri_ad']; ?></td>
                 <td><?php echo $kulcek['musteri_soyad']; ?></td>
                 <td><?php echo $kulcek['musteri_tc']; ?></td>
                 <td><?php echo $kulcek['musteri_tel']; ?></td>
                 <td><?php echo $odacek['oda_no']; ?> </td>
                 <td>
                  <a href="musteri-duzenle.php?id=<?= $kulcek['musteri_id']; ?>" class="btn btn-warning btn-circle btn-lg">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="konaklama-duzenle.php?id=<?= $odacek['konaklayan_id']; ?>" class="btn btn-primary btn-circle btn-lg">
                    <i class="fas fa-home"></i>
                  </a>
                  <a href="kontrol/delete.php?i=<?php echo $kulcek['musteri_id'] ?>" class="btn btn-danger btn-circle btn-lg">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>

           <?php   } ?>

          <?php  } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include"footer.php";
?>