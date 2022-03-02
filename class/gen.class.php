<?php
class gen
{
	private $db;
	private $template = 'default';

	public function __construct($db)
	{
		$this->db = $db;
		$this->db->Query("SELECT template FROM PREFconfigs WHERE id = '1'");
		$this->template = $this->db->FetchRow();
	}

	public function genPage($view,$data = array())
	{
		$_OPT['scripts'] = '';
		$_OPT['title'] = 'Главная';
		$data['view'] = $view;
		ob_start();
		include 'views/'.$this->template.'/layouts/header.php';
		include 'views/'.$this->template.'/'.$view.'.tmp.php';
		include 'views/'.$this->template.'/layouts/footer.php';
		$content = ob_get_contents();
		ob_get_clean();
		$content = $this->varsCtrl($_OPT,$content);
		$content = str_replace('{TEMPLATE}', $this->template, $content);
		echo $content;
	}

	public function genAdmin($view,$data = array())
	{
		$_OPT['title'] = 'Главная';
		ob_start();
		include 'views/cpanel/layouts/header.php';
		include 'views/cpanel/'.$view.'.tmp.php';
		include 'views/cpanel/layouts/footer.php';
		$content = ob_get_contents();
		ob_get_clean();
		$content = $this->varsCtrl($_OPT,$content);
		echo $content;
	}

	private function varsCtrl($vars,$content)
	{
		$content = $content;
		foreach ($vars as $key => $value) {
			$var_name = '{!'.strtoupper($key).'!}';
			$content = str_replace($var_name, $value, $content);
		}
		return $content;
	}
}
