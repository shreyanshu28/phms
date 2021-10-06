<?php
function send_email($email, $html, $subject)
{

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->SMTPSecure = "tls";
	$mail->SMTPAuth = true;
	$mail->Username = "19bmiit052@gmail.com";
	$mail->Password = "Kush@l8217";
	$mail->SetFrom("19bmiit052@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $html;
	$mail->SMTPOptions = array('ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => false
	));
	if ($mail->send()) {
		return 1;
	} else {
		return 0;
	}
}

function rand_str()
{
	$str = str_shuffle("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz");
	return $str = substr($str, 0, 15);
}
