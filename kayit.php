<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<?php include('baglanti.php');//veritabanı bağlantısının gerçekleştirildiği sayfa ile bağlantı kurar. ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">

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
                
                	<li><a href="index.php">Anasayfa</a></li><!--Anasayfa linki-->
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

	<div class="hero-unit myClass3">

		<div class="container">
                
        </div>

</div>

<!-- Hero Unit SON -->

<!-- Kayıt -->
    
<div class="container">
    
  <div class="span1"></div> <div class="span1">
                
        <div class="span4">

		<form class="form-horizontal" method="post" action=""><!-- kayıt formu -->
  <div class="control-group">
    <div class="controls">
      <input type="text" class="yazi" name="kuladi" placeholder="Kullanıcı Adı" autocomplete="off"><!-- kullanıcı adı text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="text" class="yazi" name="soyadi" placeholder="Soyadınız" autocomplete="off"><!-- kullanıcı soyadı text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="password" title="önce [a-z] aralığında 4 harf, sonrada [0-9] aralığında 3 rakam giriniz !" class="yazi" name="sifre" id="inputEmail" placeholder="Şifre Girin" pattern="[a-z]{4}[0-9]{3}"><!-- şifre text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="password" class="yazi" name="sifretekrar" id="inputEmail" placeholder="Tekrar Şifre Girin"><!-- şifre tekrar text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="text" class="yazi" name="yeri" id="inputEmail" placeholder="Yaşadığınız Yer" autocomplete="off"><!-- yer text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="date" class="yazi" name="dtarihi" id="inputEmail"><i style="color:red;">(doğum tarihiniz)</i><!--doğum tarihi text alanı-->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="text" class="yazi" name="email" id="inputEmail" placeholder="E-mail" autocomplete="off"><!-- email text alanı -->
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      
      	<input type="radio" name="cinsiyet" value="erkek">&nbsp;Erkek &nbsp;&nbsp;&nbsp;<!-- erkek cinsiyet radio button kodu -->
        <input type="radio" name="cinsiyet" value="kiz">&nbsp;Kız<!-- kız cinsiyet radio button kodu -->
      
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      
  	<button type="submit" name="kayit" class="btn btn-success">Kaydol</button><!-- gönder butonu -->

                    
    </div>
  </div>
            
        
        </form>


        </div>  
 
    
  </div> 
   
</div>
    
<!-- Kayıt SON -->

<!-- Alt Kısım -->

	<div class="ortala">
    
    	
        
     </div>
    
<!-- Alt Kısım SON -->

<!-- Footer -->

	<div class="navbar navbar-fixed-bottom navbar-inverse"><!--footer kısmını iceren ana div-->
    
    	<div class="navbar-inner"><!--footer içeriğini kapsayan ana div-->
        
        	<div class="container"><!--footer içerisindeki yazıların daha düzgün ve ortalı gözükmesini sağlayan div-->
            
            	<p class="pull-left p">Tüm Hakları Saklıdır © 2015 |<a style="color:white;" href="#" title="Profilim"> Sarven Yanık</a></p>
            
            </div>
        
        </div>
    
    </div>

<!-- Footer SON -->

	<?php
    
		$adi=$_POST['kuladi']; //form kısmından post ile kullanıcı adı kısmına girilen veriyi çekiyor.
		$soyadi=$_POST['soyadi']; //form kısmından post ile kullanıcı soyadı kısmına girilen veriyi çekiyor.
		$sifre=$_POST['sifre']; //form kısmından post ile şifre kısmına girilen veriyi çekiyor.
		$sifretekrar=$_POST['sifretekrar']; //form kısmından post ile şifre tekrar kısmına girilen veriyi çekiyor.
		$yasadigiyer=$_POST['yeri']; //form kısmından post ile yaşadığın yer kısmına girilen veriyi çekiyor.
		$dtarihi=$_POST['dtarihi']; //form kısmından post ile doğum tarihi kısmına girilen veriyi çekiyor.
		$email=$_POST['email']; //form kısmından post ile e-mail kısmına girilen veriyi çekiyor.
		$cinsiyeti=$_POST['cinsiyet']; //form kısmından post ile cinsiyet kısmında tıklanan radio button'un value değerini çekiyor.
		
		if($_POST){
						
			if(empty($adi) || empty($soyadi) || empty($sifre) || empty($sifretekrar) || empty($yasadigiyer) || empty($dtarihi) || empty($email) || empty($cinsiyeti)){ //eğer veri girilmemişse

					echo "<script> alert('Lütfen veri giriniz !') </script>"; //echo ile javacript mesajı verdirdik.
			
			}else{ //eğer veri girilmişse
					
					if($sifre==$sifretekrar){ //eğer şifre ile şifre tekrar kısmımlarına aynı değerler girilnişse
						
							$sql="insert into tbl_uyeler values('','$adi','$soyadi','$sifre','$yasadigiyer','$dtarihi','$email','$cinsiyeti')";   //mysql sorgusu oluşturduk.
							
							@mysql_query($sql) or die("İşlem sırasında beklenmedik bir hata oluştu !!"); //mysql sorgusu yolladık
						
						}else{ //eğer eşit değilse
							
								echo "<script> alert('Lütfen Şifre kısımlarını aynı giriniz !') </script>";//echo ile javacript mesajı verdirdik.
							
							}
				
				}
				
		}
	
	?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>