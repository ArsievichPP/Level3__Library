<?php
define('SUM_BOOK_MAIN', 12);// number of books to display on the main page
define('SUM_BOOK_ADMIN', 5); // number of books to display on the admin page
define('DELETE_AFTER', 2); // Time before deleting a book in hours

//you have to run migrations for both values
define('USE_ONE_TABLE', false); // 'true' for use one table (books_author), 'false' for use three table (books, authors, relations)

define('BACKUP_DIR', '../backup'); // directory for saving backup files of database
define('VERSION_FILE_PATH', './'); // directory for saving file version of database

define('MYSQL_PATH', 'C:\Server\bin\mysql-8.0\bin\mysql.exe'); // path to mysql.exe
define('MYSQL_DUMP_PATH', 'C:\Server\bin\mysql-8.0\bin\mysqldump.exe'); // path to mysqldump.exe

define('HOST_NAME', 'Host2.com'); // name of your host. For example:( "your_host.com" /book/22)
