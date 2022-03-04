<?php 
include'db.php';
$resimcek=$db->prepare("SELECT * FROM resims");
$resimcek->execute();


if($resimcek->rowCount())
{
    foreach($resimcek as $row)
    ?>
<?php } 

else{

    echo "Henüz Hiç Fotograf Yok";
}
?>
<img src="<?php echo $row["resim"];?>" alt="" srcset="">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="upload.php" method="post" name="resimyukle" enctype="multipart/form-data"> 
<input type="file" name="resim"/><br/> 
<input type="text" name="aciklama"/><br/>
<input type="submit" name="gonder" value="Resim yükle"/>
</form>
</body>
</html>