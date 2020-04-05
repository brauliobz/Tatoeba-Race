#!/bin/bash

set -x

# wget -c https://downloads.tatoeba.org/exports/sentences.tar.bz2
# wget -c https://downloads.tatoeba.org/exports/links.tar.bz2 

# tar xf sentences.tar.bz2
# tar xf links.tar.bz2

# mv type.braul.io.sqlite3 type.braul.io.sqlite3.old -f
sed 's/"/\\"/g' sentences.csv > sentences.fixed.csv
sqlite3 -echo type.braul.io.sqlite3 < sqlite3_cmds.sql
