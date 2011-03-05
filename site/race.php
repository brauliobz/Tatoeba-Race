<<?='?'?>xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		
		<?php
			require_once('dao/dao.php');
			require_once('util/lang.php');

			$QTD_SENTENCES = 5;
			if ( isset($_REQUEST['n_sentences']) )
				$QTD_SENTENCES = (int)($_REQUEST['n_sentences']);
			if ( 1 > $QTD_SENTENCES || $QTD_SENTENCES > 25 )
				$QTD_SENTENCES = 5;

			if ( isset($_REQUEST['lang']) )
				$lang = $_REQUEST['lang'];
			else
				$lang = null;

			$sentences = array($QTD_SENTENCES);
			for ($i = 0; $i < $QTD_SENTENCES; $i++) {
				$sentences[$i] = getRandomSentence($lang);
			}
		?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Racing</title>
		<link href="style/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="javascript/prototype.js" ></script>
		<script type="text/javascript" src="javascript/race.js" ></script>
		
		<!-- Initialization script -->
		<script type="text/javascript">
			window.onload = function() {
				$('keyboardInput').value = '';
				race.text = $('text').textContent;
				race.startCountDown();
			};
		</script>

	</head>
	<body>
		<div id="content">
		<p id="textP" dir="<?= getDirection($_REQUEST['lang']) ?>">
				<span id="text"><?php
					if ( isset($_REQUEST['lang']) )
						$lang = $_REQUEST['lang'];
					else
						$lang = null;
					for ($i = 0; $i < $QTD_SENTENCES; $i++) {
						if ($i > 0)
							echo getSeparator($lang);
						echo $sentences[$i]->text;
					}
				?></span>
			</p>
			<p>
			<input id="keyboardInput" type="text" disabled="disabled" style="width: 100%;" dir="<?= getDirection($_REQUEST['lang']) ?>"/>
			</p>
			<p>
				<button id="btnPlayAgain" onclick="window.location = window.location" style="display: none;">Play again</button>
			</p>
			<p><label id="countDown"></label></p>
			<p><label id="time"></label></p>
			<p><label id="speed"></label></p>
			<p>
				Change nº of sentences:
				<?php
				for ($i = 5; $i <= 25; $i += 5) {
					echo "<a href=\"race.php?lang={$lang}&n_sentences={$i}\"/>{$i}</a> ";
				}
				?>
			</p>
			<p>
				<label id="sentenceLinks"><?php
					for ($i = 0; $i < $QTD_SENTENCES; $i++) {
						echo "<a href='http://tatoeba.org/sentences/show/{$sentences[$i]->id}'>{$sentences[$i]->id}</a> ";
					}
				?></label>
			</p>
			<p>Sentences CC-BY by Tatoeba (<a href="http://tatoeba.org">tatoeba.org</a>)</p>
		</div>
	</body>
</html>

