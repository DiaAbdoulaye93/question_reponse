<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategorieModel;
use App\Models\ReponseModel;
use App\Models\QuestionModel;

class QuestionController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $categoriesModel = new CategorieModel();
        $categories['categories'] = $categoriesModel->findAll();
        return view('questions/add_question', $categories);
    }
    function store()
    {
        $questionModel = new QuestionModel();
        $reponseModel = new ReponseModel();
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
                'libelle'     => $this->request->getVar('libelle'),
                'categorie'     => $this->request->getVar('categorie'),
            ];
          
            $formLength = count($this->request->getVar());
            if ($questionModel->insert($data)) {
                $questionModel->insertID();
                die;
                for ($i = 1; $i <=  $formLength; $i++) {
                    while($this->request->getVar('reponse' . $i)) {
                        $reponses[$i]= [
                            'libelle'     => $this->request->getVar('reponse' . $i),
                            'point'     => $this->request->getVar('point' . $i),
                            'question'     => '1',
                            'type_reponse'     => $this->request->getVar('type_reponse'),
                        ];
                        $reponseModel->insert($reponses[$i]);
                        $i++;
                    }
                }
            }
            return redirect()->to('/users');
        }
        // else {
        //     $data['validation'] = $this->validator;
        //     return view('users/signup', $data);
        // }
    }
}
