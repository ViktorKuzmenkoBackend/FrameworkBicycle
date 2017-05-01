<?

namespace application\models;
use application\core\DB;
/**
	*@property $id
*/
abstract class abstractModel {

	static protected $table;

	protected $data = [];

	public function __set($k,$v)
		{
			 $this->data[$k] = $v;
		}

	public function __get($k)
		{
			 return $this->data[$k];
		}

	public function getTable()
		{
			return  static::$table;
		}

	public function findAll()
		{
			 
			$sql = "SELECT * FROM  " . static::getTable();
			$db = new DB();
			 
			return $db->query($sql);
		}

	public function findOneById($id)
		{
			 $sql = "SELECT * FROM ". static::getTable() ." WHERE id = :id";
			 $db = new DB();
			return $db->query($sql,[':id'=>$id]);
		}


	public function insert()
		{
			$cols = array_keys($this->data);
			 $ins = [];
			$data = [];

			foreach ($cols as $key) {
				 $ins[] = ":".$key;
				 $data[':'. $key] = $this->data[$key];
			}
			 

			 $sql = "INSERT INTO  ". static::getTable() . "
			 				 (". implode(',', $cols).")
			 				 VALUES 
			 				 (".implode(',', $ins).")"; 
			$db = new DB();

			$db->execute($sql,$data);
			$this->id = $db->LastInserId();
		}


	public function update()
		{
			 $cols = array_keys($this->data);

			 foreach ($cols as $key) {
				  
				 $data[':'.$key] = $this->data[$key];
				$up[] = $key.'=:'.$key;

			 	 
			}
	 		
			 $sql = "UPDATE " .static::getTable(). " SET  ".implode(',', $up). " WHERE id = :id";
			 $db = new DB();
			 $db->execute($sql,$data);
	 		    

		}

	public function delete()
		{
			 $sql = "DELETE FROM ".static::getTable()." WHERE id = :id";
			 $db = new DB();
			 $db->execute($sql,[':id'=>$this->data['id']]);
		}
}


/**
* 
*/

