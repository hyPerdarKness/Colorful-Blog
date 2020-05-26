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

		<!-- elFinder translation (OPTIONAL) -->
		<script src="js/i18n/elfinder.tr.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript">
  var FileBrowserDialogue = {
    init: function() {
      // Here goes your code for setting your custom things onLoad.
    },
    mySubmit: function (URL) {
      // pass selected file path to TinyMCE
      parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

      // force the TinyMCE dialog to refresh and fill in the image dimensions
      var t = parent.tinymce.activeEditor.windowManager.windows[0];
      t.find('#src').fire('change');

      // close popup window
      parent.tinymce.activeEditor.windowManager.close();
    }
  }

  $().ready(function() {
    var elf = $('#elfinder').elfinder({
      // set your elFinder options here
      url: 'php/connector.minimal.php', 
		lang: 'tr',	  
      getFileCallback: function(file) { // editor callback
        // file.url - commandsOptions.getfile.onlyURL = false (default)
        // file     - commandsOptions.getfile.onlyURL = true
        FileBrowserDialogue.mySubmit(file.url); // pass selected file path to TinyMCE 
      }
    }).elfinder('instance');      
  });
</script>

        <div id="elfinder"></div>
<?php }else{ echo '<meta http-equiv="refresh" content="0;URL=../../index.php">'; exit(); } ?>		