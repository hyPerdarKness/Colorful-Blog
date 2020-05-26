<?php if(!defined("include")){ echo '<meta http-equiv="refresh" content="0;URL=index.php">'; exit(); }

/*
	Php Scriptlerim
		www.phpscriptlerim.com
			info@phpscriptlerim.com 
				!!! 2019 !!!
*/

$dbhost = "localhost";
$dbuser = "root"; //Veritabanı Kullanıcı Adı
$dbpass = ""; //Veritabanı Şifresi
$dbdata = "colorfulblog"; //Veritabanı Adı

try {
     $db = new PDO("mysql:host=$dbhost;dbname=$dbdata", "$dbuser", "$dbpass", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch ( PDOException $e ){
     print $e->getMessage(); exit();
}

$bshrf = 'http://'.$_SERVER['HTTP_HOST'].'/';  //ssl sertifikasını aktif ederseniz, http yazan kısmı https olarak değiştirin

$print = $db->query("select * from settings")->fetch(PDO::FETCH_ASSOC); ?>