<?php @session_start(); ob_start(); ?>
<!doctype html>
<html>
<title>Globgi</title>
<link rel="shortcut icon" href="img/logo.png" />
<head>
<meta charset="utf-8">


	<?php
		
		include('baglanti.php');    
		$userId=strip_tags(intval($_GET['Id']));// get metodu ile arama çubuğundaki id'yi çekip değişkene atadı.
		$uyeSorgula=@mysql_query("Select * from tbl_uyeler where Id='$userId'");//mysql sorgusu ile ilgi tablodan verileri çektik.
		$rowUyeSorgula=mysql_num_rows($uyeSorgula);//çekilen verilerin sayısı tutuluyor
		
		if($rowUyeSorgula!=0){//eğer sayı 0'a eşit değil ise
			
				$UyeRowFetch=mysql_fetch_array($uyeSorgula);//veriler dizi şeklinde çekiliyor.
				
				if($userId==$_SESSION['kullanici_id']){//eğer userid sessionla gelen id'ye eşitse
										
						header("Location: profilben.php");//header ile ilgili sayfaya yönderdirir.
					
					}else{//eğer userid'ye eşit değil ise
					
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
						
	?>
    
    	
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
                    <li><a href="kategoriler.php">Kategoriler</a></li>
                    <li><a href="iletisim.php">İletişim</a></li>
                
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

<!-- Profil Bilgileri -->
    
<div class="container">

   <div class="row">

      <div class="span4">
      
      <div class="solprofil">
      
         <img src="img/profile.png" class="img-circle"/>

			<h2><?php echo $UyeRowFetch['Adi']." ".$UyeRowFetch['Soyadi'];//echo ile veritabanından gelen verileri yazdırdık. ?></h2>
			
			<p>
   				<strong>Yaşadığı Yer: </strong>
   					<?php echo $UyeRowFetch['YasadigiYer'];//echo ile veritabanından gelen verileri yazdırdık. ?>
			</p>
			<p>
   				<strong>Doğum Tarihi:</strong>
  					 <?php $bol_date = explode("-",$UyeRowFetch['DogumTarihi']);echo $bol_date[2]." ". $aylar[$bol_date[1]]." ". $bol_date[0]; //echo ile veritabanından gelen verileri yazdırdık. ?>

			</p>
            
            <p>
   				<strong>Mail:</strong>
  					 <?php echo $UyeRowFetch['Email'];//echo ile veritabanından gelen verileri yazdırdık. ?>

			</p>
            
            <p>
            
            	<strong>Cinsiyet:</strong>
                	<?php echo $UyeRowFetch['Cinsiyet']; ?>
            
            </p>
            
                        
            </div>
            
      </div>

      <div class="span8">
         <!-- content -->

         <div class="page-header">
            <h2>Yaptığım Paylaşımlar</h2>
         </div>

         <article class="clearfix">

   		<?php
        
			$sayfa=$_GET['s']; //get ile arama çubuğundan parametre çekiyoruz.
			 
			 if(empty($sayfa) || !is_numeric($sayfa)){ //eğer sayfa boş veya sayı değil ise
				 
				 	$sayfa=1;
				 
				 }
				 
				 $kacar=2; //her bir sayfada kaç veri gösterecek ise
				 $ksayisi=mysql_num_rows(mysql_query("Select Id from tbl_paylasimlar where Paylasan='".$UyeRowFetch['Adi']." ".$UyeRowFetch['Soyadi']."'")); //kullanıcı adına kayıtlı toplam kaç tane kayıt var ise
				 
				 $ssayisi=ceil($ksayisi/$kacar); //sayfa sayısını hesaplar ve ceil ile sayıyı en yakın tam sayıya yuvarladık.
				 $nereden=($sayfa*$kacar)-$kacar; //verileri nereden çekmeye başlayacak ise
			
			 $sqlcumlesi="Select * from tbl_paylasimlar where Paylasan='".$UyeRowFetch['Adi']." ".$UyeRowFetch['Soyadi']."' order by Id desc limit $nereden,$kacar"; //verileri çeken sql komutu
			 $sql=mysql_query($sqlcumlesi);
			 
			 $say=mysql_num_rows($sql);
			 
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
		
		?>
        
        <div class="sayfalamadiv">
                 
				 <?php
				 
				 for($i=1;$i<=$ssayisi;$i++){
					
					 echo "<a class='sayfalama' href='profilgiris.php?Id=$userId&s={$i}'>{$i}</a>";
					 
				 }
		 
		 		?>
         		
                </div>

         </article>

      </div>
      
   		</div>

   
	</div>
    
<!-- Profil Bilgileri SON -->

<!-- Alt Kısım -->

	<div class="ortala">
    
    	
        
     </div>
    
<!-- Alt Kısım SON -->

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

                            
    <?php
						
						}
			
			}else{//eğer sayı sıfıra eşit değil ise
				
					echo "Böyle bir üye bulunmamaktadır..";//echo ile mesaj verdirdik
					session_destroy();//sessionları yok ettik.
					header("refresh: 2; url=giris.php");//header ile ilgili sayfaya yönlendirdik.
				
				}
	
	?>

<?php ob_end_flush(); ?>