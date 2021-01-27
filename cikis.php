<?php session_start(); ob_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
    
		session_destroy();//sessionları yok ettik
		echo "Çıkış yaptınız! Giriş sayfasına yönlendiriliyorsunuz !";//echo ile mesaj verdirdik.
		header("refresh:2; url=giris.php");//header ile ilgili sayfaya yönlendirdik.
	
	?>

</body>
</html>
<?php ob_end_flush(); ?>
