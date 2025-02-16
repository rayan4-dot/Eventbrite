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
        $userAsked = UsersAsked::findOne(['id' => $id]);
        if ($userAsked) {
            $user = new User();
            $user->firstName = $userAsked->first_name;
            $user->lastName = $userAsked->last_name;
            $user->email = $userAsked->email;
            $user->role_id = 3; 
            $user->save(); 
        
            $userAsked->delete($userAsked->id);
    
            $notify = new NotificationController();
            $subject = 'Your Account Has Been Approved';
            $body = 'Dear ' . $user->email . ', <br>Your account on Eventbite has been approved as an organizer!';
            $notify->sendEmail($user->email, $subject, $body);
    
            $this->redirect('/admin/users');
        }
    }

    public function rejectUser($id)
    {
        $userAsked = UsersAsked::findOne(['id' => $id]);
        if ($userAsked) {
          
            $user = new User();
            $user->firstName = $userAsked->first_name;
            $user->lastName = $userAsked->last_name;
            $user->email = $userAsked->email;
            $user->role_id = 2; 
            $user->save();
            
            $userAsked->delete($userAsked->id);
    
            $notify = new NotificationController();
            $subject = 'Your Account Request Has Been Rejected';
            $body = 'Dear ' . $user->email . ', <br>Your request to become an organizer has been rejected. You will remain a regular user.';
            $notify->sendEmail($user->email, $subject, $body);
    
            $this->redirect('/admin/users');
        }
    }
    

    public function blockUser(Request $request ,Response $response ,$params)
    {
        $id = $params[0];
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

    public function unblockUser(Request $request ,Response $response ,$params)
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
