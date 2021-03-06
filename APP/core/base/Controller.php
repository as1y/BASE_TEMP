<?php
namespace APP\core\base;
abstract class Controller {
	public $route = [];
	public $view;
	public $layaout;
	public $data=[];
	public function __construct($route){
		$this->route = $route;
		$this->view = $route['action'];

//
//		// РАСПРЕДЕЛЕНЕ ПРАВ (ПОКА ПРОСТОЕ)
//		if (empty($_SESSION['ulogin']) && $route['controller'] != "Main"  && $route['controller'] != "User" && $route['controller'] != "Spec"  ){
//			redir('/');
//		}
//		//РАСПРЕДЕЛЕНИЕ ПРАВ НА АНДИНА
//		if ($route['controller'] == "Admin"){
//			if( empty($_SESSION['ulogin']['woof']) || $_SESSION['ulogin']['woof'] != "1"){
//				redir('/panel');
//			}
//		}
//


	}


	public function getView(){
		$vObj = new View($this->route, $this->layaout, $this->view );
		$vObj->render($this->data);
	}


	public function set($data){
		$this->data = $data;
	}



	function isAjax ()
	{
		if (
			isset($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest")
			return true;
		return false;
	}
}



?>