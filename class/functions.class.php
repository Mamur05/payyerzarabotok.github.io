<?php
class functions
{
	private $db;

	// Инициализация класса: $func = new functions($db);
	// $db => Класс базы данных => db.class.php
	public function __construct($db)
	{
		$this->db = $db;
	}

	// Очистка строки(string)
	public function clearStr($data)
	{
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		$data = $this->db->RealEscape($data);
		$data = trim($data);
		$data = strval($data);
		return $data;
	}

	public function clearHtml($data)
	{
		$data = trim($data);
		$data = $this->db->RealEscape($data);
		$data = strval($data);
		return $data;
	}

	// Очистка числа(integer)
	public function clearInt($data)
	{
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		$data = $this->db->RealEscape($data);
		$data = trim($data);
		$data = intval($data);
		return $data;
	}

	// Очистка числа с плавающей точкой(float)
	public function clearFloat($data)
	{
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		$data = $this->db->RealEscape($data);
		$data = trim($data);
		$data = floatval($data);
		$data = sprintf('%.2f',$data);
		return $data;
	}

	// Генерирует случайны ключ
	// $count => integer
	public function genKey($count = 5){
		$arr = array('a','b','c','d','e','z','q',
					 'A','E','I','O','U','Y','B',
					 'C', 'D', 'F', 'G', 'H', 'J',
					 'K', 'L', 'M', 'N', 'P', 'Q',
					 'R', 'S', 'T', 'V', 'W', 'X',
					 'Y', 'Z','w','e','t','y','u',
					 'i','p','n','1','2','3','4',
					 '5','6','7','8','9','0','j',
					 'h','m');
		$arr_c = count($arr) - 1;
		$key = '';
		for ($i=0; $i < $count; $i++) {
			$r = mt_rand(0,$arr_c);
			$key .= $arr[$r];
		}
		return $key;
	}

	// Проверка кошелька
	// $payeer => string
	public function isPayeer($payeer)
	{
		return (!preg_match("/^P[0-9]{6,9}+$/ix", $payeer)) ? false : strtolower($payeer);
	}

	// Возвращение статуса для AJAX(json)
	public function status($status,$text)
	{
		$data = array('status'=>$status,'text'=>$text);
		return json_encode($data);
	}
}
