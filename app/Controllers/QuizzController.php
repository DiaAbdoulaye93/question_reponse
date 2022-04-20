<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuestionModel;
use App\Models\ReponseModel;

class QuizzController extends BaseController
{
    
    public function index()
    {
        $questionModel = new QuestionModel();
        $reponseModel = new ReponseModel();
        $questionParPage = 1;
        // $nombrePages = ceil($nombre / $questionParPage);
        $questions['question'] =$this->getRandomQuestions($questionModel,3);
         $reponses = $reponseModel->where('question', $questions['question'][0]['id'])->findAll();
         array_push($questions['question'], $reponses);
         $questions['pagination_link'] = $questionModel->pager;
        return view('questions/quizz', $questions);
    }


    public function getRandomQuestions($model,$limit=10,$orderBy='id', $already_used = array(0))
    {
     
      $query = $model->limit($limit)->orderBy($orderBy, 'RANDOM')->find();

      // if($query.length > 0){
      //   return $query->result();
      // } else {
      //   return 0;
      // }
      return $query;
    }
}
