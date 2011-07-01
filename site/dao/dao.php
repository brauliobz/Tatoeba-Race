<?php
	require_once('db.php');
	require_once('model/sentence.php');

	function getRandomSentence( $lang ) {

		global $db;

		if ( $lang == null )
			$lang = 'eng';
		
		$lang = $db->escapeString($lang);

		$sql1 = "SELECT count(*) \n" .
				"FROM sentences \n" .
				"WHERE lang = '$lang' " ;
		
		$rs = $db->query($sql1);

		$row = $rs->fetchArray();
		$total = $row[0];
		$offset = rand(0, $total-1);

		$sql2 =
				"SELECT id, text, lang " .
				"FROM sentences s " .
				"WHERE lang = '$lang' " .
				"LIMIT $offset, 1; ";
		
		$rs = $db->query($sql2);
		$row = $rs->fetchArray();

		$s = new Sentence();
		$s->id   = $row[0];
		$s->text = $row[1];
		$s->lang = $row[2];

		$s->text = trim($s->text);
		$s->text = substituteFunnyChars( $s->text );

		return $s;
	}

	function getRandomSentenceAndTranslation( $langFrom, $langTo ) {

		global $db;

		$langFrom = $db->escapeString($langFrom);
		$langTo = $db->escapeString($langTo);

		$sqlCount =
				"SELECT count(*) " .
				"FROM " .
				"	link_cache " .
				"WHERE " .
				"	lang1 = '$langFrom' " .
				"	AND lang2 = '$langTo' ";

		$rs = $db->query($sqlCount);

		$row = $rs->fetchArray();
		$total = $row[0];

		$offset = rand(0, $total-1);

		$sqlGet =
				"SELECT id1, text1, id2, text2 " .
				"FROM " .
				"	link_cache " .
				"WHERE " .
				"	lang1 = '$langFrom' " .
				"	AND lang2 = '$langTo' " .
				"LIMIT $offset, 1 ";
		
		$rs = $db->query($sqlGet);
		$row = $rs->fetchArray();

		$from = new Sentence();
		$from->id   = $row[0];
		$from->text = $row[1];
		$from->lang = $langFrom;

		$from->text = trim($from->text);
		$from->text = substituteFunnyChars( $from->text );

		$to = new Sentence();
		$to-> id = $row[2];
		$to->text = $row[3];
		$to->lang = $langTo;

		$to->text = trim($to->text);
		$to->text = substituteFunnyChars( $to->text );

		return array( $from, $to );
	}

	/**
	 * Obs.: this isn't a good solution, since some people have «'», but no «’»,
	 * and vice versa.
	 */
	function substituteFunnyChars( $text ) {
		
		// non-breaking space
		$text = str_replace("\xC2\xA0 ", " ", $text);
		$text = str_replace("\xC2\xA0", " ", $text);
		$text = str_replace("\xE2\x80\x89", " ", $text);

		// m-dash
		$text = str_replace("—", "-", $text);
		
		// n-dash
		$text = str_replace("–", "-", $text);

		// smart quotes and every type of quote to " or '
		$text = str_replace("‘", "'", $text);
		$text = str_replace("’", "'", $text);
		$text = str_replace("‘", "'", $text);

		$text = str_replace("“", '"', $text);
		$text = str_replace("”", '"', $text);
		$text = str_replace("„", '"', $text);
		
		return $text;
	}

	function getLanguagesFromDB() {
		
		global $db;

		$sql =
				"SELECT lang " .
				"FROM sentences " .
				"GROUP BY lang " .
				"ORDER BY lang ASC ";

		$langs = array();
		
		$rs = $db->query($sql);
		while ( ($row = $rs->fetchArray()) !== false ) {
			if ($row[0] !== "")
				$langs[] = $row[0];
		}

		return $langs;
	}
?>
