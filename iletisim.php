<?php session_start(); define("include",true); include("config.php"); include("javascript/functions.php"); include("javascript/autoload.php"); ?>

<!--
	Php Scriptlerim
		www.phpscriptlerim.com
			info@phpscriptlerim.com 
				!!! 2019 !!!
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $print['description']; ?>" />
	<meta name="keywords" content="<?php echo $print['keywords']; ?>" />	
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	

	<title>İletişim | <?php echo $print['title']; ?></title>	
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/<?php echo $print['color']; ?>.css" />	
<?php echo $print['analytics']; ?>	
</head>
<body>

<div id="main">

	<div id="header" class="box">

		<p id="logo"><a href="index<?php echo $print['seourl']; ?>"><img src="<?php if($print['logo']==""){ echo 'http://'.$_SERVER['HTTP_HOST'].'/images/logo.png'; }else{ echo $print['logo']; } ?>" alt="<?php echo $print['title']; ?>" /></a></p>
		
		<p id="slogan"><?php echo $print['banner']; ?></p>

	</div>

	<div id="nav" class="box">
	
		<ul>
			<li><a href="index<?php echo $print['seourl']; ?>">Anasayfa</a></li>
			<?php foreach($db->query("select * from page order by sira asc") as $aaa){ if($print['seourl']==".php"){ ?>
			<li><a href="page.php?url=<?php echo $aaa['seolink']; ?>"><?php echo $aaa['post_title']; ?></a></li>
			<?php }elseif($print['seourl']==".html"){ ?>
			<li><a href="sayfa/<?php echo $aaa['seolink']; ?>.html"><?php echo $aaa['post_title']; ?></a></li>			
			<?php } } ?>
			<li class="last"><a href="iletisim<?php echo $print['seourl']; ?>">İletişim</a></li>			
		</ul>

	</div>
	
	<div id="tray" class="box">

		<p class="f-right">
			<a href="<?php echo $print['facebook']; ?>" target="_blank"><img src="images/ico-facebook.png" title="Facebook" alt="Facebook" /></a>
			<a href="<?php echo $print['twitter']; ?>" target="_blank"><img src="images/ico-twitter.png" title="Twitter" alt="Twitter" /></a>
		</p>
	
		<p class="f-left">
		
			<a href="index<?php echo $print['seourl']; ?>">Anasayfa</a> <span>/</span> 
					
			<strong>İletişim</strong>
			
		</p>
	
	</div>
	
	<div id="section" class="box">

		<div id="content">

			<div class="main-title box">
			
				<h1>İletişim</h1>
			
			</div>
		
			<div class="padding">
			
			<?php echo $print['iletisim']; ?>
						
						<h2>İletişim Formu</h2>
<?php if(isset($_POST['gonder'])){

 $adsoyad = htmlclean($_POST['adsoyad']);
 $email = $_POST['email'];
 $telefon = htmlclean($_POST['telefon']);
 $mesaj = htmlclean($_POST['mesaj']);
 $tarih = date('Y-m-d H:i:s');
 $ip = $_SERVER['REMOTE_ADDR'];
 
if($adsoyad==""||$email==""||$mesaj==""){ echo '<font color="red"><b>Lütfen zorunlu alanları doldurun!</b></font>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<font color="red"><b>Lütfen geçerli bir e-mail adresi girin!</b></font>'; }else{
	
if(isset($_POST['g-recaptcha-response'])){ $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost()); $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(!$resp->isSuccess()){ echo '<font color="red"><b>Güvenlik kodu hatası! Lütfen tekrar deneyin.</b></font>'; }else{

$kayit = $db->prepare("insert into iletisim SET adsoyad=?,email=?,telefon=?,mesaj=?,tarih=?,ip=?");
$kayit->execute(array($adsoyad, $email, $telefon, $mesaj, $tarih, $ip));

echo '<font color="green"><b>Mesajınız iletilmiştir.</b></font>';
echo '<meta http-equiv="refresh" content="3">'; } } } } } ?> 
				<form method="post" class="form">
					<ul>
						<li>
							<label for="input-01">Ad Soyad</label>
							<input type="text" size="45" class="input-text" name="adsoyad" />
						</li>
						<li>
							<label for="input-02">E-Mail</font></label>
							<input type="email" size="45" class="input-text" name="email" />
						</li>
						<li>
							<label for="input-03">Telefon</label>
							<input type="text" size="45" class="input-text" name="telefon" />
						</li>
						<li>
							<label for="input-04">Mesaj</label>
							<textarea cols="75" rows="10" class="input-text" name="mesaj"></textarea>
						</li>
						<li>
							<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
						</li>
						<li><input type="submit" name="gonder" value="Gönder" class="input-submit" /></li>
					</ul>
				</form>
				
			</div> 
			
		</div>

		<div id="aside">

			<h3 class="title">Blog Kategori</h3>
			
			<div class="padding">

				<ul class="menu">
		<?php foreach($db->query("select * from blogkategori order by sira asc") as $ddd){ if($print['seourl']==".php"){ ?>				
					<li><a href="blogkat.php?url=<?php echo $ddd['sefurl']; ?>"><?php echo $ddd['baslik']; ?></a></li>
					<?php }elseif($print['seourl']==".html"){ ?>
					<li><a href="kategori/<?php echo $ddd['sefurl']; ?>/"><?php echo $ddd['baslik']; ?></a></li>
					<?php } } ?>					
				</ul>		
			
			</div>

			<h3 class="title">Reklam</h3>
			
			<div class="padding">
			
				<ul class="ads box">
			<?php echo $print['reklam']; ?>
				</ul>

			</div> 			
				
			<h3 class="title">Son Yazılar</h3>

			<div class="padding">
			
				<ul class="sponsors">
		<?php foreach($db->query("select * from blog order by id desc limit 0,8") as $eee){ if($print['seourl']==".php"){ ?>				
					<li><a href="single.php?kat=<?php echo $eee['kategori']; ?>&url=<?php echo $eee['sefurl']; ?>"><?php echo $eee['baslik']; ?></a><br>
					<?php echo timeConvert($eee['tarih']); ?> &nbsp; | &nbsp; <?php echo $eee['baslik']; ?>
					</li>
					<?php }elseif($print['seourl']==".html"){ ?>
					<li><a href="<?php echo $eee['kategori']; ?>/<?php echo $eee['sefurl']; ?>.html"><?php echo $eee['baslik']; ?></a><br>
					<?php echo timeConvert($eee['tarih']); ?> &nbsp; | &nbsp; <?php echo $eee['baslik']; ?>
					</li>
					<?php } } ?>					
				</ul>				
			
			</div> 
				
		</div>

	</div>

	<div id="footer" class="box">

		<p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank"> Php Scriptlerim</a></p>
	
		<p class="f-left">&copy; <?php echo date('Y').', '.$print['title']; ?>. Tüm hakları saklıdır.</p>

	</div>

</div>

	<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>

</body>
</html>