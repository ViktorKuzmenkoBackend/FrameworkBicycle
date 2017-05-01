<?
namespace application\core;
use pdo;


class DB 
{
	
	private $dbh;

	 
	function __construct()
	{
		 $dsn = 'mysql:dbname=book;host=localhost';
		$this->dbh = new PDO($dsn, 'root','');
	}


	 

	public function query($sql,$param = [])
	{

		 $sth = $this->dbh->prepare($sql);
		 $sth->execute($param);
		 return $sth->fetchAll();
	}

	public function execute($sql,$param = [])
	{
		 
		 $sth = $this->dbh->prepare($sql);
		  $sth->execute($param);
		 
	}

	public function LastInserId()
	{
		return $this->dbh->lastInsertId();
	}



}