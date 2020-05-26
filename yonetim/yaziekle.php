<?php session_start(); define("include",true); include("../config.php"); include("../javascript/functions.php"); if(isset($_SESSION['tech'])){ ?>

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
			<h1>Yazı Ekle</h1>
			<br>
<?php

if(isset($_POST["gonder"])){	

$baslik = htmlclean($_POST['baslik']);
$icerik = htmlclean($_POST['icerik']);
$keywords = htmlclean($_POST['keywords']);
$description = htmlclean($_POST['description']);
$kategori = $_POST['kategori'];
$resimyolu = $_POST['resimyolu'];
$onoff = $_POST['onoff'];
$tarih = date('Y-m-d H:i:s');
$url = temizle($baslik);

if($baslik==""||$icerik==""||$resimyolu==""||$kategori==""||$keywords==""||$description==""){ echo '<div class="error msg" style="width:300px;"><b>Bütün alanları doldurmanız gerekmektedir.</b></div><br>'; }else{

$kayit = $db->prepare("insert into blog SET baslik=?,icerik=?,keywords=?,description=?,kategori=?,resimyolu=?,tarih=?,sefurl=?,slayt=?"); 
$kayit->execute(array($baslik, $icerik, $keywords, $description, $kategori, $resimyolu, $tarih, $url, $onoff));

 echo "<div class='done msg' style='width:200px;'><b>Yazı Eklendi!</b></div><br>"; echo '<meta http-equiv="refresh" content="2">'; } } ?>
						<form method="post">
							<div class="col50">
			
				<p class="t-justify">   
		
						<label><b>Başlık</b></label><br>
						<input type="text" size="80" name="baslik" class="input-text" /><br><br>
					
						<label><b>Resim</b> (200 x 150)</label><br>
						<input type="text" size="60" id="resim" class="input-text" name="resimyolu" readonly /> <button style="font-weight:bold; width:100px; height:30px;" id="rbutton">Resim Seç</button><br><br>

						<label><b>Kategori</b></label><br>
						<select style="width:150px;" name="kategori">
						<option></option>
				<?php foreach($db->query("select * from blogkategori") as $aaa){ ?>		
						<option value="<?php echo $aaa['sefurl']; ?>"><?php echo $aaa['baslik']; ?></option>
						<?php } ?>
						</select><br><br>
						
						<label><b>Anahtar Kelimeler (keywords)</b></label><br>
						<textarea cols="60" rows="2" name="keywords" class="input-text"></textarea><br><br>	
						
						<label><b>Yazı Tanımlama (description)</b></label><br>
						<textarea cols="60" rows="2" name="description" class="input-text"></textarea><br><br>								

						<label><b>Manşet</b></label><br>
						<input type="radio" name="onoff" value="1"> Evet, Bu yazı manşette görünsün.<br>
						<input type="radio" name="onoff" value="0" checked> Hayır, Bu yazı manşette görünmesin.<br><br>


						<label><b>İçerik</b></label><br>
						<textarea rows="20" name="icerik" id="elm1" class="input-text"></textarea><br><br>								
		
		</p>
				
			</div> 

			<div class="fix"></div>						

			<input type="submit" class="input-submit" name="gonder" style="width:250px;" value="Ekle" />
						</form>
			
			<br>
		</div>

	</div>

	<hr class="noscreen" />

	<div id="footer" class="box">

		<p class="f-left">&copy; <?php echo date('Y'); ?>, Colorful Blog.</p>

		<p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank">Php Scriptlerim</a></p>

	</div>  

</div>

<script type="text/javascript" src="js/jquery.popupWindow.js"></script>	
<script src="js/tinymce/tinymce.min.js"></script>	
<script>
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
	language : 'tr_TR',
	convert_urls: false,
	entities : "raw",
	relative_urls: false,
	remove_script_host : false,
	width:800,
	height:300,
	file_browser_callback : elFinderBrowser,	
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 

 function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: 'elfinder/tinyelf.php',
    title: 'Dosya Yöneticisi',
    width: 900,
	height: 500,
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}

                    $(document).ready(function(){
                        $('#rbutton').popupWindow({ 
                            windowURL:'elfinder/elfinpop.php', 
                            windowName:'Filebrowser',
                            height:550, 
                            width:900,
                            centerScreen:1
                        }); 
                    });
					
                    function processFile1(file){
                        $('#resim').val(file);
                    }
</script>

</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../404.php";</script>'; } ?>