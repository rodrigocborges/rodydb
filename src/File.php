<?php

    namespace RodyDB\Core;
    
    use RodyDB\Core\Helper;

    class File {

        private $databasePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_data'.DIRECTORY_SEPARATOR;

        public function write($key, $id, $val){
            $completePath = $this->databasePath.$key.DIRECTORY_SEPARATOR;
            if(!is_dir($completePath)){
                mkdir($completePath, 0777);
            }
            $file = fopen($completePath.$id.'.db', 'w');
            $encodeToString = json_encode($val);
            $encodeToBase64 = base64_encode($encodeToString);
            fwrite($file, $encodeToBase64);
            fclose($file);
        }

        public function readOne($key, $id){
            $completePath = $this->databasePath.$key.DIRECTORY_SEPARATOR;
            $fileContent = file_get_contents($completePath.$id.'.db');
            $decodeString = base64_decode($fileContent);
            $dataArray = json_decode($decodeString);
            return $dataArray;
        }

        public function read($key){
            $completePath = $this->databasePath.$key.DIRECTORY_SEPARATOR;
            $files = array_diff(scandir($completePath), ['.', '..']);
            $allData = [];
            foreach($files as $file){
                $fileContent = file_get_contents($completePath.$file);
                $decodeString = base64_decode($fileContent);
                $dataArray = json_decode($decodeString);   
                $allData[] = $dataArray;
            }
            return $allData;

        }
    }