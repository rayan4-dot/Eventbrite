<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UsersAsked;
use App\Core\Controller;
use App\Core\Http\Response;
use App\Controllers\NotificationController;

class AdminController extends Controller 
{
    public function dashboard() : void
    {

        $this->render('/admin/dashboard'); 

    }

    public function users() : void
    {
  
        $askedUsers = UsersAsked::findAll();
        $users = User::findAll();

        $this->render('/admin/users', [
            'askedUsers' => $askedUsers,
            'users' => $users
        ]);
    }

    public function approveUser($id)
    {
        $user = User::findOne(['id' => $id]);
        if ($user) {
            $user->approve();

            $notify = new NotificationController();
            $subject = 'Your Account Has Been approved';

            $body = 'Dear ' . $user->email . ', <br>';
            $body .= 'Congratulations Your account on Eventbite has been approved By Admin,!<br>';
            $body .= 'Good luck,<br>The Eventbite Team';

            $userEmail = $user->email;
            $notify->sendEmail($userEmail, $subject, $body);

            $response->redirect('/admin/users');

            $this->redirect('/admin/users');
        }
    }

    public function rejectUser($id)
    {
        $user = User::findOne(['id' => $id]);
        if ($user) {
            $user->reject();

            $notify = new NotificationController();
            $subject = 'Your Account Has Been blocked';

            $body = 'Dear ' . $user->email . ', <br>';
            $body .= 'Your account on Eventbite to be orginizer has been rejected By Admin!<br>';
            $body .= 'we are sorry about so .<br>';
            $body .= 'Good luck,<br>The Eventbite Team';

            $userEmail = $user->email;
            $notify->sendEmail($userEmail, $subject, $body);

            $response->redirect('/admin/users');

            $this->redirect('/admin/users');
        }

    }

    public function blockUser($id)
    {
        $response = new Response();
        $user = User::findOne(['id' => (int)$id]);
        if ($user) {
            $user->block(); 

            $notify = new NotificationController();
            $subject = 'Your Account Has Been blocked';

            $body = 'Dear ' . $user->email . ', <br>';
            $body .= 'Your account on Eventbite has been blocked By Admin!<br>';
            $body .= 'we are sorry about so .<br>';
            $body .= 'Good luck,<br>The Eventbite Team';

            $userEmail = $user->email;
            $notify->sendEmail($userEmail, $subject, $body);

            $response->redirect('/admin/users');
        }
    }

    public function unblockUser($id)
    {
        $response = new Response();
        $user = User::findOne(['id' => (int)$id]);

        if ($user) {
            
            $user->unblock();
            
            $notify = new NotificationController();
            $subject = 'Your Account Has Been Unblocked';
            
          
            $body = 'Dear ' . $user->email . ', <br>';
            $body .= 'Your account on Eventbite has been unblocked by admin!<br>';
            $body .= 'Thank you for your loyalty.<br>';
            $body .= 'Best regards,<br>The Eventbite Team';
    
           
            $userEmail = $user->email;
          
            $notify->sendEmail($userEmail, $subject, $body);
    
         
            $response->redirect('/admin/users');
        }
    }
}
