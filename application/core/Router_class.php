<?
 namespace application\core;
 use  application\core\view;
class Router  
	{
		
		protected static $routes = [];
		protected static $route = [] ;

		public  static function add($regexp, $route = [])
		{
			self::$routes[$regexp] = $route;
		}

		public static function getRoutes()
		{
			 return self::$routes;
		}

		public function getRoute()
		{
			return self::$route;
		}
		
		protected static function matchRoute($url)
			{
				  foreach (self::$routes as $pattern => $route) {
				  	 	if (preg_match("#$pattern#i", $url,$mathes)) {
				  	 		  

				  	 		 foreach ($mathes as $key => $value) {
				  	 		 	 	
				  	 		 	 	if (is_string($key)) {
				  	 		 	 			
				  	 		 	 			$route[$key] = $value;
				  	 		 	 	}
				  	 		 }

				  	 		 	if (!isset($route['action'])) {
				  	 		 		
				  	 		 		$route['action'] = 'index';
				  	 		 	}
				  	 		 $route['controller'] = self::upperCameCase($route['controller']);

				  	 		self::$route = $route;
				  	 		 
				  	 		return true;
				  	 	}
	 
				  }

				  return 	false; 
		}


		public function dispatch($url)
			{
				 if (self::matchRoute($url)) {
				 	  
				 	  $controller = 'application\controller\\'.self::$route['controller'];
				 	  if (class_exists($controller)) {
				 	  		 

				 	  		 $cobj = new $controller(self::$route);
				 	  		 $action = self::lowCameCase(self::$route['action']).'Action';

				 	  		 if (method_exists($cobj, $action)) {
				 	  		 		$cobj->$action();
				 	  		 }
				 	  		 else{

				 	  		 	echo " methot ". $controller ." not found ". $action ." not found";
				 	  		 }
				 	  }

				 	  else{
				 	  		echo " controller not found";
				 	  }
				 }
				 else{

				 	http_response_code(404);
				 	include 'view_class.php';
				 	$view = new View();
				 	$view->load('404');
				 	 
				 }
			}

		protected static function upperCameCase($string)
			{
				return 	$string = str_replace(" ", "", ucwords(str_replace("-", " ", $string)));

			}
				 
		protected function lowCameCase($string)
			{
				return 	 lcfirst(self::upperCameCase($string));
			}
				
				 

	 

}

