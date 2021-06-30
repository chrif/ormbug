<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
	 * @var Bug[] An ArrayCollection of Bug objects.
	 */
	private $reportedBugs;
}