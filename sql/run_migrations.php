<?php
require_once '../config/settings.php';
$DBConfig = require_once '../config/configDB.php';

$files = getMigrationsFiles();

if (empty($files)) {
    echo 'База данных в актуальном состоянии';
} else {
    foreach ($files as $file) {
        migrate($DBConfig, $file);
    }
}

/**
 * @return array|false
 */
function getMigrationsFiles()
{
    $sqlFolder = USE_ONE_TABLE ? 'oneTable/' : 'threeTable/';
    $allSqlFiles = glob('./' . $sqlFolder . '*.sql');

    $firstMigration = !file_exists(VERSION_FILE_PATH . 'version.json');

    if ($firstMigration) {
        return $allSqlFiles;
    }

    $versionFiles = json_decode(file_get_contents(VERSION_FILE_PATH . 'version.json'));
    return array_diff($allSqlFiles, $versionFiles);
}

/**
 * @param $db - configuration of data base
 * @param $file - sql file
 */
function migrate($db, $file)
{
    $mysqlPath = MYSQL_PATH;
    $command = " $mysqlPath --host={$db['host']} --user={$db['user']} --password={$db['pass']} {$db['dbname']} < $file";
    $res = system($command);
    echo $res;

    if (file_exists(VERSION_FILE_PATH . 'version.json')) {
        $version = json_decode(file_get_contents(VERSION_FILE_PATH . 'version.json'));
        array_push($version, $file);
    } else {
        $version[] = $file;
    }

    file_put_contents(VERSION_FILE_PATH . 'version.json', json_encode($version));
}


