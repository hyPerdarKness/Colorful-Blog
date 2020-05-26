<?php define("include",true); include("config.php"); include("javascript/functions.php"); ?>

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
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">	
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	

	<title>404! | <?php echo $print['title']; ?></title>	
	
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
					
			<strong>404!</strong>
			
		</p>
	
	</div>
	
	<div id="section" class="box">

		<div id="content">

			<div class="main-title box">
			
				<h1>404!</h1>
			
			</div>
		
			<div class="padding" align="center">
		<img src="images/404.png" alt="" />
		<br><br>
		<h1>Ulaşmaya çalıştığınız yazı, sayfa bulunamadı!</h1>
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

</body>
</html>