<?php

class fileModel
{

	
	private $options;
	private $uploaddir = '';
	private $uploadfile = '';
	private $tmp_name;
	private $cvs = array();
        private $diretorio;

	function fileModel($options)
	{
		$this->options = $options;
		//var_dump($options);
		$this->uploaddir = dirname(__FILE__).DS;
                $this->diretorio = dirname(__FILE__).DS;
                $this->uploadfile = $this->uploaddir.$options['file']['userfile']['name'];
		$this->tmp_name = $options['file']['userfile']['tmp_name'];
                //$this->uploadfile = $this->uploaddir.$options['userfile']['name'];
		//$this->tmp_name = $options['userfile']['tmp_name'];
	}


	function uploadFile()
	{

		//print_r($this->uploadfile);
		/* Insira aqui a pasta que deseja salvar o arquivo*/
		
		
		if (move_uploaded_file($this->tmp_name, $this->uploadfile)){
			return 1;}
		else {return 0;}

	}

	function openFile()
	{
            try {
                $cvs = array();
                $file = fopen($this->getUploadfile(),"r");  
                //print_r(fgetcsv($file,';'));


                //carrego as linhas 
                $i = 0; 
                while(! feof($file))
                {
                    $cvs[$i] = fgetcsv($file,4000,';');
                    $i++;

                }
                //unset($cvs[$i-1]);
                
                $this->setCvs($cvs);
                

              /*  echo "<pre> VALORES DE ENTRADA SEM NORMALIZACAO
                ";
                print_r(var_dump($cvs));
                echo "</pre>";*/

                fclose($file);
            } catch (Exception $e) {
                echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            }

	}
        
        
        function arrayFileSave($arrayDados, $file)
        {
             file_put_contents($this->getDiretorio().$file, serialize($arrayDados));
        }
        
        function arrayFileGet($file)
        {
            return unserialize (file_get_contents ($this->getDiretorio().$file));
        }
        
        function getDiretorio() {
            return $this->diretorio;
        }

        function setDiretorio($diretorio) {
            $this->diretorio = $diretorio;
        }

                
        
        function getOptions() {
            return $this->options;
        }

        function getUploaddir() {
            return $this->uploaddir;
        }

        function getUploadfile() {
            return $this->uploadfile;
        }

        function getTmp_name() {
            return $this->tmp_name;
        }

        function getCvs() {
            return $this->cvs;
        }

        function setOptions($options) {
            $this->options = $options;
        }

        function setUploaddir($uploaddir) {
            $this->uploaddir = $uploaddir;
        }

        function setUploadfile($uploadfile) {
            $this->uploadfile = $uploadfile;
        }

        function setTmp_name($tmp_name) {
            $this->tmp_name = $tmp_name;
        }

        function setCvs($cvs) {
            $this->cvs = $cvs;
        }




}

?>


