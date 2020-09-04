<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "otel";


    //Yukarıda belirtilen veritabanına bağlan. Her iki halde veritabanı olacak. Ya önceden vardı ya da yeni oluşturuldu.
    $conn = new PDO("mysql:host=$localhost; dbname=$otel", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Silinecek verinin id-sini değişkene set ediyoruz.
    $degisken = 90;

    //prepare methodu ile insert sorgumuzu yazıyoruz fakat değerler yerine gerçek değerleri yazmıyoruz
    $stmt=$conn->prepare("DELETE FROM isimler WHERE id=:id");
    $result=$stmt->execute([
        ":id" => $degisken
    ]);
    
    echo "İşlem başarıyla gerçekleştirildi";

?>