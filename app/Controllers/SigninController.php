<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SigninController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('users/signin');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'nom' => $data['nom'],
                    'username' => $data['username'],
                     'usertype' => $data['user_type'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                return redirect()->to('/index');
            } else {
                $session->setFlashdata('msg', 'mot de pass incorrect');
                return redirect()->to('/index');
            }
        } else {
            $session->setFlashdata('msg', 'nom d\'utilisateur incorrect');
            return redirect()->to('/index');
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
      

        session_destroy();
        return redirect()->to('/index');
    }
}
