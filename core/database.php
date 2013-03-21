<?php

require_once dirname(dirname(__FILE__)).'/config.php';

class MS_Database 
{
	protected $_host 		= DB_HOST;
	protected $_user 		= DB_USER;
	protected $_password 	= DB_PASSWORD;
	protected $_dbname 		= DB_NAME;
	protected $_charset 	= DB_CHARSET;
	protected $_collate 	= DB_COLLATE;
	protected $_mysql; 
	
	function __construct() {
		$this->_mysql = new mysqli($this->_host, $this->_user, $this->_password, $this->_dbname);
		$this->_mysql->set_charset($this->_charset);
		
		// check connection
		if (mysqli_connect_errno()) {
			die('Counld not connect: '. mysqli_connect_error());
		}
	}
	
	function __destruct() {
		$this->_mysql->close();
	}
	
	public function callProcedure($procedure) {
		// Support arguments for procedure
		$args = func_get_args();
		array_shift($args); // take the $procedure out of the array
		
		foreach ($args as &$arg) {
			// Only support string and numeric arguments
			if (is_string($arg))
				$arg = "'".$this->_mysql->real_escape_string($arg)."'";
			else if (!is_numeric($arg))
				$arg = "''";
		}
		
		$result = $this->_mysql->query("call ".$procedure."(".implode(',', $args).");");
		$rows = array();
		
		if (is_object($result)) {
			if ($result->num_rows == 1) {
				$rows = $result->fetch_assoc();
			} else {
				while($row = $result->fetch_assoc())
					$rows[] = $row;
			}
			$result->free_result();
		} else {
			return $result;
		}
		
		// Free the result set
		while ($this->_mysql->more_results())
			$this->_mysql->next_result();
		
		return $rows;
	}
	
	public function query($queryString) {
		$rows = array();
		
		$queryString = $this->_mysql->real_escape_string($queryString);
		$result = $this->_mysql->query($queryString);
		
		if (is_object($result)) {
			if ($result->num_rows == 1) {
				$rows = $result->fetch_assoc();
			} else {
				while($row = $result->fetch_assoc())
					$rows[] = $row;
			}
			$result->free_result();
		} else {
			return $result;
		}
		
		return $rows;
	}
	
	public function storeArray($array, $table) {
		$cols = implode(',', array_keys($array));
		foreach (array_values($array) as $value)
		{
			isset($vals) ? $vals .= ',' : $vals = '';
			if (is_numeric($value))
				$vals .= $value;
			else
				$vals .= '\''.$this->_mysql->real_escape_string($value).'\'';
		}
		$query = 'REPLACE INTO `'.$table.'` ('.$cols.') VALUES ('.$vals.')';
		$result = $this->_mysql->query($query);
		var_dump($query);die;
		if ($result)
			return $this->_mysql->insert_id;
		else 
			return false;
	}
	
	public function getError() {
		return $this->_mysql->error();
	}
	
	public function insert($query){
		if($this->_mysql->query($query)==false)
			return false;
		return true;
	}
}
