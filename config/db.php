<?php
$dsnParts = [];
if (isset($_SERVER['DATABASE_HOST']) && !empty($_SERVER['DATABASE_PORT'])) {
    $host = $_SERVER['DATABASE_HOST'];
} else {
    $host = 'localhost';
}
$dsnParts[] = 'host=' . $host;
if (
    isset($_SERVER['DATABASE_PORT']) &&
    !empty($_SERVER['DATABASE_PORT']) &&
    is_numeric($_SERVER['DATABASE_PORT'])
) {
    $dsnParts[] = 'port=' . (int)$_SERVER['DATABASE_PORT'];
}
$dsnParts[] = 'dbname=' . $_SERVER['DATABASE_NAME'];
$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => ($_SERVER['DATABASE_DRIVER'] ?? 'mysql') . ':' . implode(';', $dsnParts),
    'username' => $_SERVER['DATABASE_USER'],
    'password' => $_SERVER['DATABASE_PASSWORD'],
    'charset' => $_SERVER['DATABASE_CHARSET'] ?? 'utf8',
];

// Schema cache options (for production environment)
if (YII_ENV_PROD) {
    $dbConfig['enableSchemaCache'] = true;
    $dbConfig['schemaCacheDuration'] = 60;
    $dbConfig['schemaCache'] = 'cache';
}

return $dbConfig;