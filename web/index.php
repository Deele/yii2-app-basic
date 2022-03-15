<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

defined('YII_DEBUG') or define(
    'YII_DEBUG',
    isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE'] === '1'
);
if (YII_ENV_DEV) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
defined('YII_ENV') or define(
    'YII_ENV',
    $_SERVER['ENVIRONMENT'] ?? 'prod'
);

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
