<?php ob_start(); ?>
<!doctype html>
<html><head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>


</head>

<body>

	<!--Menü -->

<div class="navbar navbar-fixed-top navbar-inverse">

	<div class="navbar-inner">
    
    	<div class="container">
        
        	<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
            </button>
        
        	<a href="index.php" class="brand">Globgi</a>
            
            <div class="collapse nav-collapse">
            
            	<ul class="nav pull-right">
                
                	<li><a href="index.php">Anasayfa</a></li>
                    <li><a href="hakkimizda.php">Hakkımızda</a></li>
                    <li><a href="kategoriler.php">Kategoriler</a></li>
                    <li><a href="iletisim.php">İletişim</a></li>
                
                </ul>
            
            </div>
        
        </div>
    
    </div>

</div>

    
<!-- Menu Son !-->

<!-- Hero Unit -->

	<div class="well-small myClass2"><!--orta kısmı düzenleyen div-->

		<div class="container myClass2"><!--içerik kısmındaki yazıların düzenli ve ortalı olarak görünmesini sağlayan div-->    
            
        	<?php
			
				include('baglanti.php');

				$kelime=$_POST['kelime'];
	
				$sqlcumlesi="Select * from tbl_paylasimlar where Baslik LIKE '%$kelime%'";
				$sql=mysql_query($sqlcumlesi);
				$say=mysql_num_rows($sql);
	
			if(empty($kelime)){
				
				echo "<font color='red'>Lütfen boş bırakmaın..</font>";
				header("Refresh: 3; url=index.php");
				
			}else{
				
				if($say>0){
					
					echo "<font color='#00CC33'>Toplam {$say} sonuç bulundu!</font><hr/>";
		
					for($i=0;$i<$say;$i++){
				
						$vericek=mysql_fetch_array($sql);
						
						$uzunluk=strlen($vericek['Paylasim']);
					$id=$vericek['Id'];
					$sinir=205;
					
					if($uzunluk>$sinir){

										
					echo "<header>
							<h3>".mb_substr($vericek['Baslik'],0,$sinir,"UTF-8")."</h3>
						</header>";
						
					echo "<p>".mb_substr($vericek['Paylasim'],0,$sinir,"UTF-8")."<a href='kategori.php?Id=$id'>[Devamı]</a></p>";
					
					}else{
					
						echo "<header>
							<h3>".$vericek['Baslik']."</h3>
						</header>";
						
					echo "<p>".$vericek['Paylasim']."<a href='kategori.php?Id=$id'>[Devamı]</a></p>";
						
					}
				
					}
		
				}else{
					
						echo "<font color='red'>Hiç sonuç bulunamadı!</font>";
						header("Refresh: 3; url=index.php");
					
					}
					
			}

?>
              
		</div>

<!-- Hero Unit SON -->


<!-- Footer -->

	<div class="navbar navbar-fixed-bottom navbar-inverse">
    
    	<div class="navbar-inner">
        
        	<div class="container">
            
            	<p class="pull-left p">Tüm Hakları Saklıdır © 2015 |<a style="color:white;" href="#" title="Profilim"> Sarven Yanık</a></p>
            
            </div>
        
        </div>
    
    </div>
    
<!-- Footer SON -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
