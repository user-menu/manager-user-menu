<?php
/**
 * Lop Model
 */
class Model
{
	private $where = '';
	private $orderBy = '';
	private $limit = '';

	// Phuong thuc khoi tao mac dinh
	public function __construct()
	{
		parent::__construct();
		$this->connect();
	}//END __construct()

	// Phuong thuc set dieu kien where
	public function where($where)
	{
		// Neu tham so truyen vao la mang
		if(is_array($where))
		{
			// Duyet mang de lay key va gia tri
			foreach ($where as $key => $val) {
				$arr[] = "{$key} '{$val}";
			}

			//
			$this->where = "WHERE ".implode(" AND ", $arr);
		}// END If
		else
		{
			// Neu tham so truyen vao khong phai la mang

			$this->where = "WHERE $where";

		}// End Else
	}// END setWhere()

	// Phuogn set limit
	public function limit($start, $record)
	{
		$this->limit = "LIMIT {$start}, {$record}";
	}// END limit()

	// Phuong thuc set dieu kien orderBy
	public function orderBy($col, $orderBy)
	{
		$this->orderBy = "ORDER BY $col $orderBy";
	}// END orderBy()

	// Phuong thuc dem tat ca dong record
	public function countAll($table)
	{
		$this->query("SELECT count(*) FROM $table");
		return $this->numRows();
	}

	// Phuong thuc select
	public function select($select = '*', $table)
	{
		$sql = "SELECT {$select} FROM {$table} {$this->where} {$this->orderBy} {$this->limit}";
		$this->query($sql);
		return $this->getAllRecord();
	}// END select()

	// Phuong thuc insert
	public function insert($data, $table)
	{
		// Tach mang de lay field
		$field = implode(", ",array_keys($data));

		// Tach mang de lay value
		foreach ($data as $k => $v) {
			$arr[] = "'$v'";
		}
		$value = implode(", ",array_values($arr));

		// Cau lenh truy van
		$sql = "INSERT INTO $table ($field) VALUES ($value)";
		$this->query($sql);

		// Kiem tra them du lieu thanh cong hay khong
		if($this->affectedRows())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}// END insert()

	// Phuong thuc update
	public function update($data, $table)
	{
		// Tach mang de lay truong va gia tri
		foreach ($data as $k => $v) {
			$arr[] = "$k = '$v'";
		}

		// Chuyen tu mang sang chuoi
		$data2 = implode(", ", $arr);

		// Cau lenh update
		$sql = "UPDATE {$table} SET {$data2} LIMIT 1";
		$this->query($sql);

		// Kiem tra udpate du lieu thanh cong hay khong
		if($this->affectedRows())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}// END update()

	// Phuong thuc delete
	public function delete($table)
	{
		// Cau lenh delete record
		$sql = "DELETE FROM {$table} {$this->where} LIMIT 1";
		$this->query($sql);

		// Kiem tra udpate du lieu thanh cong hay khong
		if($this->affectedRows())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}// END delete()

	


}