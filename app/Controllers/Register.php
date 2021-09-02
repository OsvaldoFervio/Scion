<?php


namespace App\Controllers;

use App\Entities\User;
use Config\Services;

class Register extends BaseController
{
    public function index() {

        $model = model('GenderModel');
        $data = [
            'genders' => $model->findAll()
        ];
        echo view('include_files/header');
        echo view('include_files/navbar');
        echo view('registro', $data);
        echo view('include_files/footer');
    }

    public function create() {
        if($this->validate('signup')) {
            $data = $this->request->getPost();
            $user = new User();
            $user->fill($data);
            $userModel = model('App\Models\UserModel', false);
            //$userModel->save($user);
            //$this->response->redirect('/');

            $this->setCita($user);

        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function setCita($user){
   	
		//$Email  = $this->input->post('email');

		/*if($this->form_validation->run()==FALSE)
        {
			$this->output->set_status_header(400);	
		}
        else
        {*/			

			/*$datos= array(
						'status'  => true,
						);
			$paciente = array(
						'email'  => $Email
						);*/

			// var_dump($datos);
			// var_dump($paciente);

		//insertar en la base de datos		
        $validation = Services::validation();
        //$this->sendmailConfirmation($datos);
        //if($validation->run($user, 'team_update')) {
            //$image = $this->request->getFile('images');
            var_dump($user);
            $this->sendmailConfirmation($user);
            return;
            //$this->serv->update($id, $data, $image);
            //return redirect()->to(base_url('Dashboard/showTeam/'.$id))->with('success', 'Datos actualizados');
        //}
        //$errors = $validation->getErrors();
        //return redirect()->back()->with('errors', $errors);		
		//}
    }

    public function sendmailConfirmation($datos){

		require("class.phpmailer.php");
		require("class.smtp.php");
		$mail = new $this->PHPMailer();
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
		$mail->Subject = "Confirmación Cita";		 

		$nombre = $datos['first_name'];
		$email =  $datos['email'];
		$telefono = $datos['birthdate'];
		$mensaje = "Confirmación de cita";
		$fecha = '2020-08-12 12:00:00';
		$dia  = date('Y-m-d', strtotime($fecha));
		$hora = date('H:i', strtotime($fecha));

		/*$nombre = 'Juanito Beltrán';
		$email =  'fervio.system@gmail.com';
		$telefono = '384';
		$mensaje = "Confirmación de cita";
		$fecha = '2020-08-12 12:00:00';
		$dia = date('Y-m-d', strtotime($fecha));
		$hora =date('H:i', strtotime($fecha));*/

		$mail->AddAddress($email); 

		//CARGA LAS DIRECCIONES DE LOS DOCTORES
		// $destinatarios = $this->getmails();

		// foreach ($destinatarios as $file ) {
		// 	$mail->AddAddress($file->email);
			
		// }
		$mensajeHtml = nl2br($mensaje);
		$body = '<table  style="max-width: 700px; padding: 10px; margin:0 auto; border-collapse: collapse; background-color: #FFFFFF">
					<tr>
				    	<td style="background-color: #FFFFFF">
				      		<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				           		<div style="width: 100%; text-align: center">
				             		<img style="padding: 1%;" src="https://ocsys.mx/images/Logo.png" width="50%">
				           		</div><br>
				            	<h1 style="color: #000000; margin: 0 0 7px; text-align: center">'.$nombre.', Tu cita se programó correctamente</h1>
				              		<p>
						            	Los datos proporcionados son los siguientes:<br> 
						            	<b>Nombre:</b> '.$nombre.'<br> 
						            	<b>Email:</b> '.$email.'<br> 
						            	<b>Teléfono:</b> '.$telefono.'<br> 
						            	<b>Fecha:</b> '.$dia.'<br> 
						            	<b>Hora:</b> '.$hora.'<br> 
				              		</p>
			      			</div>
				    	</td>
				  	</tr>
				  	<tr>
				    	<td style="background-color: #FFFFFF">
				      		<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">				           		
				            	<h1 style="color: #000000; margin: 0 0 7px; text-align: center">Información Clínica Dental Ramirez</h1>
				            	</p>
				            		Para dudas, aclaraciones y citas:</br>
				            		<b>Whatsapp:</b> 384 104 6735<br>
				            		<b>Teléfono:</b> 3847332176<br>
				            		<b>Domicilio:</b> Abasolo #9, Colonia Centro<br>
				            		Entre constitución y Reforma.
			            		</p>
			      			</div>
				    	</td>
				  	</tr>
				  	<tr>
					    <td>
					    	<p style="color: #196fc5; font-size: 18px; text-align: center;margin: 30px 0 0">Aviso Importante! Recuerda acudir puntualmente a la cita.
						    <br>
						    	<ul color: #196fc5;margin:4% ;text-align:justify;font-family:sans-serif;>
						      		<li>Por medidas sanitarias, el número de citas se ha reducido y espaciado una cita de otra.</li>
									<li>Solo debe asistir el paciente.</li>
									<li>El uso de cubrebocas en el consultorio es obligatorio y primordial para acceder a tu cita.</li>
									<li>Cualquier cambio, ajuste o modificación por medidas sanitarias se notificarán al correo proporcionado en el registro.</li>
							  	</ul>
					      	</p>
					    </td>
				  	</tr>

				  	<tr>
					    <td>
					      <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">OCSyS. Sistemas y Soluciones 2020</p>
					    </td>
				  	</tr>				  
				</table>';
	
		$mail->Body =  $body;

		$mail->AltBody = "{$mensaje} \n\n "; 

		 if(!$mail->Send()) {		 	
		 	echo json_encode("Mailer Error: " . $mail->ErrorInfo);	
		 	return false;
		 } else {
		 	
			echo json_encode("Message sent!");
		 	return true;
		 }

	
		$destinatarios = $this->getmails();
		$mail->AddAddress("fervio.system@gmail.com"); // Esta es la dirección a donde enviamos los datos del formulario
		foreach ($destinatarios as $file ) {
			$mail->AddAddress($file->email);
			echo $file->email;
		}
		
		var_dump($destinatarios);
		return ;

	}
}