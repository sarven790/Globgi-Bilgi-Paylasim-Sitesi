<?php session_start(); /*session başlatır.*/ ob_start(); /*header komutunun çalışabilmesi için başlatıldı.*/ ?>
<?php if(isset($_SESSION['login'])){/*eğer session ile oturum açılmamışsa*/ header("Location: profilben.php");/*header ile ilgili sayfaya yönlendirdik.*/ }else{//eğer kullanıcı oturum açmışsa  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {/*ana form divi classı*/
        max-width: 300px; 
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
		margin-top:30px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {/*üç div class'ı için geçerli css komutu*/
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {/*text ve password alanları için geçerli css komutu*/
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">

</head>

<body>

<!-- Üye Girişi -->
    
<div class="container">
        
		<form class="form-signin" method="post" action="#"><!-- üye giriş formu -->
        <h2 class="form-signin-heading">Üye Girişi</h2>
        <input type="text" name="kuladi" required="" class="input-block-level" autocomplete="off" placeholder="Kullanıcı Adı"><!--kullanıcı adı text alanı-->
        <input type="password" name="sifre" required="" class="input-block-level" placeholder="Şifre"><!-- şifre text alanı -->
        <label class="checkbox"><!-- beni hatırla checkbox'ı -->
          <input type="checkbox" value="remember-me"> Beni Hatırla
        </label>
        <button class="btn btn-large btn-success" type="submit">Giriş</button>&nbsp;&nbsp;&nbsp;<a href="index.php">Geri Dön</a>
      </form><!-- gönder butonu kodu ve geri dön linki -->

</div>
    
<!-- Üye Girişi SON -->

<!-- Alt Kısım -->

	<div class="ortala">
    
    	
        
     </div>
    
<!-- Alt Kısım SON -->

	<?php 
	
		include('baglanti.php');//bağlantı.php ye bağlanabilmek için
	
		$gelen_kullanici_adi=$_POST['kuladi']; //form kısmından post ile kullanıcı adı kısmına girilen veriyi çekiyor.
		$gelen_kullanici_sifre=$_POST['sifre']; //form kısmından post ile şifre kısmına girilen veriyi çekiyor.
		
		if(empty($gelen_kullanici_adi) or empty($gelen_kullanici_sifre)){/*eğer kullanıcı adı ve şifre boş ise*/}else{
		//boş değil ise
		$kontrol=@mysql_query("Select * from tbl_uyeler where Adi='".$gelen_kullanici_adi."' and Sifre='".$gelen_kullanici_sifre."'");//mysql sorgusu ile uyeler tablosundaki ilgili veriler çekiliyor
		$sayi=mysql_num_rows($kontrol);//çekilen verilerin sayısı tutuluyor
		
		if($sayi!=0){//eğer sayı 0'a eşit değil ise
			
				$vericek=mysql_fetch_array($kontrol);//veriler dizi şeklinde çekiliyor.
				
				$_SESSION['login']="true";//session oturumunu açtık.
				$_SESSION['kullanici_id']=$vericek['Id'];//id satırındaki ilgili veriyi session'a eşitledik.
				$_SESSION['kullanici_adi']=$vericek['Adi'];//adi satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_soyadi']=$vericek['Soyadi'];//soyadi satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_sifre']=$vericek['Sifre'];//sifre satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_yasadigi_yer']=$vericek['YasadigiYer'];//yasadigiyer satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_dogum_tarihi']=$vericek['DogumTarihi'];//dogumtarihi satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_email']=$vericek['Email'];//e-mail satırındaki ilgili veriyi session'a eşitledik
				$_SESSION['kullanici_cinsiyet']=$vericek['Cinsiyet'];
								
				$myuserId=$_SESSION['kullanici_id'];//session id'mizi değişkene atadık.
				
				echo "<script> alert('Merhaba $gelen_kullanici_adi ! Profil sayfasına yönlendiriliyorsun..')";//echo ile javacript mesajı verdirdik.
				
				header("Location: profilgiris.php?Id=$myuserId");//header ile ilgili sayfaya yönlendirdik.
			
			}else{//eğer sayı sıfıra eşit değilse
				
					echo "<script> alert('Kullanıcı adı veya şifre yanlış !') </script>";//echo ile javacript mesajı verdirdik.
				
				}
				
		}
	
	 ?>

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php } ob_end_flush(); ?>
