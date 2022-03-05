<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SignupController extends BaseController
{

    public function index()
    {
       
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }

    public function store()
    {
       
        // helper(['form']);
        // $rules = [
        //     'nom'          => 'required|min_length[2]|max_length[50]',
        //     'prenom'          => 'required|min_length[2]|max_length[50]',
        //     'telephone'          => 'required|min_length[2]|max_length[50]',
        //     'username'         => 'required|min_length[4]|max_length[100]|is_unique[user.username]',
        //     'password'      => 'required|min_length[4]|max_length[50]',
        //     'user_type'      => 'required|min_length[4]|max_length[50]',
        //     'confirmpassword'  => 'matches[password]'
        // ];
       
        // if ($this->validate($rules)) {
           
            $userModel = new UserModel();
        
            $data = [
                'nom'     => $this->request->getVar('nom'),
                'prenom'    => $this->request->getVar('prenom'),
                'telephone'    => $this->request->getVar('telephone'),
                'username'    => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'    => $this->request->getVar('user_type'),
            ];
             
         
            $userModel->insert($data);
            return redirect()->to('/signin');
        // } else {
        //     $data['validation'] = $this->validator;
        //     echo view('signup', $data);
        // }
    }
}
