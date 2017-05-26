<?php


class DbConnector 
{
	
	private $connParams;

	private $dbh;

	public function __construct()
	{
		$connectionParams = array(
		    'dbname' => 'laura_lac',
		    'user' => 'root',
		    'password' => 'root',
		    'host' => 'localhost',
		    'port' => 3306,
		    'charset' => 'utf8',
		    'driver' => 'pdo_mysql',
		);
		$config = new \Doctrine\DBAL\Configuration();
		$this->dbh = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
	}

	public function closeAll()
	{
		if($this->dbh != null){
			$this->dbh->close();
		}
	}
	public function runSqlQuery($sql, $params = array())
	{
		//var_dump($sql);
		$sth = null;
		if(count($params) == 0){
			$sth = $this->dbh->query($sql);
		}else{
			$sth = $this->dbh->prepare($sql);
			foreach($params as $key => $value){
				$sth->bindValue($key, $value);
			}
			$sth->execute();
			//$sth = $this->dbh->query($sql, $params);
		}
		if($sth == null){
			return null;
		}
		return $sth->fetchAll();
	}
}