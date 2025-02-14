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

    public function approveUser(Request $request, Response $response)
    {
        $user = User::findOne(['id' => $request->getParams('id')]);
        if ($user) {
            $user->approve();
            $this->redirect('/admin/users');
        }
    }

    public function rejectUser(Request $request, Response $response)
    {
        $user = User::findOne(['id' => $request->getParams('id')]);
        if ($user) {
            $user->reject();
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
            $body .= 'Your account on Eventbite has been blocked By Admins!<br>';
            $body .= 'we are sorry about so .<br>';
            $body .= 'Good luck,<br>The Eventbite Team';

            $userEmail = $user->email;
            $notify->NotifyWhileblocked($userEmail, $subject, $body);

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
            $body .= 'Your account on Eventbite has been unblocked!<br>';
            $body .= 'Thank you for your loyalty.<br>';
            $body .= 'Best regards,<br>The Eventbite Team';
    
           
            $userEmail = $user->email;
            $notify->NotifyWhileUnblocked($userEmail, $subject, $body);
    
         
            $response->redirect('/admin/users');
        }
    }
}
