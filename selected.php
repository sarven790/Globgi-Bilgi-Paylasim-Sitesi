<?php include('baglanti.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<div class="controls">
    <form method="post" action="">
      <select size="1" class="select" name="altk">
      	<option value="---">Alt kategori</option>
        
        <?php
		
			$q = intval($_GET['q']);
			
        
			$vericek="Select * from tbl_altkategoriler where KategoriId='".$q."'";
			$sql=@mysql_query($vericek);
			$say=mysql_num_rows($sql);
			
			for($i=0;$i<$say;$i++){
			
			$satir=mysql_fetch_array($sql);
			
				echo "<option value='".$satir['AltId']."'>".$satir['AltKategoriAdi']."</option>";
			
			}
		
		?>
        
      </select>
      </form>
    </div>
  </div>
    
</body>
</html>