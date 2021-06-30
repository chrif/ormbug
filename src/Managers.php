<?php declare(strict_types=1);

namespace App;

use Doctrine\ORM\EntityManager;

final class Managers {

	
	
	/** @var EntityManager */
	public $original;

	/** @var EntityManager */
	public $custom;

	public function __construct(EntityManager $original, EntityManager $custom) {
		$this->original = $original;
		$this->custom = $custom;
	}

}