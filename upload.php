<?php
$db =new PDO("mysql:host=localhost;dbname=testsunucu;charset=utf8","root","");

if($_POST){
 
 if ($_FILES["resim"]["size"]<1024*1024*4){

     if ($_FILES["resim"]["type"]=="image/jpeg"){  

         $aciklama    =     $_POST["aciklama"];  
         $dosya_adi   =    $_FILES["resim"]["name"];

         $uret=array("cv","fg","th","lu","er");
         $uzanti=substr($dosya_adi,-4,4);
         $sayi_tut=rand(1,10000);

         $yeni_ad="yuklenenresimler/".$uret[rand(0,4)].$sayi_tut.$uzanti;


         if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
             echo 'Dosya başarıyla yüklendi.';

    


         $sorgu = $db->prepare("INSERT INTO resims SET resim=:resim,aciklama=:aciklama");
         $sorgu->execute(array(':resim'=> $yeni_ad,':aciklama'=>$aciklama));
         if($sorgu){
             echo 'Veritabanına kaydedildi.';
         }else{
             echo 'Kayıt sırasında bir sorun oluştu!';
         }
     }else{
         echo 'Dosya Yüklenemedi!';
     }
 }else{
     echo 'Dosya yalnızca jpeg formatında olabilir!';
 }
 }else{          
     echo 'Dosya boyutu 1 Mb ı geçmemeli!';
 }
}
?>