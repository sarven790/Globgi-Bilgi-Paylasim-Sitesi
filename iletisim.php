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
                    <li><a href="kategoriler.php">Kategoriler</a></li>
                    <li class="active"><a href="iletisim.php">İletişim</a></li>
                
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

<!-- İletişim -->
    
<div class="container">
    
  <div class="span1"></div> <div class="span1">
                
        <div class="span4">

		<form class="form-horizontal" action="" method="post">
  <div class="control-group">
    <div class="controls">
      <input type="text" name="adi" class="yazi" placeholder="Adınız" autocomplete="off">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="text" name="soyadi" class="yazi" placeholder="Soyadınız" autocomplete="off">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="text" name="email" class="yazi" id="inputEmail" placeholder="Email" autocomplete="off">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <textarea rows="6" class="area" name="dusunce" placeholder="Düşüncelerini paylaş.."></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      
  	<button type="submit" name="gonder" class="btn btn-success">Gönder</button>
    
    
    	<address>
  				<strong>Desinger by Sarven Yanık</strong><br>
  				Lorem Ipsum sit dolar amet Lorem Ipsum sit dolar amet Lorem Ipsum sit dolar amet <br/>Lorem Ipsum sit dolar amet Lorem Ipsum sit dolar amet Lorem Ipsum sit dolar amet Lorem Ipsum sit dolar amet, 600<br>
  				Istanbul,Turkey<br>
  				<abbr title="Tel">T:</abbr> (XXX) XXX XX XX
                
                <br/>
        
  				<strong>E-Mail</strong><br>
  				<a href="mailto:#">first.last@example.com</a>
		</address>
                    
    </div>
  </div>
            
        
        </form>
        
        
        <?php
		
			include('baglanti.php');
        
			$adi=$_POST['adi'];
			$soyadi=$_POST['soyadi'];
			$email=$_POST['email'];
			$dusunce=$_POST['dusunce'];
			
			if($_POST){
			
			if(empty($adi) || empty($soyadi) || empty($email) || empty($dusunce)){
				
					echo "<script>alert('Lütfen boş alan bırakmayınız!')</script>";
				
				}else{
					
						$sqlcumlesi="insert into tbl_iletisim values('','$adi','$soyadi','$email','$dusunce')";
						$sql=mysql_query($sqlcumlesi);
						
						if($sql){
							
								header("Location: arasayfa.php");
							
							}else{
								
									echo "<script>alert('Lütfen tekrar deneyin !')</script>";
								
								}
					
					}
				
			}
		
		?>


        </div>  
 
    
  </div> 
   
</div>
    
<!-- İletişim -->

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