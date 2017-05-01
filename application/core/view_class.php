<?
namespace application\core;
/**
* 
*/
class View 
{
	
	 protected $data = array();


	 public function __set($k,$v)
	 {
	 	$this->data[$k] = $v;
	 }
	 public function render($template )
	 {
	 		foreach ($this->data as $key => $value) {
	 			
	 				$$key = $value;
	 		}

	 		ob_start();

	 		include $_SERVER['DOCUMENT_ROOT'].'/application/views/'.$template.'.php';
	 		$content = ob_get_contents();

	 		ob_end_clean();

	 		return $content;
	 }

	 public function load($template)
	 {
	 	 echo $this->render($template);
	 }


	
}


/**
* 
*/
 