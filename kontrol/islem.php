<?php 
include 'baglan.php';
if (isset($_POST['musteri_ekle'])){
 if (trim($_POST['musteri_tc']) == "" || trim($_POST['musteri_ad'])=="" || trim($_POST['musteri_soyad'])=="" || trim($_POST['musteri_tel'])=="" ||trim($_POST['musteri_dogum_t'])=="" ) {
  header("location:../musteri_ekle.php?durum=bos");
  exit;

 }else{

  $musteriekle=$db->prepare("INSERT INTO  musteri SET
   musteri_tc=:tc,
   musteri_ad=:ad,
   musteri_soyad=:soyad,
   musteri_tel=:tel,
   musteri_dogum_t=:dtarih,
   musteri_cinsiyet=:cinsiyet
   ");
  $ınsert= $musteriekle -> execute(array(
   /*sol taraf yukarda belirttigin takma isim / sag taraf ise gönderdigin kaydet postu */
   'tc' => htmlspecialchars($_POST['musteri_tc']),
   'ad' => htmlspecialchars($_POST['musteri_ad']),
   'soyad' => htmlspecialchars($_POST['musteri_soyad']),
   'tel' => htmlspecialchars($_POST['musteri_tel']),
   'dtarih' => htmlspecialchars($_POST['musteri_dogum_t']),
   'cinsiyet' => $_POST['musteri_cinsiyet']

  ));
  if ($ınsert) {
   header("location:../musteri_ekle.php?durum=basarili");
   exit;

  }else{
   header("location:../musteri_ekle.php?durum=hata");
   exit;

  }

 }

}

if (isset($_POST['oda_ekle'])){
    if (trim($_POST['oda_no']) == "" || trim($_POST['oda_kapasite'])=="" || trim($_POST['oda_ucret'])=="" ) {
     header("location:../oda_ekle.php?durum=bos");
     exit;
   
    }else{
   
     $musteriekle=$db->prepare("INSERT INTO  oda SET
      oda_no=:no,
      oda_kapasite=:kapasite,
      oda_ucret=:ucret
      
      ");
     $ınsert= $musteriekle -> execute(array(
      
      'no' => htmlspecialchars($_POST['oda_no']),
      'kapasite' => htmlspecialchars($_POST['oda_kapasite']),
      'ucret' => htmlspecialchars($_POST['oda_ucret'])
      
     ));
     if ($ınsert) {
      header("location:../oda_ekle.php?durum=basarili");
      exit;
   
     }else{
      header("location:../oda_ekle.php?durum=hata");
      exit;
   
     }
   
    }
   
   }

   if (isset($_POST['kaydolan_ekle'])){
    if (trim($_POST['musteri_id']) == "" || trim($_POST['oda_id'])=="" || trim($_POST['konaklayan_kayit_t'])=="" ||  trim($_POST['konaklayan_cikis_t'])=="" ) {
     header("location:../kayit.php?durum=bos");
     exit;
   
    }else{
   
     $kayitekle=$db->prepare("INSERT INTO  konaklayan SET
      musteri_id=:mid,
      oda_id=:odaid,
      konaklayan_kayit_t=:kayitt,
      konaklayan_cikis_t=:cikist
      
      ");
     $ınsert= $kayitekle -> execute(array(
      /*sol taraf yukarda belirttigin takma isim / sag taraf ise gönderdigin kaydet postu */
      'mid' => htmlspecialchars($_POST['musteri_id']),
      'odaid' => htmlspecialchars($_POST['oda_id']),
      'kayitt' => htmlspecialchars($_POST['konaklayan_kayit_t']),
      'cikist' => htmlspecialchars($_POST['konaklayan_cikis_t'])
      
     ));
     if ($ınsert) {
      $id=$_POST['musteri_id'];
      $mguncelle=$db->prepare("UPDATE musteri set
       musteri_durum=:durum,
       musteri_oda=:oda
   
       WHERE musteri_id= $id ");
      $update=$mguncelle->execute(array(
       'durum'=>1,
       'oda'=>$_POST['oda_id']
       
      ));
      $id=$_POST['oda_id'];
      $odaguncelle=$db->prepare("UPDATE oda set
       oda_durum=:durum
       WHERE oda_id= $id ");
      $update2=$odaguncelle->execute(array(
       'durum'=>1    
      ));
   
      header("location:../kayit.php?durum=basarili");
      exit;
   
     }else{
      header("location:../kayit.php?durum=hata");
      exit;
   
     }
   
    }
   
   }
?>