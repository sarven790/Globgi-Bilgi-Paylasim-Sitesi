<?php session_start(); ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>
<link rel="icon" href="img/logo.png" />
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
				
				$sqlcumlesi="Select * from tbl_paylasimlar where Id='$userId'";
				$sql=mysql_query($sqlcumlesi);
				
				$say=mysql_num_rows($sql);
				
				for($i=0;$i<$say;$i++){
				
					$vericek=mysql_fetch_array($sql);
					
					$bol_date = explode("-",$vericek['YuklendigiTarih']);
					$bol_date2 = explode("-",$vericek['GuncellendigiTarih']);
					$bol_paylasan = explode(" ",$vericek['Paylasan']);
					$paylas_adi=$bol_paylasan[0];
					
					echo "<h3>".$vericek['Baslik']."</h3>";
					echo $vericek['Paylasim'];
					
					$sqlcumlesi2="Select * from tbl_uyeler where Adi='$paylas_adi'";
					$sql2=mysql_query($sqlcumlesi2);
			
					$say2=mysql_num_rows($sql2);
					
					for($j=0;$j<$say2;$j++){
						
						$vericek2=mysql_fetch_array($sql2);
						
						$id=$vericek2['Id'];
					
					echo "<div style='display:block;float:left; border-top:1px dotted silver;border-bottom:1px dotted silver; padding:10px; width:1160px;margin-top:10px;margin-bottom:-50px; color:#01D10C'>
					Paylaşan: <a href='profilgiris.php?Id=$id'>".$vericek['Paylasan'];
					
					}
					
					echo " </a>&nbsp;&nbsp;&nbsp;Paylaşıldı: ".$bol_date[2]." ".$aylar[$bol_date[1]]." ".$bol_date[0].
					"&nbsp;&nbsp;&nbsp;Güncellendi: ".$bol_date2[2]." ".$aylar[$bol_date2[1]]." ".$bol_date2[0];
					
					if($_SESSION['login']==true){
						
							if($_SESSION['kullanici_adi']==$paylas_adi){
								
									echo "<a style='display:block; margin-top:-1px; float:right;' href='guncelle.php?Id=$userId'>Güncelle</a>";
								
								}
						
						}
					echo "</div>";
				}
		
			?>
            
            </div>
		
        </div>
                          
            <div class="yorumlar">
            
            	<form method="post" action="">
            
            	<textarea name="yorum" rows="3" placeholder="Yorum yaz" style="width:700px; resize:none;"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" name="gonder" value="Gönder"/>
                
                <?php
				
				if($_SESSION['login']==true){
                
					$yorum=$_POST['yorum'];
					$gonder=$_POST['gonder'];					
					$id=$_GET['Id'];
					$paylasan=$_SESSION['kullanici_adi']." ".$_SESSION['kullanici_soyadi'];
					$tarih=@date("Y-m-d H:i:s");
					
				}else{
				
					$yorum=$_POST['yorum'];
					$gonder=$_POST['gonder'];					
					$id=$_GET['Id'];
					$paylasan="Misafir"." "."kullanıcı";
					$tarih=@date("Y-m-d H:i:s");
					
				}
					
					$sqlcumlesi="insert into tbl_yorumlar values('','$id','$yorum','$paylasan','$tarih')";
					if($gonder){ 
					
						if(empty($yorum)){
							
								echo "<script>alert('Bu alan boş geçilemez')</script>";
							
							}else{
							
								$sql=mysql_query($sqlcumlesi) or die("<script>alert('Hata var!')</script>");
	
								}
								
								if ($_SERVER['REQUEST_METHOD']=='POST') {

									header("Location: arasayfa.php");
									exit;
								}

					}
					
					$sqlcumlesi="Select * from tbl_yorumlar where PaylasimId=$id";
					$sql=mysql_query($sqlcumlesi);
					
					$say=mysql_num_rows($sql);
					
					?>
                    
					<div class="yorumbaslik">Yorumlar: <b style="color:red;"><?php echo $say; ?></b></div>
                    
					<?php
					
					function timeConvert ( $zaman ){
  						$zaman =  strtotime($zaman);
  					 	$zaman_farki = time() - $zaman;
   						$saniye = $zaman_farki;
   						$dakika = round($zaman_farki/60);
   						$saat = round($zaman_farki/3600);
   						$gun = round($zaman_farki/86400);
   						$hafta = round($zaman_farki/604800);
   						$ay = round($zaman_farki/2419200);
   						$yil = round($zaman_farki/29030400);
						
  	 					if( $saniye < 60 ){
      						if ($saniye == 0){
         						return "az önce";
     						 } else {
         						return $saniye .' saniye önce';
      						}
   							} else if ( $dakika < 60 ){
      							return $dakika .' dakika önce';
   							} else if ( $saat < 24 ){
      							return $saat.' saat önce';
   							} else if ( $gun < 7 ){
      							return $gun .' gün önce';
   							} else if ( $hafta < 4 ){
      							return $hafta.' hafta önce';
   							} else if ( $ay < 12 ){
      							return $ay .' ay önce';
   							} else {
      							return $yil.' yıl önce';
   							}
						}
                    
					if(empty($say)){ echo "<div style='background-color:#D6D6D6;padding:20px;'>Henüz hiç yorum yapılmamış!</div>"; }
					
					for($i=0;$i<$say;$i++){
					
						$vericek=mysql_fetch_array($sql);
							
						
					?>
                
                <div class="yorumicerikana">
                
                <ol class="yorumicerik">
                
                <?php $id=$vericek['YorumId']; ?>
                
                <b><?php echo $vericek['YorumYapan']; ?></b><br/>
                	<?php echo $vericek['YorumIcerik']; ?>
                    <div class="sag">
						 <div class="tarih"><?php echo @timeConvert($vericek['YorumTarihi']); ?></div>
                         <?php echo "<a class='yorumcevapla' href='cevapla.php?Id=$id&Id2=$userId'>CevapYaz</a>"; 
                           ?>
						   </div>
                
                		</ol>
						
						<?php
						 $sqlcumlesi2="Select * from tbl_yorumcevaplari where YorumId='$id'";
						 $sql2=mysql_query($sqlcumlesi2);
						 
						 $say2=mysql_num_rows($sql2);
						 
						 for($j=0;$j<$say2;$j++){
							 
							 	$vericek2=mysql_fetch_array($sql2);
								
								echo "<li class='yorumicerikcevap'>
								
								<b><b style='color:red;'>Cevap:</b> ".$vericek2['YorumYapan']."</b><br>
									".$vericek2['YorumIcerik']."
										<div class='sag'>
											<div class='tarih'>".@timeConvert($vericek2['YorumTarihi'])."
								</div></li>
								";
							 
							 }
						 
                         
                   ?>
  	
                  
            
            <?php
            
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