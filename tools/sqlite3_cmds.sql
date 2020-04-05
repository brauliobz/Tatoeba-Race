SELECT '>>> Creating tables and indexes';

CREATE TABLE sentences (
	id int primary key,
	lang varchar(10),
	text varchar(2048)
);

CREATE INDEX idx_sentences_id ON sentences(id);
CREATE INDEX idx_sentences_lang ON sentences (lang);

CREATE TABLE links (
	id1 INT,
	id2 INT,
	PRIMARY KEY(id1, id2)
);

CREATE INDEX idx_links_from ON links(id1);
CREATE INDEX idx_links_to   ON links(id2);

--CREATE TABLE tags (
--	id_sentence INT,
--	tag VARCHAR(100),
--	PRIMARY KEY(id_sentence, tag)
--);

--CREATE INDEX idx_id_sentence ON tags(id_sentence);
--CREATE INDEX idx_tags ON tags(tag);

CREATE TABLE link_cache (
	id1 INT,
	text1 VARCHAR(2048),
	lang1 VARCHAR(10),
	id2 INT,
	text2 VARCHAR(2048),
	lang2 VARCHAR(10),
	PRIMARY KEY(id1, id2)
);

CREATE INDEX idx_link_cache_lang_1_and_2 ON link_cache(lang1, lang2);

.separator \t

SELECT '>>> Importing sentences';
.import sentences.fixed.csv sentences

SELECT '>>> Importing links';
.import links.csv links

--SELECT '>>> Importing tags';
--.import tags.csv tags

SELECT '>>> Vacuumizing the database';
VACUUM;

SELECT '>>> Creating the link cache';
INSERT INTO link_cache
SELECT
	s1.id, s1.text, s1.lang,
	s2.id, s2.text, s2.lang
FROM
	links
	INNER JOIN sentences s1 ON s1.id = links.id1
	INNER JOIN sentences s2 ON s2.id = links.id2 ;
