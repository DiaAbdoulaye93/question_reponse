<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProfilModel;

class SignupController extends BaseController
{

    public function index()
    {

        helper(['form']);
        $data = [];
        $profilModel = new ProfilModel();
        $profil['profil'] = $profilModel->findAll();

        echo view('users/signup', $profil);
    }

    public function store()
    {
        // helper(['form']);
       
        $rules = [
            'nom' =>
            [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Le nom est un champ obligatoire', 'min_length' => 'Le nom doit etre composé au minimum 2 lettres', 'max_length' => 'Le nom ne doit pas compter plus de 50 caractéres'
                ]
            ],
            'prenom' =>
            [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Le prenom est un champ obligatoire', 'min_length' => 'Le prenom doit etre composé au minimum 2 lettres', 'max_length' => 'Le prenom ne doit pas compter plus de 50 caractéres'
                ]
            ],
            'telephone' =>
            [
                'rules' => 'required|min_length[9]|max_length[13]',
                'errors' => [
                    'required' => 'Le telephone est un champ obligatoire', 'min_length' => 'Le telephone doit etre composé au minimum 9 caractères', 'max_length' => 'Le telephone ne doit pas compter plus de 13 caractères'
                ]
            ],
            'username' =>
            [
                'rules' => 'required|min_length[4]|max_length[100]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Le nom d\'utilisateur est un champ obligatoire', 'min_length' => 'Le nom d\'utilisateur doit etre composé au minimum de 4 caractères', 'max_length' => 'Le nom d\'utilisateur ne doit pas compter plus de 100 caractères', 'is_unique' => 'Ce nom d\'utilisateur existe deja'
                ]
            ],
            'password' =>
            [
                'rules' => 'required|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => 'Le mot de pass est un champ obligatoire', 'min_length' => 'Le un mot de pass sécurisé doit avoir au moins 8 cacractéres', 'max_length' => 'Le mot de passe ne doit pas compter plus de 16 caractères', 'is_unique' => 'Ce nom d\'utilisateur existe deja'
                ]
            ],
            'confirmpassword' =>
            [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Echec de confirmation du mot de pass'
                ]
            ],
            'user_type' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merci de choisir un profil',
                ]
            ],
        ];
        print_r($rules);
        die;
        if ($this->validate($rules)) {
            if ($this->request->getFile('avatar')->isValid()) {
                $file = $this->request->getFile('avatar');
                $newName = $this->request->getVar('username') . 'Avatar';
                $file->move('assets/images/users', $newName);
            } else {
                $newName = "ajouter-avatar";
            }
            $userModel = new UserModel();

            $data = [
                'nom'     => $this->request->getVar('nom'),
                'prenom'    => $this->request->getVar('prenom'),
                'telephone'    => $this->request->getVar('telephone'),
                'username'    => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'    => $this->request->getVar('user_type'),
                 'avatar' => $newName,
            ];
           
   
            $userModel->insert($data);  
            return redirect()->to('/users');
        } else {
            $data['validation'] = $this->validator;
            return view('users/signup', $data);
        }
    }
}
