<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$field_buttonValue = $_POST['buttonValue'];
$field_fname = $_POST['fname'];
$field_lname = $_POST['lname'];
$field_phone = $_POST['phone'];
$field_countryCode = $_POST['country_code'];
$field_full_number = '+' . $_POST['country_code'] . $_POST['phone'];

// var_dump($field_phone);

$field_email = $_POST['email'];
$field_bedrooms = $_POST['bedrooms'];

$field_ip = $_SERVER['REMOTE_ADDR'];

$crm_update = false;

$field_lead = "Shoumous";
$field_lead_source = "Landing Page";
$field_campagin_id = "151";
$field_lead_type = "2";




    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    // ===============================
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.villasforsaleinsharjah.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@villasforsaleinsharjah.com';                     //SMTP username
        $mail->Password   = 'jGEW~H1IBg(K';                               //SMTP password
        // $mail->Password   = 'tyest';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;   
        // $mail->Port       = 587;   

        //Recipients
        $mail->From = "no-reply@villasforsaleinsharjah.com";
        $mail->FromName = "Villas for Sale in Sharjah";
        
        $mail->addAddress("cptburah@gmail.com", "Villas for Sale in Sharjah");
        
    

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Villas for Sale in Sharjah';
        $mail->Body    = ' <b>Villas for Sale in Sharjah - Enquiry </b> 
        <br><br> Name: '.$field_fname.' . '.$field_lname.';
        <br><br> Country Code: '.$field_countryCode.' 
        <br><br> Phone: '.$field_phone.' 
        <br><br> Email: '.$field_email.'
        <br><br> Bedroom: '.$field_bedrooms.'
        <br><br> IP Address: '.$field_ip;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        
        
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



    if($field_buttonValue == '1'){
        header("Location: ./thank-you.php");    
    } elseif($field_buttonValue == '2') {
        header("Location: ./assets/Brochure.pdf");    
    } else {
        header("Location: ./thank-you.php");    
    }

