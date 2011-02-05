mysqlimport --local -c id,lang,text  -u root -p tatoeba_sentences sentences.csv
mysqlimport --local -c id_from,id_to -u root -p tatoeba_sentences links.csv
