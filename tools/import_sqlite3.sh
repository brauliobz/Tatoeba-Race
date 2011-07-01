mv $1 $1.old
sqlite3 -echo -init sqlite3_cmds.sql $1
