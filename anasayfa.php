<?php ob_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
	
		$geldigi_sayfa = $_SERVER['HTTP_REFERER']; 
		header("location: $geldigi_sayfa");
	
	?>

</body>
</html>
<?php ob_end_flush(); ?>
