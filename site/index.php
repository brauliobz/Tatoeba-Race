<<?='?'?>xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		
		<?php require_once('dao/dao.php'); ?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Racing</title>
		<link href="style/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="content" >
			<h1 style="text-align: center;">Choose a language</h1>
			<p style="text-align: center;">
<?php 			foreach(getLanguages() as $lang) {?>
			<a href="race.php?lang=<?=$lang?>" class="flagLink"><img src="img/<?=$lang?>.png" alt="<?=$lang?>"/></a>
<?php			} ?>
			</p>
		</div>
	</body>
</html>
