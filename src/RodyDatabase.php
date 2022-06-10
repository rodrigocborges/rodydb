<?php
	namespace RodyDB\Core;

	class RodyDatabase {

		private $data;
		private $pass;

		public function __construct($pass){
			$this->pass = $pass;
		}

		public function create($key, $val){
			try {
				$jsonValue = base64_encode(json_encode($val));
				$this->data[$key] = $jsonValue;
				return [ 'message' => 'OK' ];
			}
			catch(Exception $ex)
			{
				return [ 'message' => $ex->getMessage() ];
			}
		}

		public function show($key, $pass = null, $json = true){
			try {
				$data = ($pass == null || $pass !== $this->pass) ? $this->data[$key] : json_decode(base64_decode($this->data[$key]));
				//Simple test with json
                $return = [ 'data' => $data ];
                return $json ? json_encode($return) : $return;
			}
			catch(Exception $ex)
			{
				return [ 'message' => $ex->getMessage() ];
			}
		}
		
	}