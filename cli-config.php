<?php

/** @var \App\Managers $managers */
$managers = require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($managers->original);
