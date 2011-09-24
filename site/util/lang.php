<?php

/**
 * Return all the languages' codes.
 */
function getLanguages() {
	return array(
		'afr', 'ain', 'ast', 'sqi', 'ara', 'hye', 'eus', 'bel', 'ben', 'bos',
		'bre', 'bul', 'yue', 'cat', 'cha', 'cmn', 'hrv', 'cycl', 'ces', 'dan',
		'nld', 'arz', 'eng', 'epo', 'est', 'fao', 'fin', 'fra', 'fry', 'gla',
		'glg', 'kat', 'deu', 'heb', 'hin', 'hun', 'isl', 'ido', 'ind', 'ina',
		'ile', 'acm', 'gle', 'ita', 'jpn', 'kaz', 'tlh', 'kor', 'lat', 'lvs',
		'lzh', 'lit', 'jbo', 'nds', 'zsm', 'mal', 'ell', 'mon', 'nob', 'non',
		'orv', 'oss', 'pes', 'pol', 'por', 'que', 'ron', 'roh', 'rus', 'san',
		'srp', 'wuu', 'scn', 'slk', 'slv', 'spa', 'swh', 'swe', 'tgl', 'tat',
		'nan', 'tha', 'toki', 'tur', 'ukr', 'urd', 'uig', 'uzb', 'vie', 'vol',
		'xal', 'yid');
}

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
		'ido' => 'Ido',
		'ind' => 'Indonesian',
		'ina' => 'Interlingua',
		'ile' => 'Interlingue',
		'acm' => 'Iraqi Arabic',
		'gle' => 'Irish',
		'ita' => 'Italian',
		'jpn' => 'Japanese',
		'xal' => 'Kalmyk',
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
