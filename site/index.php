<?php include_once('include/top.php'); ?>

<?php require_once('dao/dao.php'); ?>
<?php require_once('util/lang.php'); ?>

<div id="content">

	<h1>Tatoeba Racer</h1>

	<ul>
		<li>
			<form action="race.php" method="GET">
				<strong>One Language</strong><br/>Practice sentences in
				<select name="lang" id="lang" ><?php
					foreach ( getLanguages() as $lang ) {
						echo '<option value="' . $lang . '">' . getEnglishName($lang) . "</option>";
					}
				?></select> -
				<input type="submit" value="Go" />
			</form>
		</li>
		<li>
			<form action="race.php" method="GET">
				<strong>Two Languages</strong><br/>
				Practice sentences in
				<select name="lang" id="lang" ><?php
					foreach ( getLanguages() as $lang ) {
						echo '<option value="' . $lang . '">' . getEnglishName($lang) . "</option>";
					}
				?></select>
				and their translations into
				<select name="lang_to" id="langTo" ><?php
					foreach ( getLanguages() as $lang ) {
						echo '<option value="' . $lang . '">' . getEnglishName($lang) . "</option>";
					}
				?></select> -
				<input type="submit" value="Go" />
			</form>
		</li>
	</ul>

</div>

<?php include_once('include/bottom.php'); ?>
