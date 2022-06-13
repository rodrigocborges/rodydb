<?php
	namespace RodyDB\Core;

	use RodyDB\Core\Helper;
	use RodyDB\Core\File;

	class RodyDatabase {

		private $data = [];
		private $pass;
		private $keyType;

		private $file;

		/*
		A ideia é que, após criar o database
		e inserir os dados. Na próxima execução,
		carregar todos os dados da pasta '_data'
		para um array local, para ficar mais rapido.

		Sera?!
		*/

		public function __construct($pass, $keyType = 'uuid'){
			$this->pass = $pass;
			$this->keyType = $keyType;
			$this->file = new File();
		}

		public function put($key, $val = []){
			try {
				
				$localData = [];
				foreach($val as $v) {
					$v['id'] = Helper::generateKey($this->keyType, 0);
					$localData[] = $v;
				}
			
				if(array_key_exists($key, $this->data)){
					array_push($this->data[$key], array_merge(...$localData));
				} 
				else {
					$this->data[$key] = $localData;
				}

				foreach($this->data[$key] as $v){
					$this->file->write($key, $v['id'], $v);
					//print_r($v);
				}

				return [ 'message' => 'OK' ];
			}
			catch(Exception $ex)
			{
				return [ 'message' => $ex->getMessage() ];
			}
		}

		public function get($key, $settings = null){
			try {
				
				// if(!array_key_exists($key, $this->data))
				// {
				// 	throw new Exception('The key was not found!');
				// }
				
                $return = [ 'data' => $this->file->read($key) ];
				
				return $return;
			}
			catch(Exception $ex)
			{
				return [ 'message' => $ex->getMessage() ];
			}
		}

		public function getOne($key, $id){
			try {
				
				// if(!array_key_exists($key, $this->data))
				// {
				// 	throw new Exception('The key was not found!');
				// }
				
                $return = [ 'data' => $this->file->readOne($key, $id) ];
				
				return $return;
			}
			catch(Exception $ex)
			{
				return [ 'message' => $ex->getMessage() ];
			}
		}

		public function delete($key) { }

		public function update($key, $id, $val) { }
		
	}