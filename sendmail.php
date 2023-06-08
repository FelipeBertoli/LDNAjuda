<?php

//Load Composer's autoloader
$Nome		= $_POST["nome"];	
$Email		= $_POST["email"];
$Fone		= $_POST["telefone"];	
$Empresa    = $_POST["empresa"];	


$body .= "<h2>Enviando e-mails com AJAX e PHP via SMTP</h2>";
$body .= "Nome: $Nome <br>";
$body .= "E-mail: $Email <br>";
$body .= "Mensagem:<br>";
$body .= "<br>";
$body .= "----------------------------";
$body .= "<br>";
$body .= "Enviado em <strong>".date("h:m:i d/m/Y")." por ".$_SERVER['REMOTE_ADDR']."</strong>"; //mostra a data e o IP
$body .= "<br>";
$body .= "----------------------------";
 
$mail->IsSMTP(); //tell the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = 465; //SMTP porta (as mais utilizadas são '25' e '587'
$mail->Host = "smtp.gmail.com"; // SMTP servidor
$mail->Username = "felipe.bertoli@edu.unifil.br";  // SMTP  usuário
$mail->Password = "fb280503";  // SMTP senha
 
$mail->IsSendmail();  
 
$mail->AddReplyTo($email, $nome); //Responder para..
$mail->From = $email; //e-mail fornecido pelo cliente
$mail->FromName   = $nome; //nome fornecido pelo cliente
 
$to = "felipebertolioliveira@gmail.com"; //Enviar para
$mail->AddAddress($to); 
$mail->Subject  = "Assunto do E-mail"; //Assunto
$mail->WordWrap   = 80; // set word wrap
 
$mail->MsgHTML($body);
 
$mail->IsHTML(true); // send as HTML
 
$mail->Send();
echo 'Mensagem enviada com sucesso.'; //retorno devolvido para o ajax caso sucesso


?>