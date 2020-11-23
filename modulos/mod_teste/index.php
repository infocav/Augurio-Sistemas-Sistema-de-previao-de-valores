<?php
require_once(dirname(__FILE__).DS.'testeView.php');
class testeController
{

	
	private $options;

	function testeController($options)
	{
		$this->options = $options;
	}


	function run()
	{
		$view = new testeView();
		$view->loadViewTemplate(null,'conteudo');
		$view->display();

	}



}

?>


