<?php

include("class.phpmailer.php");
include("class.smtp.php"); // note, this is optional - gets called from main class if not already loaded
include("email.php");
$correo = '';

 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new Correo();
    switch($_COOKIE["subop"])
    {
        case 'correo':
         $correo = $datos->EnviarAlumTutor();
         $correos = explode(',',$correo);
        break;
        case 'corTutor':
         $correo = $datos->EnviarTutorAlum($_POST['id']);
         $correos = explode(',',$correo);
        break;
    }
}

$mail             = new PHPMailer();

$body             = "<h3>El mensaje ha sido enviado via Tutorías Académicas Digitales e Institucionales</h3>
							<hr><b>Email de quien envia: </b>".$correos[1].'<hr><p>'.$_POST['mensaje'].'</p>';
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port

$mail->Username   = "tadi.itm@gmail.com";  // GMAIL username
$mail->Password   = "Itmtadi16$";            // GMAIL password, Some times if two step varification enabled in this mail id, Mail will not be sent.

$mail->From       = $correos[1];
$mail->FromName   = "Tutorias ITMorelia";
$mail->Subject    = "Tutorias";
$mail->AltBody    = "Mensaje en Texto Plano"; //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

//$mail->AddReplyTo("replyto@yourdomain.com","Webmaster");

//$mail->AddAttachment("/path/to/file.zip");             // attachment
//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

$mail->AddAddress($correos[0],"nameTo");

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo -1;
} else {
  echo 1;
}

?>
