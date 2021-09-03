<?php
namespace App\Controllers;

use App\Entities\User;
use Config\Services;

class Register extends BaseController
{
	public function index()
	{

		$model = model('GenderModel');
		$data = [
			'genders' => $model->findAll()
		];
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('registro', $data);
		echo view('include_files/footer');
	}

	public function create()
	{
		if ($this->validate('signup')) {
			$data = $this->request->getPost();
			$user = new User();
			$user->fill($data);
			$userModel = model('App\Models\UserModel', false);
			$userModel->save($user);
			$this->setEmail($user);
			$this->response->redirect('/');
		} else {
			return redirect()->back()->with('errors', $this->validator->getErrors());
		}
	}

	public function setEmail($user)
	{
		$validation = Services::validation();		
		$this->sendMail($user);
		//return;
	}

	public function sendMail($datos)
	{
		$mail = new PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->CharSet = 'UTF-8';
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "ocsys.mx";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "contacto@ocsys.mx";
		$mail->Password = "Oc2020$1";
		$mail->SetFrom("contacto@ocsys.mx");
		$mail->Subject = "Activación de Cuenta";

		$nombre = strtoupper($datos->first_name);
		$apellido = strtoupper($datos->last_name);
		$email =  $datos->email;
		$usuario = $datos->username;
		$mensaje = "Activación de Cuenta";
		$pagina = base_url('login') . "?user=" . $usuario;
		$logo = "http://scions.ocsys.mx/images/_logo.png"; //base_url('images/_logo.png');

		$mail->AddAddress($email);
		$mensajeHtml = nl2br($mensaje);
		$body = '<div style="padding: 10px; margin:0 auto; border-collapse: collapse; text-align: center;">
				    <div style="color: #373737; margin: 4% 10% 2%; font-family: sans-serif">
				        <div style="width: 100%;">
				            <img style="padding: 1%;" src="' . $logo . '" style="width: 100%; max-width: 300px;">
				        </div>
						</br>
				        <h1 style="color: #000000; margin: 0 0 7px;">Su registro se completo correctamente.</h1>
						<div style="width: 400px; margin:0 auto; padding: 0 2rem;">
				        	<p style="text-align: justify;">									  	
						    	Datos proporcionados son los siguientes:<br> 
						    	<b>Nombre: </b> ' . $nombre . ' ' . $apellido . '<br>
								<b>Usuario:</b> ' . $usuario . '<br>
				         	</p>
						</div>						
						<h3 style="color: #000000; margin: 0 0 7px;">Para continuar con la activación dar click en el sguiente enlace:</h3>
						<div style="margin: 1rem; padding: 1rem;">
							<a style="display: inline-block; padding: 0.5em 2em; background: #00044D; color: #fff; text-decoration: none; cursor: pointer; border-radius: 6px; width: 220px;" href=' . $pagina . ' >ACTIVAR CUENTA</a>
			      		</div>
				    	<div style="color: #373737; margin: 4% 10% 2%; font-family: sans-serif">				           		
				        	<h3 style="color: #000000; margin: 0 0 7px; text-align: center">Si no solicitaste este acceso o sospechas de alguna actividad inusual en la cuenta, favor de comunicarse con los administradores.</h3>
			      		</div>
						
						</br>
					    <p style="color: #336FD8; font-size: 18px; margin: 30px 0 0">AVISO IMPORTANTE</p>
						</br>
						<p> Si no se abre correctamente la ventana favor de copiar y pegar este link en su navegador: </p>
						</br>
						<p style="color: #00044D;">' . $pagina . '</p>
						</br>
					    <p style="color: #757575; font-size: 12px; margin: 30px 0 0">Scion Esports Series.</p>
					</div>
				</div>';

		$mail->Body    =  $body;
		$mail->AltBody = "{$mensaje} \n\n ";

		if (!$mail->Send()) {
			echo json_encode("Mailer Error: " . $mail->ErrorInfo);
			return false;
		} else {

			echo json_encode("Message sent!");
			return true;
		}

		$destinatarios = $this->getmails();
		$mail->AddAddress("fervio.system@gmail.com"); // Esta es la dirección a donde enviamos los datos del formulario
		foreach ($destinatarios as $file) {
			$mail->AddAddress($file->email);
			echo $file->email;
		}

		//var_dump($destinatarios);
		return;
	}
}
