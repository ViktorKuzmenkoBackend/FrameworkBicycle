<?
namespace application\controller;
use application\libs\Template;
 
class FrontController  
{
	
	public $input;
	public $view;
	public $db;

	function __construct()
	{
			
			$this->view = new Template();
			 
	}



}