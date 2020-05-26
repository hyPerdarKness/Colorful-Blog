<?php session_start(); if(isset($_SESSION['tech'])){ ?>
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		
		<title>Resim Seç</title>
	
		<!-- elFinder translation (OPTIONAL) -->
		<script src="js/i18n/elfinder.tr.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    url : 'php/connector.minimal.php',
					lang: 'tr', 					
                    getFileCallback : function(file) {
                        window.opener.processFile1(file.url);
                        window.close();
                    },
                    resizable: false
                }).elfinder('instance');
            });
        </script>
 
        <div id="elfinder"></div>
<?php }else{ echo '<meta http-equiv="refresh" content="0;URL=../../index.php">'; exit(); } ?>