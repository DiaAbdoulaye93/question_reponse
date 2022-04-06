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
          $questions['questions'] = $questionModel->orderBy('id', 'DESC')->paginate(1);
          $questions['pagination_link'] = $questionModel->pager;
          return view('questions/quizz', $questions);
    }

}
