<?php
// create_product.php <name>
use App\Bug;
use App\Managers;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;

/** @var Managers $managers */
$managers = require_once "bootstrap.php";


function test(EntityManager $em) {
	$qb = $em->getRepository(Bug::class)->createQueryBuilder('d');
	$qb->setMaxResults(50);
	$qb->orderBy('d.reporter');
	$paginator = new Paginator($qb->getQuery());
	try {
		$paginator->getIterator();
		echo 'ok';
	} catch (Throwable $e) {
		echo $e->getMessage();
	}
}

echo "Bug with original platform:\n";
test($managers->original);

echo "\n";
echo "\n";
echo "\n";
echo "No bug with custom platform for ROW_NUMBER support:\n";
test($managers->custom);

echo "\n";
