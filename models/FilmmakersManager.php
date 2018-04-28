<?php
class FilmmakersManager extends _TableManager{
	public function setNew($nom){
		if (!$this->exist($nom)){
			$connect = $this->dbConnect;
			$response = $connect->prepare("INSERT INTO " . $this->table . " (realisateur) VALUES (:realisateur)");
			$response->bindParam(':realisateur', $nom, PDO::PARAM_STR);
			$response->execute();
			$lastId = $connect->lastInsertId();
			return $this->read($lastId);
		} else {
			echo 'le réalisateur existe déja';
		}
		
	}
	public function exist($id){
		parent::exist($id);
		if (is_string($id)){
			$connect = $this->dbConnect; 
				$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE realisateur = :realisateur");
				$response->bindParam(':realisateur', $id, PDO::PARAM_STR);
				$response->execute();
				return $response->fetch(PDO::FETCH_ASSOC);
		}
	}
	
}