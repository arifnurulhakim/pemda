<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'My Profile';
        return view('user/profile',$data);
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return view('user/index',$data);
    }

    public function viewProduk()
    {
        $data['title'] = 'Tambah Data';
        // return view('user/index',$data);
        return view('user/produk/data-produk',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data';
        // return view('user/index',$data);
        return view('user/produk/create-produk',$data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Data';
        // return view('user/index',$data);
        return view('user/produk/edit-produk',$data);
    }

    public function editProfil()
    {
        $data_user = $this->usersModel->getUsersById(user_id());
        // dd($data_user);
        $data =[
            'title'=> 'My Profile',
            'result' => $data_user,
			'validation' => \Config\Services::validation()
        ] ;
        return view('user/edit-profil',$data);
    }

    public function update($id_user){

        // Validasi Data
        if (! $this->validate([
            'email' => [
				'rules' => 'required',
				'label' => 'email',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'username' => [
					'rules' => 'required',
					'label' => 'Username',
					'errors' => [
						'required' => '{field} harus diisi',
						'is_unique' => '{field} sudah digunakan'
						]
					],
            'fullname' => [
                'rules' => 'required',
                'label' => 'Nama',
                'errors' => [
                    'required' => '{field} harus diisi'
                    ]
                    // '|is_natural_no_zero'
                ],
            'no_telepon' => [
                'rules' => 'required',
                'label' => 'No. Telepon',
                'errors' => [
                    'required' => '{field} harus diisi'
                    ]
                    // '|is_natural_no_zero'
                ],
                'alamat' => [
                    'rules' => 'required',
                    'label' => 'Alamat',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                        // '|is_natural_no_zero'
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'label' => 'deskripsi',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                        // '|is_natural_no_zero'
                ],
                'user_image' => [
                'rules' =>	'max_size[user_image,1024]|is_image[user_image]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                    ]
                ]	
        ])) {
            //Berisi fungsi redirect jika validasi tidak memenuhi
            // dd(\Config\Services::validation()->getErrors());
            // dd($this->request->getVar());
            return redirect()->to('user/edit-profil')->withInput();
        }

    // ambil gambar

    $fileGambarUser = $this->request->getFile('user_image');
    // dd($fileGambarUser);

    // apakah tidak ada gambar yang diupload
    if ($fileGambarUser->getError() == 4) {
        $namaFileGambarUser = 'default.jpg';
    } else {
        // generate nama gambar random
    $namaFileGambarUser = $fileGambarUser->getRandomName();

    // pindahkan ke folder img
    $fileGambarUser->move('img/user/', $namaFileGambarUser);
    
    }
        if($this->usersModel->save([
            'id'     => $id_user,
            // 'id_user'     => $this->request->user_id,
            'email' => $this->request->getVar('email'),
              'username' => $this->request->getVar('username'),
              'fullname' => $this->request->getVar('fullname'),
              'no_telepon' => $this->request->getVar('no_telepon'),
              'alamat' => $this->request->getVar('alamat'),
              'deskripsi' => $this->request->getVar('deskripsi'),
              'user_image' => $namaFileGambarUser,
        ])) {
        // dd($_SESSION);
        // dd();
        session()->setFlashdata('success', 'Berhasil mengubah profil!');
        } else {
            session()->setFlashdata('error', 'Gagal mengubah profil');
        }
        return redirect()->to('user/profil');

    }
    

}