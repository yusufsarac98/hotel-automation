<?php 
include 'baglan.php';

if(isset($_GET['i'])){
    $id = $_GET['i'];

    $musteri = $db->prepare("SELECT * FROM musteri WHERE musteri_id = ?");
    $musteri->execute(array($id));
    $musteri = $musteri->fetch(PDO::FETCH_ASSOC);

    $musterisil = $db->prepare("DELETE FROM musteri WHERE musteri_id = ?");
    $musterisil->execute(array($musteri['musteri_id']));

    if($musterisil){
        //MÜŞTERİ SİLİNDİĞİ ANDA DİĞER TABLOLARDA Kİ SİLME İŞLEMİ GERÇEKLEŞECEK
        $konaklamabilgi = $db->prepare("SELECT * FROM konaklayan WHERE musteri_id = ?");
        $konaklamabilgi->execute(array($musteri['musteri_id']));
        $konaklamabilgi = $konaklamabilgi->fetchAll(PDO::FETCH_ASSOC);

        foreach($konaklamabilgi as $konaklamabilgi){
            $konaklayansil = $db->prepare("DELETE FROM konaklayan  WHERE konaklayan_id = ? and musteri_id = ?");
            $konaklayansil->execute(array($konaklamabilgi['konaklayan_id'],$musteri['musteri_id']));

           


    }

    }

}

?>