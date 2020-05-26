<?php session_start(); define("include",true); include("../config.php"); include("../javascript/functions.php"); if(isset($_SESSION['tech'])){ $id = intval($_GET['id']); ?>

<!--
	Php Scriptlerim
		www.phpscriptlerim.com
			info@phpscriptlerim.com 
				!!! 2019 !!!
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> 
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> 
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<title>Colorful Blog Yönetim Paneli</title>	
</head>
<body>

<div id="main">

	<div id="tray" class="box">

		<p class="f-left box">

			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			<strong>Colorful Blog Yönetim Paneli</strong>

		</p>

		<p class="f-right"><strong><a href="admin.php?id=<?php echo $_SESSION['logid']; ?>"><?php echo $_SESSION['tech']; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="logout.php" id="logout">Çıkış</a></strong></p>

	</div>

	<hr class="noscreen" />

	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a href="../index.php" target="_blank"><span><strong>Siteyi Görüntüle &raquo;</strong></span></a></li>
		</ul>

		<ul class="box">
			<li><a href="home.php"><span>Anasayfa</span></a></li>				
			<li><a href="sayfalar.php"><span>Sayfalar</span></a></li>		
			<li><a href="yazikategori.php"><span>Yazı Kategorileri</span></a></li>
			<li><a href="yazilar.php"><span>Yazılar</span></a></li>
			<li><a href="yorumlar.php"><span>Yorumlar</span></a></li>
			<li><a href="contact.php"><span>İletişim</span></a></li>
			<li><a href="admin.php?id=<?php echo $_SESSION['logid']; ?>"><span>Yönetici Bilgileri</span></a></li>
			<li><a href="ayarlar.php"><span>Ayarlar</span></a></li>
		</ul>

	</div>

	<hr class="noscreen" />

	<div id="cols" class="box">

		<div id="aside" class="box">

			<div class="padding box">

				<p id="logo"><a href="home.php"><img src="design/logo.png" title="Colorful Blog Yönetim Paneli" alt="" /></a></p><br><br>

			</div>
			
			<div class="padding box">
			
				<p id="btn-create" class="box"><a href="sayfaekle.php"><span>Sayfa Ekle</span></a></p>
				<p id="btn-create" class="box"><a href="yazikatekle.php"><span>Yazı Kategori Ekle</span></a></p>
				<p id="btn-create" class="box"><a href="yaziekle.php"><span>Yazı Ekle</span></a></p>		

			</div>
			
			<div class="padding box" class="info msg">
			<br><br>
			<b>Hatırlatma :</b> Script ile ilgili yaşadığınız sorunlar için öncelikle script sayfasını inceleyin. Daha sonra sitemizdeki <a href="https://www.phpscriptlerim.com/forum" target="_blank">forum</a> bölümünde kullandığınız script için açılmış olan konuları inceleyin. Eğer yine çözüm bulamadıysanız forum üzerinden yeni konu açıp detaylı(ekran görüntüsü, hata kodu vs) açıklama yaparak bize bildirimde bulunabilirsiniz.
			</div>

		</div>

		<hr class="noscreen" />

		<div id="content" class="box">
			<h1>Yazı Düzenle</h1><br>
<?php

if(isset($_POST['gonder'])){
	
$baslik = htmlclean($_POST['baslik']);
$icerik = htmlclean($_POST['icerik']);
$keywords = htmlclean($_POST['keywords']);
$description = htmlclean($_POST['description']);
$resimyolu = $_POST['resimyolu'];
$kategori = $_POST['kategori'];
$onoff = $_POST['onoff'];
$url = temizle($baslik);

if($baslik==""||$icerik==""||$resimyolu==""||$keywords==""||$description==""){ echo '<div class="error msg" style="width:300px;">Alanları boş geçemezsiniz!</div><br>'; }else{

$kayit = $db->prepare("update blog set baslik=?,icerik=?,keywords=?,description=?,kategori=?,resimyolu=?,sefurl=?,slayt=? where id=?"); 
$kayit->execute(array($baslik, $icerik, $keywords, $description, $kategori, $resimyolu, $url, $onoff, $id));

echo "<div class='done msg' style='width:200px;'><b>Düzenleme Kaydedildi!</b></div><br>"; echo '<meta http-equiv="refresh" content="2">'; } } ?>
						<form method="post">
<?php foreach($db->query("select * from blog where id='".$id."'") as $aaa){ ?>
						<div class="col50">
			
					<p class="t-justify">   
		
						<label><b>Başlık</b></label><br>
						<input type="text" size="100" name="baslik" value="<?php echo $aaa['baslik']; ?>" class="input-text" /><br><br>
					
						<label><b>Resim</b> (200 x 150)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
						<input type="text" size="100" name="resimyolu" value="<?php echo $aaa['resimyolu']; ?>" class="input-text" /><br><br>

						<label><b>Kategori</b></label><br>
						<select name="kategori">
						<option><?php echo $aaa['kategori']; ?></option>
				<?php foreach($db->query("select * from blogkategori") as $bbb){ ?>		
						<option value="<?php echo $bbb['sefurl']; ?>"><?php echo $bbb['baslik']; ?></option>
						<?php } ?>
						</select><br><br>

						<label><b>Anahtar Kelimeler (keywords)</b></label><br>
						<textarea cols="60" rows="5" name="keywords" class="input-text"><?php echo $aaa['keywords']; ?></textarea><br><br>	
						
						<label><b>Yazı Tanımlama (description)</b></label><br>
						<textarea cols="60" rows="5" name="description" class="input-text"><?php echo $aaa['description']; ?></textarea><br><br>						
						
						<label><b>Manşet</b></label><br>
						<?php if($aaa['slayt']=="1"){ ?>
						<input type="radio" name="onoff" value="1" checked> Evet, Bu yazı manşette görünsün.<br>
						<input type="radio" name="onoff" value="0"> Hayır, Bu yazı manşette görünmesin.<br><br>
						<?php }elseif($aaa['slayt']=="0"){ ?>
						<input type="radio" name="onoff" value="1"> Evet, Bu yazı manşette görünsün.<br>
						<input type="radio" name="onoff" value="0" checked> Hayır, Bu yazı manşette görünmesin.<br><br>						
						<?php } ?>	

						<label><b>İçerik</b></label><br>
						<textarea cols="75" rows="20" name="icerik" id="elm1" class="input-text"><?php echo $aaa['icerik']; ?></textarea><br><br>								
		
		</p>
				
			</div> 

			<div class="fix"></div>						

			<input type="submit" class="input-submit" name="gonder" style="width:250px;" value="Değişiklikleri Kaydet" />
			<?php } ?>						
				</form><br>
		</div>

	</div>

	<hr class="noscreen" />

	<div id="footer" class="box">

		<p class="f-left">&copy; <?php echo date('Y'); ?>, Colorful Blog.</p>

		<p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank">Php Scriptlerim</a></p>

	</div> 

</div>

</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../404.php";</script>'; } ?>