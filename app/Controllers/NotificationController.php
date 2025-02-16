<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

interface NotifyUser{
    public function sendEmail($userEmail, $subject, $body);
}

// interface RejectAndApprovedProcess{
//     public function NotifyWhileReserving();
//     public function NotifyWhileRejected();
//     public function NotifyWhileApproved();
//     public function NotifyWhileTicketPublished();
//     public function NotifyWhileRejectTicket();
//     public function NotifyWhileCancelReservation();
// }

class NotificationController implements NotifyUser
{

  public function sendEmail($userEmail,$subject,$body){
    $mail = new PHPMailer(true);
    try{
      $mail->isSMTP();                                            
      $mail->Host       = 'smtp.gmail.com';                         
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'hamza.boumanjel@gmail.com';                  
      $mail->Password   = 'scxs ycon hrnm fgts';                      
      $mail->SMTPSecure = 'ssl';           
      $mail->Port       = 465;

      $mail->setFrom('hamza.boumanjel@gmail.com', 'Youdemy Admin');
      $mail->addAddress($userEmail); 

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $body;

      $mail->send();
      
    }catch(EXception $se){
      error_log("Mailer Error: {$mail->ErrorInfo}");
    }
  }

}