<?php

require_once '../config/settings.php';
$config_db = require_once '../config/configDB.php';
$mysqldumpPath = MYSQL_DUMP_PATH;

if (!is_dir(BACKUP_DIR)) {
    mkdir(BACKUP_DIR);
}

$backupName = date('d-m-Y_(H-i-s)') . 'backup.sql';

$command = "\"$mysqldumpPath\" -u{$config_db['user']}  -p{$config_db['pass']} -h{$config_db['host']} {$config_db['dbname']} > " . BACKUP_DIR . '/' . $backupName;
system($command);



