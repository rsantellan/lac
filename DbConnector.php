<?php

use Doctrine\Common\ClassLoader;


class DbConnector 
{
	
	private $connParams;

	private $dbh;

	public function __construct()
	{
		require require_once __DIR__.'/path/to/doctrine/lib/Doctrine/Common/ClassLoader.php';

	}
}