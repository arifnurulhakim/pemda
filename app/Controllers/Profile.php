<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $data_user = $this->userModel->getUsersById();
        dd($data_user);
        $data = [
			'title' => 'Daftar Wisata',
			'subTitle' => 'Wisata',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			// 'wisata' => $wisata
		  ];
// dd($wisata);
		return view('admin/wisata/data-wisata',$data);
    }
}