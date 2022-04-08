<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuestionModel;
use App\Models\ReponseModel;
class QuizzController extends BaseController
{
    public function index()
    {
          $questionModel= new QuestionModel();
          $reponseModel = new ReponseModel();
          $questions['question']= $questionModel->orderBy('id', 'DESC')->paginate(1);
          $reponses= $reponseModel->where('question', $questions['question'][0]['id'])->findAll();
           array_push($questions['question'], $reponses);
          $questions['pagination_link'] = $questionModel->pager;
          return view('questions/quizz', $questions);
    }

}
