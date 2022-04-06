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
          $reposeModel = new ReponseModel();
          return view('questions/quizz');
    }

}
