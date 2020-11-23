<?php
require_once(dirname(__FILE__).DS.'homeView.php');
class homeController
{

	
	private $options;

	function testeController($options)
	{
		$this->options = $options;
	}


	function run()
	{
		$view = new homeView();
		$view->loadViewTemplate(null,'conteudo');
		$view->display();

	}



}

?>


