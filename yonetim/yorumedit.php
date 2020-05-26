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
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
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
			<h1>Yorum Düzenle</h1><br>
<?php if(isset($_POST['gonder'])){

$adsoyad = htmlclean($_POST['adsoyad']);
$email = $_POST['email'];
$web = $_POST['web'];
$onoff = $_POST['onoff'];
$mesaj = htmlclean($_POST['mesaj']);

if($adsoyad==""||$email==""||$mesaj==""){ echo '<div class="error msg" style="width:300px;"><b>Alanları boş geçemezsiniz!</b></div><br>'; }else{

$kayit = $db->prepare("update comments set adsoyad=?,email=?,web=?,mesaj=?,onoff=? where id=?");
$kayit->execute(array($adsoyad, $email, $web, $mesaj, $onoff, $id));

 echo "<div class='done msg' style='width:200px;'><b>Düzenleme Kaydedildi!</b></div><br>"; echo '<meta http-equiv="refresh" content="2">'; } } ?>
						<form method="post">
	<?php foreach($db->query("select * from comments where id='".$id."'") as $aaa){ ?>
		<b>Yorumun Gönderildiği Yazı :</b> <?php $bbb = $db->query("select * from blog where id='".$aaa['blogID']."'")->fetch(PDO::FETCH_ASSOC); echo $bbb['baslik']; ?> <br><br> 						
			<div class="col50">
			
		<p class="t-justify">   
		
						<label><b>Ad Soyad</b></label><br>
						<input type="text" size="40" name="adsoyad" value="<?php echo $aaa['adsoyad']; ?>" class="input-text" /><br><br>
					
						<label><b>E-Mail</b></label><br>
						<input type="text" size="40" name="email" value="<?php echo $aaa['email']; ?>" class="input-text" /><br><br>

						<label><b>Web Adresi</b></label><br>
						<input type="text" size="40" name="web" value="<?php echo $aaa['web']; ?>" class="input-text" /><br><br>

						<label><b>Gönderildiği Tarih</b></label><br>
						<input type="text" size="40"  value="<?php echo timeConvert($aaa['tarih']); ?>" class="input-text" readonly /><br><br>

						<label><b>IP Adresi</b></label><br>
						<input type="text" size="40" value="<?php echo $aaa['ip']; ?>" class="input-text" readonly /><br><br>	

						<label><b>Onay</b></label><br>
						<?php if($aaa['onoff']=="1"){ ?>
						<input type="radio" name="onoff" value="1" checked> <img src="design/ico-done.gif" /> &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="onoff" value="0"> <img src="design/ico-delete.gif" /><br><br>
						<?php }elseif($aaa['onoff']=="0"){ ?>
						<input type="radio" name="onoff" value="1"> <img src="design/ico-done.gif" /> &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="onoff" value="0" checked> <img src="design/ico-delete.gif" /><br><br>						
						<?php } ?>								
		
		</p>
				
			</div> 

			<div class="col50 f-right">
			
				<p class="t-justify">
				

						<label><b>Yorum</b></label><br>
						<textarea cols="75" rows="20" name="mesaj" class="input-text"><?php echo $aaa['mesaj']; ?></textarea><br><br>								

				</p>
				
			</div> 
			<div class="fix"></div>						

			<p style="padding-left:380px;"><input type="submit" class="input-submit" name="gonder" style="width:150px;" value="Değişiklikleri Kaydet" /></p>
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