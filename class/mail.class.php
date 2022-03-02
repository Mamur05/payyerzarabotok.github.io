<?php
class mail{
	var $Hosts = "";

	function __construct(){
		$this->Hosts = str_replace("www.","",$_SERVER['HTTP_HOST']);
	}

	function BackContact($email,$message,$amail){
		$email = ''.$email;
		$message = ''.$message;
		$text = "Новое сообщение обратной связи: <BR />";
		$text.= "<b>Email:</b> $email <BR />";
		$text.= "<b>Сообщение:</b> $message<BR />";
		$subject = "Новое сообщение обратной связи";
		return $this->SendMail($amail, $subject, $text);
	}

	public function addRatingMessage($email,$link)
	{
		$email = ''.$email;
		$text = "Ваша ссылка для управления сайтом: <BR />";
		$text.= "<b>Ссылка:</b> $link<BR />";
		$subject = "Ваша ссылка для упраления сайтом в рейтинге";
		return $this->SendMail($email, $subject, $text);
	}

	public function upRatingMessage($email,$link)
	{
		$email = ''.$email;
		$text = "Ваш сайт был поднят в списке рейтинга <br />";
		$text .= "Ваша ссылка для управления сайтом: <BR />";
		$text .= "<b>Ссылка:</b> $link<BR />";
		$subject = "Ваш сайт был поднят в списке рейтинга";
		return $this->SendMail($email, $subject, $text);
	}

	public function sendBuyBanner($admin_mail,$json_message,$user_email)
	{
		$data = json_decode($json_message);
		$link = $data->domain;
		$link = (substr($link, 0, 7) == 'http://' || substr($link, 0, 8) == 'https://') ? $link : 'http://'.$link;
		$text = "Новая покупка изготовления баннера<br />";
		$text .= "Домен сайта: <b><a href='".$link."'>".$link."</a></b><br />";
		$text .= "Текст баннера: <b>".$data->text."</b><br />";
		$text .= "Пожелания: <b>".$data->wishes."</b><br />";
		$text .= "Размер: <b>".$data->size."</b><br />";
		$text .= "Email заказчика: <b>".$user_email."</b><br />";
		$subject = "Покупка изготовления баннера";
		return $this->SendMail($admin_mail, $subject, $text);
	}

	function Headers(){
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=utf-8\r\n";
	$headers.= "Date: ".date("m.d.Y (H:i:s)",time())."\r\n";
	$headers.= "From: support@".$this->Hosts." \r\n";
		return $headers;
	}

	function SendMail($mail, $subject, $message){
		$message .= "<BR />----------------------------------------------------
		<BR />Сообщение было выслано роботом, пожалуйста, не отвечайте на него!";
		return (mail($mail, $subject, $message, $this->Headers())) ? true : false;
	}
}
