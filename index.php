<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<?php include('baglanti.php'); ?>

</head>

<body>
	<!--Menü -->

<div class="navbar navbar-fixed-top navbar-inverse"><!-- menü kısmını içeren ana div -->

	<div class="navbar-inner"><!-- menünün içeriğini kapsayan ana div -->
    
    	<div class="container"><!-- menü içeriğinin daha ortalı ve düzgün şekilde görünmesini sağlayan div -->
        
        	<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- responsive menü icon'unu kapsayan div -->
            
            <span class="icon-bar"></span><!-- responsive icondaki çizgiler -->
            <span class="icon-bar"></span><!-- responsive icondaki çizgiler -->
            <span class="icon-bar"></span><!-- responsive icondaki çizgiler -->
            
            </button>
        
        	<a href="index.php" class="brand">Globgi</a><!-- logonun bulunduğu div -->
            
            <div class="collapse nav-collapse"><!-- menü linklerini barındıran ana div -->
            
            	<ul class="nav pull-right">
                
                	<li class="active"><a href="index.php">Anasayfa</a></li><!--Anasayfa linki-->
                    <li><a href="hakkimizda.php">Hakkımızda</a></li><!--Hakkımızda linki-->
                    <li><a href="kategoriler.php">Kategoriler</a></li><!--Kategoriler linki-->
                    <li><a href="iletisim.php">İletişim</a></li><!--İletişim linki-->
                
                </ul>
            
            </div>
        
        </div>
    
    </div>

</div>

    
<!-- Menu Son !-->

<!-- Hero Unit -->

	<div class="hero-unit myClass"><!--üst yazı kısmı ana divi-->

		<div class="container"><!--üst yazı içeriğinin daha düzgün ve ortalı gözükmesini sağlayan div-->
        
        	<h2>Globgi</h2> <p>Cupcake ipsum dolor sit amet gingerbread ice cream. Sugar plum wafer tootsie roll bonbon candy canes marshmallow cookie. Sweet roll apple pie cookie cake. Bonbon sweet muffin sugar plum wafer cookie jelly-o marzipan. Jelly lollipop liquorice brownie sweet sweet roll unerdwear.com chocolate cake liquorice. Candy canes chupa chups jelly-o brownie bear claw. </p>
        
        </div>

</div>

<!-- Hero Unit SON -->

<!-- Arama -->
    
<div class="container"><!--arama kısmının daha düzgün ve ortalı gözükmesini sağlayan div-->
    
  <div class="span1"></div> <div class="span1"></div> <div class="span1"></div><div class="span0.5"></div>
  <!--arama kısmını ortalamak için kullanılan span divleri-->
                
        <div class="span4">

		<form class="form-search" action="arama.php" method="post"><!--arama formu classı-->
        
        	<div class="input-append"><!--arama formu divi-->
            
           	  <input type="text" name="kelime" id="text" placeholder="Konu arayın.." class="span2 search-query"/><!--arama text alanı-->
                <button type="submit" class="btn btn-success"><i class="icon-search icon-white"></i></button><!--iconlu arama butonu-->
            
            </div>
            
        
        </form>
        
        	
        
        </div>  
        
        <!--form textinin altındaki yazıları ortalamak için kullanılan span divleri-->
                  
        	<div class="span1"></div> <div class="span1"></div> <div class="span1"></div><div class="span0.5"></div>  
        
       <div class="ortala2"> <div class="row-fluid">
        
       	  <div class="span1 offset1"></div>
          
   		  <div class="span4 offset4"><div class="span1 offset1"></div><div class="span1 offset0.5"></div>
            
           	<div class="boyutText"><a href="giris.php" title="Giriş">Giriş </a>|<a href="kayit.php" title="Kayıt"> Kaydol</a></div>
            <!--yazı fontlarını ayarlayan div-->
            
            </div>
       
    </div>
      </div>  
</div>
    
<!-- Arama SON -->

<!-- Alt Kısım -->

	<div class="ortala"><!--en altta yer alan divleri ortalamak için kullanılan ana div-->
    
    	<div class="span4"><!--span div-->
        
        	<ul class="nav nav-list well-small well"><!--son ekenenler kısmı-->
            
            	<li class="nav-header">Son Eklenenler</li>
                <li class="divider"></li>
                <?php
                
					$sqlcumlesi="Select * from tbl_paylasimlar order by Id desc limit 0,5";
					$sql=mysql_query($sqlcumlesi);

					for($i=0;$i<5;$i++){
					
						$satir=mysql_fetch_array($sql);
						
						$uzunluk=strlen($satir['Baslik']);
						$id=$satir['Id'];
						$sinir=20;
					
					if($uzunluk>$sinir){

						echo "<li><a href='kategori.php?Id=$id'>".mb_substr($satir['Baslik'],0,$sinir,"UTF-8")."..</a></li>";	

						}else{
						
							echo "<li><a href='kategori.php?Id=$id'>".mb_substr($satir['Baslik'],0,$sinir,"UTF-8")."</a></li>";
							
						}
					
					}
					
					?>
                            
            </ul>
        
        </div>
        
        <div class="span4"><!--span div-->
        
        	<ul class="nav nav-list well-small well"><!--başlıca kategoriler kısmı-->
            
            	<li class="nav-header">Başlıca Kategoriler</li>
                <li class="divider"></li>
                <?php
                
					$sqlcumlesi="Select * from tbl_kategoriler";
					$sql=mysql_query($sqlcumlesi);
					
					for($i=0;$i<5;$i++){
					
						$satir=mysql_fetch_array($sql);
						
						$id=$satir['Id'];
						
						echo "<li><a href='kategoriler.php'>".$satir['KategoriAdi']."</a></li>";	
						
					}
				
				?>
                            
            </ul>
        
        </div>
        
     </div>
    
<!-- Alt Kısım SON -->

<!-- Footer -->

	<div class="navbar navbar-fixed-bottom navbar-inverse"><!--footer kısmını iceren ana div-->
    
    	<div class="navbar-inner"><!--footer içeriğini kapsayan ana div-->
        
        	<div class="container"><!--footer içerisindeki yazıların daha düzgün ve ortalı gözükmesini sağlayan div-->
            
            	<p class="pull-left p">Tüm Hakları Saklıdır © 2015 |<a style="color:white;" href="profilgiris.php?Id=1" title="Profilim"> Sarven Yanık</a></p>
            
            </div>
        
        </div>
    
    </div>

<!-- Footer SON -->

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>