<?php

namespace App\Controllers;

class Error extends BaseController
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('errors/access_denied',$data);
    }

    

    




}