mv $1 $1.old
sqlite3 -echo $1 < sqlite3_cmds.sql
