<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">

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
                    <li class="active"><a href="kategoriler.php">Kategoriler</a></li>
                    <li><a href="iletisim.php">İletişim</a></li>
                
                </ul>
            
            </div>
        
        </div>
    
    </div>

</div>

    
<!-- Menu Son !-->

<!-- Hero Unit -->

	<div class="well-small myClass2"><!--orta kısmı düzenleyen div-->

		<div class="container"><!--içerik kısmındaki yazıların düzenli ve ortalı olarak görünmesini sağlayan div-->
            
            <ul style="margin-bottom:10px; list-style:none">
           	
            	<?php
				
				include('baglanti.php');
                
					$sqlcumlesi="Select * from tbl_kategoriler";
					$sql1=mysql_query($sqlcumlesi);
					
					$say=mysql_num_rows($sql1);
					
					for($i=0;$i<$say;$i++){
					
						$vericek=mysql_fetch_array($sql1);
						
						echo "<h5><li style='background-color:#E8E8E8; border:1px dashed silver;'>".$vericek['KategoriAdi']."</li></h5>";
								
								$sqlcumlesi2="Select * from tbl_altkategoriler where KategoriId='".$vericek['KategoriId']."'";
								$sql2=mysql_query($sqlcumlesi2);
								
								$say2=mysql_num_rows($sql2);
								
								for($j=0;$j<$say2;$j++){
									
										$vericek2=mysql_fetch_array($sql2);
										
										$id=$vericek2['AltId'];
										
											echo "<li style='background-color:#F4F4F4; border:1px dotted silver; margin-left:15px; margin-top:10px'>►<a href='kategoriler2.php?Id=$id'>".$vericek2['AltKategoriAdi']."</a></li>";
											
											
									
									}
                    

					}
					
					
				
				?>
                 
              </ul>
            
            </div>
              
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


	<?php
    
		
		
	?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>