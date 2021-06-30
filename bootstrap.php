<?php
error_reporting(-1);

// bootstrap.php
use App\Managers;
use App\Platform;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

$conn = array(
	'driver' => 'pdo_mysql',
	'user' => 'root',
	'password' => '123',
	'dbname' => 'ormbug',
	'host' => 'db',
);

// obtaining the entity manager
function getAnnotationMetadataConfiguration(): Configuration {
	return Setup::createAnnotationMetadataConfiguration(
		array(__DIR__ . "/src"),
		true,
		null,
		null,
		false
	);
}

$original = EntityManager::create($conn, getAnnotationMetadataConfiguration());
$custom = EntityManager::create(
	array_merge(
		$conn,
		[
			'platform' => new Platform(),
		]
	),
	getAnnotationMetadataConfiguration()
);

return new Managers($original, $custom);