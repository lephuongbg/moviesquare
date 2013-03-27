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
	
	public function escape($string) {
		return $this->_mysql->real_escape_string($string);
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
	
	/**
	 * Query database
	 * @param string $queryString - contain SQL query statement
	 * @param string $return_mode - TODO definition here
	 * @return mixed array/string/TRUE if queried successfully; FALSE if queried unsuccessfully
	 */
	public function query($queryString, $returnMode = 'auto') {
		$rows = array();
		
		//$queryString = $this->_mysql->real_escape_string($queryString);
		$result = $this->_mysql->query($queryString);
		
		if (is_object($result)) {
			switch ($returnMode) {
				case 'array':
					while($row = $result->fetch_assoc())
					$rows[] = $row;
					break;
				case 'auto':
				default:
					// return the record directly if there's only one,
					if ($result->num_rows == 1 && $returnMode == 'auto') {
						$rows = $result->fetch_assoc();
					// else, put all records inside array
					} else {
						while($row = $result->fetch_assoc())
							$rows[] = $row;
					}
					break;
			}
			
			$result->free_result();
		} else {
			// this may be TRUE/FALSE
			return $result;
		}
		
		return $rows;
	}
	
	/**
	 * Store an array into a table
	 * @param array  $data	- Associative array with keys corresponding to table fields
	 * @param string $table	- Table name
	 * @param string $pKey	- Name of the primary key for the table
	 * @return int   $updated_id - The value of the primary key of new/updated record
	 */
	public function storeArray($data, $table, $pKey = 'id') {
		$cols = implode(',', array_keys($data));
		$updated_id = 0;
		foreach (array_values($data) as $value)
		{
			isset($vals) ? $vals .= ',' : $vals = '';
			if (is_numeric($value))
				$vals .= $value;
			else
				$vals .= '\''.$this->_mysql->real_escape_string($value).'\'';
		}

		if (isset($data[$pKey]) && !empty($data[$pKey])) {
			$query = 'REPLACE INTO `'.$table.'` ('.$cols.') VALUES ('.$vals.')';
			$result = $this->_mysql->query($query);
			if ($result)
				$updated_id = $data[$pKey];
		} else {
			$query = 'INSERT INTO `'.$table.'` ('.$cols.') VALUES ('.$vals.')';
			$result = $this->_mysql->query($query);
			if ($result)
				$updated_id = $this->_mysql->insert_id;
		}
		
		return $updated_id;
	}
	
	public function getError() {
		return $this->_mysql->error;
	}
	
}
