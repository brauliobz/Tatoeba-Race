<?php include_once('include/top.php'); ?>

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
				$lang = 'eng';

			if ( isset($_REQUEST['lang_to']) )
				$langTo = $_REQUEST['lang_to'];
			else
				$langTo = null;

			$sentences = array($QTD_SENTENCES);
			for ($i = 0; $i < $QTD_SENTENCES; $i++) {
				if ( $langTo == null )
					$sentences[$i] = getRandomSentence($lang);
				else
					$sentences[$i] = getRandomSentenceAndTranslation($lang, $langTo);
			}
		?>

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

		<div id="content">
		<p id="textP" dir="<?= getDirection($_REQUEST['lang']) ?>">
				<span id="text"><?php
					for ($i = 0; $i < $QTD_SENTENCES; $i++) {
						if ( $langTo == null ) {
							if ($i > 0)
								echo getSeparator($sentences[$i]->lang);
							echo $sentences[$i]->text;
						} else {
							if ($i > 0) {
								echo getSeparator($sentences[$i][1]->lang);
							}
							echo $sentences[$i][0]->text;
							echo getSeparator($sentences[$i][0]->lang);
							echo $sentences[$i][1]->text;
						}
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
					if ( $langTo == null )
						echo "<a href=\"race.php?lang={$lang}&amp;n_sentences={$i}\" >{$i}</a> ";
					else
						echo "<a href=\"race.php?lang={$lang}&amp;lang_to={$langTo}&amp;n_sentences={$i}\" >{$i}</a> ";
				}
				?>
			</p>
			<p>
				<label id="sentenceLinks"><?php
					for ($i = 0; $i < $QTD_SENTENCES; $i++) {
						if ($langTo == null) {
							echo "<a href='http://tatoeba.org/sentences/show/{$sentences[$i]->id}' title='{$sentences[$i]->text}'>{$sentences[$i]->id}</a> ";
						} else {
							echo "<a href='http://tatoeba.org/sentences/show/{$sentences[$i][0]->id}' title='{$sentences[$i][0]->text}'>{$sentences[$i][0]->id}</a> ";
							echo "<a href='http://tatoeba.org/sentences/show/{$sentences[$i][1]->id}' title='{$sentences[$i][1]->text}'>{$sentences[$i][1]->id}</a> ";
						}
					}
				?></label>
			</p>
			<p>Sentences CC-BY by Tatoeba (<a href="http://tatoeba.org">tatoeba.org</a>)</p>
		</div>

<?php include_once('include/bottom.php'); ?>
