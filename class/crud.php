<?php

	include_once 'database.php';

	class Crud extends Database
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function getData($sql)
		{
			$result = $this->connection->query($sql);
			if($result == false)
			{
				return false;
			}

			$rows = array();

			while($row = $result->fetch_assoc())
			{
				$rows[] = $row;
			}

			return $rows;
		}

		public function executeSQL($sql)
		{
			$result = $this->connection->query($sql);
		
			if ($result == false) {
				echo 'Error: cannot execute the command';
				return false;
			} else {
				return true;
			}	
		}

		public function delete($id, $table) 
		{ 
			$query = "DELETE FROM $table WHERE id = $id";
		
			$result = $this->connection->query($query);
	
			if ($result == false) {
				echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
				return false;
			} else {
				return true;
			}
		}

		public function escape_string($value)
		{
			return $this->connection->real_escape_string($value);
		}

	}

?>