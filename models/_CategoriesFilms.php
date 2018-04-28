<?php
abstract  class _CategoriesFilms {
	protected $id;
	protected $name;
	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
	public function setId($id){
		if (isset($id)){
			$id = (string)$id;
			$this->id = $id;
		}
	}
	public function setName($name){
		if (isset($name)){
			$id = (string)$id;
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