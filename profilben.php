<title>Globgi</title>
<link rel='shortcut icon' href='img/logo.png' />
<?php @session_start(); ob_start(); include('baglanti.php'); if(!isset($_SESSION['login'])){/*eğer session ile oturum açılmamışsa*/ echo "Bu sayfayı görüntülemeye yetkiniz yoktur !";/*echo ile mesaj verdik.*/ }else{//eğer kullanıcı oturum açmışsa 
 
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
 
 header("content-type: text/html; charset=utf-8");
 
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset='utf-8'>
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

<!-- Profil Bilgileri -->
    
<div class="container">

   <div class="row">

      <div class="span4">
      
      <div class="solprofil"><!--profilin sol kısmını kapsayan div-->
      
         <img src="img/profile.png" class="img-circle"/>

			<h2><?php echo $_SESSION['kullanici_adi']." ". $_SESSION['kullanici_soyadi'];//session ile kullanıcı bilgilerini yazdırdık. ?></h2>
			
			<p>
   				<strong>Yaşadığı Yer: </strong>
   					<?php echo $_SESSION['kullanici_yasadigi_yer'];//session ile kullanıcı bilgilerini yazdırdık. ?>
			</p>
			<p>
   				<strong>Doğum Tarihi:</strong>
  					 <?php $bol_date = explode("-",$_SESSION['kullanici_dogum_tarihi']); echo $bol_date[2]." ".$aylar[$bol_date[1]]." ".$bol_date[0];//session ile kullanıcı bilgilerini yazdırdık. ?>

			</p>
            
            <p>
   				<strong>Mail:</strong>
  					 <?php echo $_SESSION['kullanici_email'];//session ile kullanıcı bilgilerini yazdırdık. ?>

			</p>
            
            <p>
            
            	<strong>Cinsiyet:</strong>
                
                	<?php echo $_SESSION['kullanici_cinsiyet']; ?>
            
            </p>
            
            
            <p>
            
            	&nbsp;&nbsp;<a href="veripaylasim.php">Bilgi Paylaş</a> | <a href="cikis.php">Çıkış Yap</a>
            
            </p>
            
            </div>
            
      </div>

      <div class="span8"><!--profilin sağ kısmını kapsayan ana div-->
         <!-- content -->

         <div class="page-header"><!--başlığı kapsayan ana div-->
            <h2>Yaptığım Paylaşımlar</h2>
         </div>

         <article class="clearfix"><!--alt kısmı kapsayan ana div-->
         
         <?php 
		
			 $sayfa=$_GET['s']; //get ile arama çubuğundan parametre çekiyoruz.
			 
			 if(empty($sayfa) || !is_numeric($sayfa)){ //eğer sayfa boş veya sayı değil ise
				 
				 	$sayfa=1;
				 
				 }
				 
				 $kacar=2; //her bir sayfada kaç veri gösterecek ise
				 $ksayisi=mysql_num_rows(mysql_query("Select Id from tbl_paylasimlar where Paylasan='".$_SESSION['kullanici_adi']." ".$_SESSION['kullanici_soyadi']."'")); //kullanıcı adına kayıtlı toplam kaç tane kayıt var ise
				 
				 $ssayisi=ceil($ksayisi/$kacar); //sayfa sayısını hesaplar ve ceil ile sayıyı en yakın tam sayıya yuvarladık.
				 $nereden=($sayfa*$kacar)-$kacar; //verileri nereden çekmeye başlayacak ise
			
			 $sqlcumlesi="Select * from tbl_paylasimlar where Paylasan='".$_SESSION['kullanici_adi']." ".$_SESSION['kullanici_soyadi']."' order by Id desc limit $nereden,$kacar"; //verileri çeken sql komutu
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
					
					 echo "<a class='sayfalama' href='profilben.php?s={$i}'>{$i}</a>";
					 
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

	<div class="navbar navbar-fixed-bottom navbar-inverse"><!--footer kısmını iceren ana div-->
    
    	<div class="navbar-inner"><!--footer içeriğini kapsayan ana div-->
        
        	<div class="container"><!--footer içerisindeki yazıların daha düzgün ve ortalı gözükmesini sağlayan div-->
            
            	<p class="pull-left p">Tüm Hakları Saklıdır © 2015 |<a style="color:white;" href="#" title="Profilim"> Sarven Yanık</a></p>
            
            </div>
        
        </div>
    
    </div>

<!-- Footer SON -->

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php } ob_end_flush(); ?>