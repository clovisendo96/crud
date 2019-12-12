<?php

class Database
{
	
	private $_host = 'localhost';
	private $_user = 'root';
	private $_pass = '';
	private $_name = 'crud';

	protected $_connection;

	public function __construct()
	{
		if(!isset($this->connection))
		{
			$this->connection = new mysqli($this->_host, $this->_user, $this->_pass, $this->_name);
			if(!$this->connection)
			{
				echo "Error";
				exit;
			}
		}

		return $this->connection;

	}

}

?>