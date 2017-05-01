<?

use application\core\Router;
 
spl_autoload_register(function($class){

		 $file = str_replace('\\', '/', $class).'_class.php';
		   

		  if (file_exists($file)) {
		  	 	require_once $file;
		  }
		  
});

  
 Router::add('^pages/?(?P<action>[a-z-]+)?$',['controller'=>'Main','action'=>'index']);
 Router::add('^about/?(?P<controller>[a-z-]+)?$',['controller'=>'post','action'=>'about']);


//defaults roules
 Router::add('^$',['controller'=>'Main','action'=>'index']);
 Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
 
 Router::dispatch($_SERVER['QUERY_STRING']);
 
// function debug($arr)
//  {
//  		echo '<pre>'.print_r($arr,true).'</pre>';
//  }




 
 




