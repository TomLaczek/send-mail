<?php
//simple php script to send email throught your domain using buildin function on your hosting server
// I'm using this mostly for contact forms
switch($_SERVER['REQUEST_METHOD']){
    case("OPTIONS"): //Allow preflighting to take place.
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: content-type");
        exit;
    case("POST"): //Send the email;
        header("Access-Control-Allow-Origin: *");

        $json = file_get_contents('php://input');

        $params = json_decode($json);

        $name = $params->name;
		$lastname = $params->lastname;        
		$phone = $params->phone;
        $email = $params->email;
        $message = $params->message;

        //build you text message to recipeint
        $messageToSend = "Nowa wiadomość ze strony ..."."\n";
        $messageToSend .= "Imię: ".$name."\n";
        $messageToSend .= "Nazwisko: ".$lastname."\n";
        $messageToSend .= "Telefon: ".$phone."\n";
        $messageToSend .= "Email: ".$email."\n";
        $messageToSend .= "Wiadomość: ".$message."\n";
        
        // insert email adress of recipient eg.: bla@bla.bla
        $recipient = ''; 
        // insert subcject of your blabla mail eg.: IT WORKS || cooooo..ol
        $subject = '';
        // insert header of you blabla mail eg.: From: <superbla.com>
        $headers = "";

        mail($recipient, $subject, $messageToSend, $headers);
        break;
    default: //Reject any non POST or OPTIONS requests.
        header("Allow: POST", true, 405);
        exit;
}