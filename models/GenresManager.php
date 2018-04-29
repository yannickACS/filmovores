<?php
class GenresManager extends _TableManager{
	use ManagerConstructor;
	public function setNew($nom){
		if (!$this->exist($nom)){
			$connect = $this->dbConnect;
			$response = $connect->prepare("INSERT INTO " . $this->table . " (genre) VALUES (:genre)");
			$response->bindParam(':genre', $nom, PDO::PARAM_STR);
			$response->execute();
			$lastId = $connect->lastInsertId();
			return $this->read($lastId);
		} else {
			echo 'le réalisateur existe déja';
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
				$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE genre = :genre");
				$response->bindParam(':genre', $id, PDO::PARAM_STR);
				$response->execute();
				return $response->fetch(PDO::FETCH_ASSOC);
		}
	}
	public function update($genre){
		if ($this->exist((int)$genre->getId())){
			$name = $genre->getName();
			$id = $genre->getId();
			$connect = $this->dbConnect;
			$response = $connect->prepare("UPDATE " . $this->table . " SET genre = :genre WHERE id=:id");
			$response->bindParam(':id', $id, PDO::PARAM_STR);
			$response->bindParam(':genre', $name, PDO::PARAM_STR);
			$response->execute();
			
			return $this->read((int)$genre->getId());
		} else {
			echo '<br>le réalisateur n\' existe pas, update impossible<br>';
		}
	}
}