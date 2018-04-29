<?php
class actorsManager extends _TableManager{
	use ManagerConstructor;
	public function setNew($nom){
		if (!$this->exist($nom)){
			$connect = $this->dbConnect;
			$response = $connect->prepare("INSERT INTO " . $this->table . " (nom_acteur) VALUES (:nom_acteur)");
			$response->bindParam(':nom_acteur', $nom, PDO::PARAM_STR);
			$response->execute();
			$lastId = $connect->lastInsertId();
			return $this->read($lastId);
		} else {
			echo '<br>l\' acteur existe déja<br>';
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
				$response = $connect->prepare("SELECT * FROM " . $this->table . " WHERE nom_acteur = :nom_acteur");
				$response->bindParam(':nom_acteur', $id, PDO::PARAM_STR);
				$response->execute();
				return $response->fetch(PDO::FETCH_ASSOC);
		}
	}
	public function update($actor){
		if ($this->exist((int)$actor->getId())){
			$nom_acteur = $actor->getName();
			$id = $actor->getId();
			$connect = $this->dbConnect;
			$response = $connect->prepare("UPDATE " . $this->table . " SET nom_acteur = :nom_acteur WHERE id=:id");
			$response->bindParam(':id', $id, PDO::PARAM_STR);
			$response->bindParam(':nom_acteur', $nom_acteur, PDO::PARAM_STR);
			$response->execute();
			
			return $this->read((int)$actor->getId());
		} else {
			echo '<br>l \' acteur n\' existe pas, update impossible<br>';
		}
	}
}