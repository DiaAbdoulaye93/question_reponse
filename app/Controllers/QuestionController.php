<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class QuestionController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('questions/add_question');
 
    }
    function store(){
      
        $rules = [
            'libelle' =>
            [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Le libelle est un champ obligatoire', 'min_length' => 'Le libelle doit etre composé au minimum 2 lettres', 'max_length' => 'Le libelle ne doit pas compter plus de 50 caractéres'
                ]
            ],
        ];

        if ($this->validate($rules)) {
         

            $data = [
                'nom'     => $this->request->getVar('nom'),
            ];


            // $userModel->insert($data);
            return redirect()->to('/users');
        } else {
            $data['validation'] = $this->validator;
            return view('users/signup', $data);
        }
    }
    }
