<?php
abstract class _TableManager{
	protected $dbConnect;
	protected $table;
	
	protected function setNew($objet){

	}
	public function read($id){
		if (isset($id)){
		$connect = $this->dbConnect;
		$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
		$response->bindParam(':id', $id, PDO::PARAM_INT);
		$response->execute();
		return $response->fetch(PDO::FETCH_ASSOC);
		}
	}
	public function update($id){

	}
	public function delete($id){
		$connect = $this->dbConnect; 
		$response = $connect->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
		$response->bindParam(':id', $id, PDO::PARAM_INT);
		$response->execute();
}
	public function exist($id){
		if (isset($id)){
			// recherche par id
			if (is_int($id)){
				$connect = $this->dbConnect; 
				$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
				$response->bindParam(':id', $id, PDO::PARAM_INT);
				$response->execute();
				return $response->fetch(PDO::FETCH_ASSOC);
			}
			// recherche par string(titre,nom... par héritage)

		}	
	}
	public function count(){
		$connect = $this->dbConnect; 
		$response = $connect->prepare("SELECT COUNT(id) AS `total` FROM " . $this->table);			
		$response->execute();
		return $response->fetch(PDO::FETCH_ASSOC);
	}
}