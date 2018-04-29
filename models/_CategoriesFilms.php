<?php
abstract  class _CategoriesFilms {
	protected $id;
	protected $name;
	public function setId($id){
		if (isset($id)){
			$id = (string)$id;
			$this->id = $id;
		}
	}
	public function setName($name){
		if (isset($name)){
			$name = (string)$name;
			$this->name = $name;
		}
	}
	public function getId(){
		return $this->id;
	} 
	public function getName(){
		return $this->name;
	}
}