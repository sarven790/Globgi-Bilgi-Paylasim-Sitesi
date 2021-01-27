<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

include('baglanti.php');

				$konu_id=$_POST['konu_id'];				
									$begendisonhit= $vericek["Begendim"]+1; // beğene basılırsa begendi +1 artacak 
									$guncelle = mysql_query("UPDATE tbl_yorumlar SET begendim = '$begendisonhit' WHERE YorumId =  '$konu_id'"); //hangi yazıdıysa o yazının begendi değerini güncelliyoruz.
									
									
								

?>

</body>
</html>