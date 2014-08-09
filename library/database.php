<?php
/**
 * Lop core Database
 */
class Database
{
	//
	private $conn;
	private $query;

	// Phuong thuc ket noi CSDL
	public function connect()
	{
		if(!$this->conn = mysql_connect(HOSTNAME, USERNAME, PASSWORD))
		{
			die("MYSQL Error:".mysql_error());
		} // END If
		else
		{
			mysql_select_db(DBNAME, $this->conn);
			mysql_query("SET NAMES 'UTF8'");
		} // END Else
	}// END connect()

	// Phuong thuc ngat ket noi CSDL
	public function disconnect(){
		if($this->conn)
		{
			mysql_close($this->conn);
		}// END IF
	}// END disconnect()

	// Phuong thuc truy van CSDL
	public function query($sql)
	{
		return $this->query = mysql_query($sql);
	}// END query()

	// Phuong thuc dem so dong tra ve
	public function numRows()
	{
		$rows = 0;
		if($this->query)
		{
			$rows = mysql_num_rows($this->query);
		}
		return $rows;
	}// END numRows()

	// Phuong thuc affected row
	public function affectedRows()
	{
		if(mysql_affected_rows($this->conn))
		{
			return TRUE;
		}
		return FALSE;
	}
	// Phuong thuc lay 1 dong du lieu
	public function getOnceRecord()
	{
		$data = 0;
		if($this->query)
		{
			$data = mysql_fetch_array($this->query, MYSQL_ASSOC);
		}// END If
	}// END getOnceRecord()

	// Phuong thuc lay tat ca du lieu
	public function getAllRecord()
	{
		$data = 0;
		if($this->query)
		{
			while ($row = mysql_fetch_array($this->query, MYSQL_ASSOC))
			{
				$data[] = $row;
			}// End WHILE
		}// END IF
		return $data;
	}// END getAllRecord()


}// END Database