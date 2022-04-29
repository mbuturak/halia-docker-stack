<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends MY_Controller
{

	public function index()
	{
		$seo_url = 'who-us';
		if (!isset($seo_url)) {
			redirect(base_url());
			die();
		}

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		//Get Menu ID
		$getMenuItem = $this->menu_model->get(array(
			"seo_url" => $seo_url
		));

		if (isset($getMenuItem)) {
			//Get page details
			$viewData->pageDetails = $this->pages_model->get(array(
				"menuId" => $getMenuItem->Id
			));
		} else {
			redirect(base_url());
			die();
		}


		$this->load->view("web/about_v/index", $viewData);
	}
}
