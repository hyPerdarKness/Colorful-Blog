<?php session_start(); define("include",true); include("../config.php"); include("../javascript/functions.php"); ?>

<!--
	Php Scriptlerim
		www.phpscriptlerim.com
			info@phpscriptlerim.com 
				!!! 2019 !!!
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> 
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
	<title>Colorful Blog Yönetim Paneli</title>
</head>
<body>

<div id="main">

	  <div id="content" class="box" align="center">
<br><br><br><br>
<a href="index.php"><img src="design/logo.png" border="0" /></a>
<br><br><br><br>
<?php if(isset($_POST['login'])){ $username = htmlclean($_POST['username']); $password = htmlclean($_POST['password']); $parola = md5($password);

if($username==""||$password==""){ echo '<p class="msg error" style="width:300px;"><b>Alanları boş geçemezsiniz!</b></p><br>'; }else{

$kontrol = $db->prepare("select * from yonetim where username=?"); $kontrol->execute(array($username)); if($kontrol->rowCount()=="0"){ echo '<p class="msg error" style="width:300px;"><b>Girdiğiniz bilgiler hatalı!</b></p><br>'; }else{ $row = $kontrol->fetch(PDO::FETCH_ASSOC);

 $dbusername = $row['username']; $dbpassword = $row['password']; $id = $row['id'];
 
 if($username==$dbusername&&$parola==$dbpassword){

	$_SESSION['tech']="$username"; $_SESSION['logid']="$id";
	echo '<p class="msg done" style="width:300px;"><b>Giriş yapıldı. Yönlendiriliyor...</b></p><br>';
	echo '<meta http-equiv="refresh" content="2;URL=home.php">'; 

	}else{ echo '<div class="alert alert-danger">Kullanıcı Adı yada Şifre Hatalı!</div>'; } } } } ?>
		<form method="post">
                    <dl>
                        <dt><label for="email">Kullanıcı Adı</label></dt>
                        <dd><input type="text" name="username" style="width:300px; height:30px;" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Şifre</label></dt>
                        <dd><input type="password" name="password" style="width:300px; height:30px;" /></dd>
                    </dl>
                    
                     <dl>
                    <input type="submit" name="login" value="Giriş Yap" style="width:130px; height:50px; font-size:25px;" />
                     </dl>       
			</form>
	<br><br><br><br>
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