<?php session_start(); ob_start(); ?>
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
			
				$aylar=array(
 							'01'=>"Ocak",
 							'02'=>"Şubat",
 							'03'=>"Mart",
 							'04'=>"Nisan",
 							'05'=>"Mayıs",
 							'06'=>"Haziran",
 							'07'=>"Temmuz",
 							'08'=>"Ağustos",
 							'09'=>"Eylül",
 							'10'=>"Ekim",
 							'11'=>"Kasım",
 							'12'=>"Aralık"
 
 
 							);
            
				$userId=$_GET['Id'];
				$katid=$_GET['Id2'];
				
				?>
            
            </div>
		
        </div>
                          
            <div class="yorumlar">
            
            	<form method="post" action="">
                
                <fieldset> <legend>Cecap Yaz</legend>
            
            	<textarea name="cevap" rows="3" placeholder="Cevap yaz" style="width:700px; resize:none;"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" name="gonder" value="Gönder"/>
                                
 			</fieldset>
                    
					<?php
           				
						if($_SESSION['login']==true){
                
					$cevap=$_POST['cevap'];
					$gonder=$_POST['gonder'];					
					$id=$_GET['Id'];
					$paylasan=$_SESSION['kullanici_adi']." ".$_SESSION['kullanici_soyadi'];
					$tarih=@date("Y-m-d H:i:s");
					
				}else{
				
					$cevap=$_POST['cevap'];
					$gonder=$_POST['gonder'];					
					$id=$_GET['Id'];
					$paylasan="Misafir"." "."kullanıcı";
					$tarih=@date("Y-m-d H:i:s");
					
				}
					
					$sqlcumlesi="insert into tbl_yorumcevaplari values('','$id','$cevap','$paylasan','$tarih')";
					if($gonder){ 
					
						if(empty($cevap)){
							
								echo "<script>alert('Bu alan boş geçilemez')</script>";
							
							}else{
							
								$sql=mysql_query($sqlcumlesi) or die("<script>alert('Hata var!')</script>");
								
									header("Location: kategori.php?Id=$katid");
	
								}
								
								
								

					}
						
				?>
            </div>
            
            </form>
              
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
