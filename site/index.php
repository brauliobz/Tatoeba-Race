<<?='?'?>xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		
		<?php require_once('dao/dao.php'); ?>
		<?php require_once('util/lang.php'); ?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Racing</title>
		<link href="style/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="content" >
			<h1 style="text-align: center;">Choose a language</h1>
			<table style="text-align: center; border: 0px solid;">
<?php
			$i = 0;
	 		foreach(getLanguages() as $lang) {
	 			if ($i % 10 == 0) {
	 				echo '<tr>';
				}
?>
					<td style="vertical-align: top;">
						<a href="race.php?lang=<?=$lang?>" class="flagLink">
							<img src="img/<?=$lang?>.png" alt="<?=getEnglishName($lang)?>" title="<?=getEnglishName($lang)?>"
							/><br/><span class="imgCaption"><?= getEnglishName($lang) ?></span>
						</a>
					</td>
<?php
	 			if ($i % 10 == 9) {
	 				echo '</tr>';
				}
				$i += 1;
			}
?>
			</p>
		</div>
	</body>
</html>
