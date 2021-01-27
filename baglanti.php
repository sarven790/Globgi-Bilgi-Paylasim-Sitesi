<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
		
		$baglanti=@mysql_connect("localhost","root","123") or die("Sunucuya bağlanamadı !"); //mysql bağlantısı
		$db=@mysql_select_db("globgi",$baglanti) or die("Veritabanına bağlanamadı !"); //veritabanı (database) bağlantısı
	
	?>

</body>
</html>
