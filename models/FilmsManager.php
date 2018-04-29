<?php
class FilmsManager extends _TableManager{
	use ManagerConstructor;
	public function setNew($nom){
		if (!$this->exist($nom)){
			$connect = $this->dbConnect;
			$response = $connect->prepare("INSERT INTO " . $this->table . " (film) VALUES (:film)");
			$response->bindParam(':film', $nom, PDO::PARAM_STR);
			$response->execute();
			$lastId = $connect->lastInsertId();
			return $this->read($lastId);
		} else {
			echo 'le film existe déja';
		}
		
	}
	public function exist($id){
		// recherche par id
		if (is_int($id)){
			return parent::exist($id);
		}
		// recherche par nom		
		if (is_string($id)){
			$connect = $this->dbConnect; 
				$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE film = :film");
				$response->bindParam(':film', $id, PDO::PARAM_STR);
				$response->execute();
				return $response->fetch(PDO::FETCH_ASSOC);
		}
	}
	public function update($film){
		if ($this->exist((int)$film->getId())){
			$name = $film->getName();
			$id = $film->getId();
			$connect = $this->dbConnect;
			$response = $connect->prepare("UPDATE " . $this->table . " SET film = :film WHERE id=:id");
			$response->bindParam(':id', $id, PDO::PARAM_STR);
			$response->bindParam(':film', $name, PDO::PARAM_STR);
			$response->execute();
			
			return $this->read((int)$film->getId());
		} else {
			echo '<br>le film n\' existe pas, update impossible<br>';
		}
	}
}