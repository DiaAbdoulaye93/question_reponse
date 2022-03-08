<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
    function index()
	{
		$crudModel = new UserModel();
		$data['user'] = $crudModel->orderBy('id', 'DESC')->paginate(10);
		$data['pagination_link'] = $crudModel->pager;
		return view('users/user_view', $data);
	}
    public function delete($id = null){
        $UserModel = new UserModel();
        $data['user'] = $UserModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users'));
    } 
}
