<?php
trait CategoriesConstructor{
	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
}