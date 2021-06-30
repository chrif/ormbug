<?php
// src/Bug.php

namespace App;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bugs")
 */
class Bug
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Bug", inversedBy="reportedBugs")
	 * @ORM\JoinColumn(name="reporter_id", referencedColumnName="id")
	 */
	private $reporter;


}