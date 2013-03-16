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
		if ($result) {
			while($row = $result->fetch_assoc())
				$rows[] = $row;
			$result->close();
		}
		
		// Convert array of result into the result itself if there is only one result
		if (count($rows) == 1)
			$rows = array_shift($rows);
		
		// Free the result set
		$this->_mysql->next_result();
		
		return $rows;
	}
}
