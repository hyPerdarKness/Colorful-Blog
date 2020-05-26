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
	<meta name="description" content="<?php echo $print['description']; ?>" />
	<meta name="keywords" content="<?php echo $print['keywords']; ?>" />	
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	

	<title><?php echo $print['title']; ?></title>	
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/<?php echo $print['color']; ?>.css" />	
	<script src="javascript/jquery-1.2.6.pack.js"></script>	
	<script type="text/javascript" src="javascript/coin-slider.js"></script>
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
	
		<p class="f-left"></p>
	
	</div> 
	
	<div id="section" class="box">

		<div id="content">

	<!--- Slayt Alanı Başlangıç -->
	
			<div id="topstory" class="box">

			<?php foreach($db->query("select * from blog where slayt='1' order by id desc") as $bbb){ if($print['seourl']==".php"){ ?>			
			<div><h1><a href="single.php?kat=<?php echo $bbb['kategori']; ?>&url=<?php echo $bbb['sefurl']; ?>"><?php echo $bbb['baslik']; ?></a></h1>
			<?php }elseif($print['seourl']==".html"){ ?>
			<div><h1><a href="<?php echo $bbb['kategori']; ?>/<?php echo $bbb['sefurl']; ?>.html"><?php echo $bbb['baslik']; ?></a></h1><?php } ?>			
				<p class="tag">
					<strong> <?php $say1 = $db->query("select count(*) from comments where blogID='".$bbb['id']."' AND onoff='1'")->fetchColumn(); echo number_format($say1); ?> Yorum </strong><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<span> <?php echo timeConvert($bbb['tarih']); ?> <span>|</span> <?php $ccc = $db->query("select * from blogkategori where sefurl='".$bbb['kategori']."'")->fetch(PDO::FETCH_ASSOC); echo $ccc['baslik']; ?> </span>
				</p> 
				<p><?php if($print['seourl']==".php"){ ?>
		<a href="single.php?kat=<?php echo $bbb['kategori']; ?>&url=<?php echo $bbb['sefurl']; ?>">
		<img src="<?php echo $bbb['resimyolu']; ?>" width="200" height="150" alt="<?php echo $bbb['baslik']; ?>" class="f-left" /></a>
		<?php }elseif($print['seourl']==".html"){ ?>
		<a href="<?php echo $bbb['kategori']; ?>/<?php echo $bbb['sefurl']; ?>.html">
		<img src="<?php echo $bbb['resimyolu']; ?>" width="200" height="150" alt="<?php echo $bbb['baslik']; ?>" class="f-left" /></a>	
			<?php } echo htmlclean(kisalt($bbb['icerik'], 520)); ?>
				</p></div>		
				<?php } ?>
				
			</div>
			
			<!--- Slayt Alanı Bitiş -->	

			<div class="padding">
			
				<ul class="articles box">
<?php $limit = $print['yazi_limit']; $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; }
$k = $db->prepare("select * from blog where slayt='0' limit 0,50"); $k->execute(); $count = $k->rowCount();
$toplamsayfa	 = ceil($count / $limit);
$baslangic		 = ($page-1)*$limit;
if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'404.php">'; exit(); }else{ } 
$ver = $db->query("select * from blog where slayt='0' order by id desc limit $baslangic,$limit");
foreach($ver as $yazdir){ ?>				
					<li class="box">
						<div class="articles-img">
						<?php if($print['seourl']==".php"){ ?>
						<a href="single.php?kat=<?php echo $yazdir['kategori']; ?>&url=<?php echo $yazdir['sefurl']; ?>"><img src="<?php echo $yazdir['resimyolu']; ?>" width="200" height="150" alt="<?php echo $yazdir['baslik']; ?>" /></a>
						<?php }elseif($print['seourl']==".html"){ ?>
						<a href="<?php echo $yazdir['kategori']; ?>/<?php echo $yazdir['sefurl']; ?>.html"><img src="<?php echo $yazdir['resimyolu']; ?>" width="200" height="150" alt="<?php echo $yazdir['baslik']; ?>" /></a><?php } ?>
						</div> 
						<div class="articles-desc">
						<?php if($print['seourl']==".php"){ ?>
						<h2><a href="single.php?kat=<?php echo $yazdir['kategori']; ?>&url=<?php echo $yazdir['sefurl']; ?>"><?php echo $yazdir['baslik']; ?></a></h2>
						<?php }elseif($print['seourl']==".html"){ ?>	
						<h2><a href="<?php echo $yazdir['kategori']; ?>/<?php echo $yazdir['sefurl']; ?>.html"><?php echo $yazdir['baslik']; ?></a></h2><?php } ?>						
						<p class="articles-info"><span class="articles-info-inner"> <?php echo timeConvert($yazdir['tarih']); ?> <span>|</span> <?php $cc1 = $db->query("select * from blogkategori where sefurl='".$yazdir['kategori']."'")->fetch(PDO::FETCH_ASSOC); echo $cc1['baslik']; ?> <span>|</span> <?php $say2 = $db->query("select count(*) from comments where blogID='".$yazdir['id']."' AND onoff='1'")->fetchColumn(); echo number_format($say2); ?> Yorum </span></p>
						<?php echo htmlclean(kisalt($yazdir['icerik'], 270)); ?>
							</div> 
					</li>
<?php } echo '</ul><div class="pagination box"><p class="f-right">';

if($count > $limit) : 
  $x = 2; 
  $lastP = ceil($count/$limit); 

  if($page > 1){

  $onceki = $page-1;
  echo "<a href=\"?page=$onceki\">Geri</a>"; 
  }
 
  if($page==1) echo "<a class=\"current\">1</a>"; 
  else echo "<a href=\"?page=1\">1</a>";   

  
  if($page-$x > 2) { 
    echo "..."; 
    $i = $page-$x; 
  } else { 
    $i = 2; 
  } 

  for($i; $i<=$page+$x; $i++) { 
    if($i==$page) echo "<a class=\"current\">$i</a>"; 
    else echo "<a href=\"?page=$i\">$i</a>"; 
    if($i==$lastP) break; 
  } 

  if($page+$x < $lastP-1) { 
    echo "..."; 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } elseif($page+$x == $lastP-1) { 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } 
  
  if($page < $lastP){
  $sonraki = $page+1;
  echo "<a href=\"?page=$sonraki\">İleri</a>"; 
  }
endif;  echo '</p></div>'; ?>								
			</div> 
			
		</div> 

		<div id="aside">

			<h3 class="title">Kategoriler</h3>
			
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
				
		</div>

	</div> 

	<div id="footer" class="box">

		<p class="f-right">Powered by : <a href="http://www.phpscriptlerim.com" target="_blank"> Php Scriptlerim</a></p>
	
		<p class="f-left">&copy; <?php echo date('Y').', '.$print['title']; ?>. Tüm hakları saklıdır.</p>

	</div>

</div>

</body>
</html>