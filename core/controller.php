<?php
class controller {

	protected $color_config;

	public function __construct() {
		global $color_config;
		$this->color_config = $color_config;
	}

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function getTemplatePart($templateName, $templateData = array()){
		
		extract($templateData);
		require 'template/'.$templateName.'.php';
	}

}