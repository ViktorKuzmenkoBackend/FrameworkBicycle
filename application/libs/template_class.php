<?
 namespace application\libs;
 use application\core\View;
 class Template extends View
 {
 	
 	
 	
 	public function template_page($template)
	 {	

 	 	$this->load('pages/block/header');	
		$this->load('pages/block/menu');
		$this->load('pages/'.$template);
		$this->load('pages/block/r_block');
		$this->load('pages/block/footer');
	 }

	 public function admin($template)
	 {
 	 	$this->load('pages/block/header');	
		$this->load('pages/block/menu');
		$this->load('pages/'.$template);
		$this->load('pages/block/r_block');
		$this->load('pages/block/footer');
	 }
 }