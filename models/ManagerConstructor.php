<?php
trait ManagerConstructor{
	public function __construct($pdo, $table){
		$this->dbConnect = $pdo;
		$this->table = $table;
	}
}