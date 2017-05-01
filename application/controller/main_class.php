<?
namespace application\controller;
use application\controller\FrontController;
use application\models\Article;
class Main extends FrontController
{
	

	 
	public function indexAction()
		{
			
				$models = new Article(); 
				$this->view->articles = $models->findAll();
				$this->view->title = "главная";
				$this->view->template_page('index');

	 
		}
}
 