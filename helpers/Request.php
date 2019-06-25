<?php

namespace app\helpers;

class Request {
	
	public $array;

	public function __construct($array)
	{
		$this->array = $array;
	}
	
	public function __set($name, $value) 
	{
		return $this->array[$name] = $value;
	}
 
	public function __get($name) 
	{
		if (isset($this->array[$name])) return $this->array[$name];
		return null;
	}
}