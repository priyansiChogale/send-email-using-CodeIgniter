<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('index');
    }

    public function sendEmail()
    {
        $inputs = $this->validate([
            'fname' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your name.',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Please enter your email address.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'subject' => [
                'label' => 'Subject',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Please enter a subject.',
                    'min_length' => 'Please enter a subject with at least 5 characters.'
                ]
            ],
            'message' => [
                'label' => 'Message',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Please enter a message.',
                    'min_length' => 'Please enter a subject with at least 10 characters.'
                ]
            ]
        ]);

        if(!$inputs){
            return view('index', [
                'validation'=> $this->validator
            ]);
        }else{
            $email = $this->request->getPost('email');
            $subject = $this->request->getPost('subject');
            $message = $this->request->getPost('message');

            $mail = \Config\Services::email();
            $mail->setFrom('priyansichogale.20.d.fe@gmail.com');
            $mail->setTo($email);
            $mail->setSubject($subject);
            $mail->setMessage($message);

            if($mail->send()){
                session()->setFlashdata('success', 'Your message has been sent successfully.');
                return redirect()->to('/');
            }else{
                session()->setFlashdata('error', 'Sorry, your message could not be sent.');
                return redirect()->to('/');
            }
        }
    }
}
