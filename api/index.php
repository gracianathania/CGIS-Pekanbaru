<?php

// Suppress deprecation notices from newer PHP versions in serverless environment
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

// Default fallback environment variables for Vercel deployment
if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:0Arvn8i0I3CIWspqySzimxomDrkQyPgt5zDIEpCiaRY=');
    $_ENV['APP_KEY'] = 'base64:0Arvn8i0I3CIWspqySzimxomDrkQyPgt5zDIEpCiaRY=';
    $_SERVER['APP_KEY'] = 'base64:0Arvn8i0I3CIWspqySzimxomDrkQyPgt5zDIEpCiaRY=';
}

if (!getenv('APP_ENV')) {
    putenv('APP_ENV=production');
    $_ENV['APP_ENV'] = 'production';
    $_SERVER['APP_ENV'] = 'production';
}

if (!getenv('APP_DEBUG')) {
    putenv('APP_DEBUG=true');
    $_ENV['APP_DEBUG'] = 'true';
    $_SERVER['APP_DEBUG'] = 'true';
}

if (!getenv('LOG_CHANNEL')) {
    putenv('LOG_CHANNEL=stderr');
    $_ENV['LOG_CHANNEL'] = 'stderr';
    $_SERVER['LOG_CHANNEL'] = 'stderr';
}

if (!getenv('SESSION_DRIVER')) {
    putenv('SESSION_DRIVER=cookie');
    $_ENV['SESSION_DRIVER'] = 'cookie';
    $_SERVER['SESSION_DRIVER'] = 'cookie';
}

// Prepare writable storage & cache directories in /tmp for Vercel environment
$storageDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_SERVER['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');

// Forward request to Laravel public/index.php
require __DIR__ . '/../public/index.php';
