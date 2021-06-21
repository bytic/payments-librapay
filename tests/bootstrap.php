<?php

use Nip\Container\Container;

define('PROJECT_BASE_PATH', __DIR__ . '/..');
define('TEST_BASE_PATH', __DIR__);
define('TEST_FIXTURE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'fixtures');

require dirname(__DIR__) . '/vendor/autoload.php';

if (file_exists(TEST_BASE_PATH . DIRECTORY_SEPARATOR . '.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(TEST_BASE_PATH);
    $dotenv->load();
}

function envVar($key)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }
    return getenv($key);
}

$container = new Container();
Container::setInstance($container);

$container->set('inflector', \Nip\Inflector\Inflector::instance());

$translator = Mockery::mock(\Nip\I18n\Translator::class)->shouldAllowMockingProtectedMethods()->makePartial();
$translator->shouldReceive('persistLocale');
$container->set('translator', $translator);
$container->set('request', new \Nip\Request());

$data = [
    'payments' => [
        'gateways' => ['Librapay']
    ]
];
$container->set('config', new \Nip\Config\Config($data));
