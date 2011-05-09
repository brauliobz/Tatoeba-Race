<?php

/**
 * Returns the sentence separator. The default is
 * a single space between phrases.
 */
function getSeparator( $lang ) {
	if ( $lang === 'jbo' ) // Lojban
		return ' .i ';
	if (
			$lang === 'jpn' or // Japanese
			$lang === 'cmn' or // Chinese
			$lang === 'wuu' or // Shangainese
			$lang === 'lzh' // Literary Chinese
		)
		return '';
	else
		return ' ';
}

/**
 * Returns the direction of the language: left-to-right ('ltr')
 * or right-to-left ('rtl').
 */
function getDirection( $lang ) {
	if (
			$lang === 'ara' or // Arabic
			$lang === 'pes' or // Persian
			$lang === 'heb' or // Hebrew
			$lang === 'uig' or // Uygur
			$lang === 'arz' or // Egyptian Arabic
			$lang === 'yid' or // Yiddish
			$lang === 'acm' or // Iraq Arabic
			$lang === 'urd' )  // Urdu
		return 'rtl';
	else
		return 'ltr';
}

/**
 * Returns the English name of the language.
 */
function getEnglishName( $lang ) {
	$name = array(
		'afr' => 'Afrikaans',
		'ain' => 'Ainu',
		'ast' => 'Asturian',
		'sqi' => 'Albanian',
		'ara' => 'Arabic',
		'hye' => 'Armenian',
		'eus' => 'Basque',
		'bel' => 'Belarusian',
		'ben' => 'Bengali',
		'bos' => 'Bosnian',
		'bre' => 'Breton',
		'bul' => 'Bulgarian',
		'yue' => 'Cantonese',
		'cat' => 'Catalan',
		'cha' => 'Chamorro',
		'cmn' => 'Chinese',
		'hrv' => 'Croatian',
		'cycl' => 'CycL',
		'ces' => 'Czech',
		'dan' => 'Danish',
		'nld' => 'Dutch',
		'arz' => 'Egyptian Arabic',
		'eng' => 'English',
		'epo' => 'Esperanto',
		'est' => 'Estonian',
		'fao' => 'Faroese',
		'fin' => 'Finnish',
		'fra' => 'French',
		'fry' => 'Frisian',
		'gla' => 'Scottish Gaelic',
		'glg' => 'Galician',
		'kat' => 'Georgian',
		'deu' => 'German',
		'heb' => 'Hebrew',
		'hin' => 'Hindi',
		'hun' => 'Hungarian',
		'isl' => 'Icelandic',
		'ind' => 'Indonesian',
		'ina' => 'Interlingua',
		'acm' => 'Iraqi Arabic',
		'gle' => 'Irish',
		'ita' => 'Italian',
		'jpn' => 'Japanese',
		'kaz' => 'Kazakh',
		'tlh' => 'Klingon',
		'kor' => 'Korean',
		'lat' => 'Latin',
		'lvs' => 'Latvian',
		'lzh' => 'Literary Chinese',
		'lit' => 'Lithuanian',
		'jbo' => 'Lojban',
		'nds' => 'Low German',
		'zsm' => 'Malay',
		'mal' => 'Malayalam',
		'ell' => 'Modern Greek',
		'mon' => 'Mongolian',
		'nob' => 'Norwegian (Bokmål)',
		'non' => 'Norwegian (Nynorsk)',
		'orv' => 'Old East Slavic',
		'oss' => 'Ossetian',
		'pes' => 'Persian',
		'pol' => 'Polish',
		'por' => 'Portuguese',
		'que' => 'Quechua',
		'ron' => 'Romanian',
		'roh' => 'Romansh',
		'rus' => 'Russian',
		'san' => 'Sanskrit',
		'srp' => 'Serbian',
		'wuu' => 'Shanghainese',
		'scn' => 'Sicilian',
		'slk' => 'Slovak',
		'slv' => 'Slovenian',
		'spa' => 'Spanish',
		'swh' => 'Swahili',
		'swe' => 'Swedish',
		'tgl' => 'Tagalog',
		'tat' => 'Tatar',
		'nan' => 'Teochew',
		'tha' => 'Thai',
		'toki' => 'Toki Pona',
		'tur' => 'Turkish',
		'ukr' => 'Ukrainian',
		'urd' => 'Urdu',
		'uig' => 'Uyghur',
		'uzb' => 'Uzbek',
		'vie' => 'Vietnamese',
		'vol' => 'Volapük',
		'yid' => 'Yiddish'
	);

	if ( isset($name[$lang]) )
		return $name[$lang];
	else
		return 'Unknown';
}

?>
