<?php include_once('include/top.php'); ?>

<?php require_once('dao/dao.php'); ?>
<?php require_once('util/lang.php'); ?>

<div id="content">
	<h1 style="text-align: center;">Choose a language</h1>
	<table style="text-align: center; border: 0px solid; margin: auto;">
	<?php
		$i = 0;
		$cols = 13;
		foreach(getLanguages() as $lang) {
			if ($i % $cols == 0)
				echo '<tr>';
	?>
			<td style="vertical-align: top; width: 50px; height: 70px;">
				<a href="race.php?lang=<?=$lang?>" class="flagLink">
					<img src="img/<?=$lang?>.png" alt="<?=getEnglishName($lang)?>" title="<?=getEnglishName($lang)?>"
					/><br/><span class="imgCaption"><?= getEnglishName($lang) ?></span>
				</a>
			</td>
	<?php
	 		if ($i % $cols === $cols - 1)
	 			echo '</tr>';
			$i += 1;
		}
		if ( $i % $cols !== 0 )
			echo '</tr>';
	?>
	</table>
</div>

<?php include_once('include/bottom.php'); ?>
