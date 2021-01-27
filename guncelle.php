<?php @session_start(); ob_start(); if(!isset($_SESSION['login'])){/*eğer session ile oturum açılmamışsa*/ echo "Lütfen önce giriş yapınız!";/*echo ile mesaj verdik.*/ }else{//eğer kullanıcı oturum açmışsa 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Globgi</title>


<link rel="shortcut icon" href="img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

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
        
        <?php
		
					include('baglanti.php');
  
					$id=$_GET['Id'];

					$sqlcumlesi="Select * from tbl_paylasimlar where Id=$id";
					$sql=mysql_query($sqlcumlesi);
					
					$say=mysql_num_rows($sql);
					
					for($i=0;$i<$say;$i++){
					
							$vericek=mysql_fetch_array($sql);
	
	
	?>

		<form class="form-horizontal" method="post" action="" id="pEditor"><!-- kayıt formu -->
  <div class="control-group">
    <div class="controls">
      <input type="text" class="select2" value="<?php echo $vericek['Baslik']; ?>" name="baslik" placeholder="Başlık girin" autocomplete="off">
    </div>
  </div>
  <!-- buton -->
	<ul class="pButon">
		<li><a href="#" data-obj='{"name":"bold"}'>Kalın</a></li>
		<li><a href="#" data-obj='{"name":"underline"}'>Altıçizili</a></li>
		<li><a href="#" data-obj='{"name":"italic"}'>Eğik</a></li>
		<li><a href="#" data-obj='{"name":"FontSize", "prompt":true, "promptText":"Yazı boyutunu girin (1-7 arası değer)"}'>Boyut</a></li>
		<li><a href="#" data-obj='{"name":"ForeColor", "prompt":true, "promptText":"Yazı için bir renk değeri girin!"}'>Renk</a></li>
		<li><a href="#" data-obj='{"name":"inserthorizontalrule"}'>&lt;hr /&gt;</a></li>
		<li><a href="#" data-obj='{"name":"InsertOrderedList", "arg":"newOL"}'>ol</a></li>
		<li><a href="#" data-obj='{"name":"InsertUnorderedList", "arg":"newUL"}'>ul</a></li>
		<li><a href="#" data-obj='{"name":"CreateLink", "prompt":true, "promptText":"Bir link adresi girin!", "promptDefault":"http://"}'>Link</a></li>
		<li><a href="#" data-obj='{"name":"Unlink"}'>Link Sil</a></li>
		<li><a href="#" data-obj='{"name":"insertimage", "prompt":true, "promptText":"Bir resim adresi girin!", "promptDefault":"http://"}'>Resim</a></li>
		<li><a href="#" data-obj='{"name":"justifyRight"}'>Sağa Yasla</a></li>
		<li><a href="#" data-obj='{"name":"justifyLeft"}'>Sola Yasla</a></li>
		<li><a href="#" data-obj='{"name":"justifyCenter"}'>Ortala</a></li>
	</ul>
	<!--/buton -->
	
	<!-- editör -->
	<div class="pEditor" contenteditable="true">
		<?php
			echo $vericek['Paylasim'] ;
		?>
	</div>
	<!--/editör -->
    
    <?php } ?>
	
	<div class="submit">
		<button type="submit" name="gonder" id="submit">Gönder</button>
	</div>
	
	<!-- gizli textarea -->
	<textarea name="pTextarea" style="display: none" cols="30" rows="10"></textarea>
	<!--/gizli textarea --> 
    
  
    </div>
  </div>
  
  <div id="txtHint">
  
  </div>
  
  <div class="control-group">
    <div class="controls">                  
    </div>
  </div>
            
        
        </form>
        
        <?php
        
			$baslik=$_POST['baslik'];
			$icerik=$_POST['pTextarea'];
			//$altkat=$_POST['altk'];
			$kullanici=$_SESSION['kullanici_adi']." ".$_SESSION['kullanici_soyadi'];
			
			if($_POST){
			
			if(empty($baslik) || empty($_POST['pTextarea'])){
				
				echo "<script>alert('Lütfen veri girin!')</script>";
				
			}else{
				
		$tarih=@date("Y-m-d H:i:s");
			
	$sqlcumlesi="UPDATE tbl_paylasimlar SET Baslik='$baslik' ,Paylasim='".addslashes($icerik)."' ,GuncellendigiTarih='$tarih' WHERE Id='$id' ";
			
				$sql=mysql_query($sqlcumlesi);
			
					if($sql){
			
						echo "<script>alert('Güncelleme başarılı!')</script>";	
						
							header("Location: kategori.php?Id=$id");
				
					}else{
			
						echo "<script>alert('Lütfen tekrar deneyin!')</script>";
			
					}
			}
		}
		?>


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

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript">
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","selected.php?q="+str,true);
  xmlhttp.send();
}
</script>
</body>
</html>
<?php } ob_end_flush(); ?>
