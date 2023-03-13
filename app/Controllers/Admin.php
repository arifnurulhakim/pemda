<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Password;

class Admin extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'User List',
            'menu'  => 'userlist',
        ];
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, name, active');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();
        return view('admin/user_list', $data);
    }

    public function create()
    {
        $users = $this->usersModel->getUsers();
        $data = [
            'title' => 'Tambah Data User',
            'subTitle' => 'Users',
            // 'event' => $event->paginate(5, 'event'),
            // 'pager' => $this->eventModel->pager,
            // 'currentPage' => $currentPage
            'users' => $users,
            'validation' => \Config\Services::validation(),
            'menu'  => 'userlist',
        ];
        // dd($wisata);
        return view('admin/create-user', $data);
    }

    public function save()
    {
        // $auth = service('authentication'); 
        $user_myth = new UserModel();
        // Validasi Data
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[users.email]',
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
            'user_image' => [
                'rules' =>    'max_size[user_image,1024]|is_image[user_image]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            //Berisi fungsi redirect jika validasi tidak memenuhi
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('admin/create-user')->withInput();
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
            $fileGambarUser->move('img/produk/', $namaFileGambarUser);
        }
        $user_id = user();
        // $produk = $this->produkModel->getProdukByUser($auth->id());
        // $id_user = $this->produkModel->where('id_user', $auth->id());
        $slug = url_title($this->request->getVar('username'), '-', true);
        if ($user_myth->withGroup($this->request->getVar('role'))->save([
            // 'id_user'     => $produk,
            // 'id_user'     => $this->request->user_id,
            'email' => $this->request->getVar('email'),
            'slug' => $slug,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'user_image' => $namaFileGambarUser,
            'password_hash' => Password::hash("user123"),
            'active' => 1
        ])) {
            // dd($_SESSION);
            // dd();
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
        }
        return redirect()->to('admin/user_list');
    }

    public function activate()
    {
        $userModel = new UserModel();

        $data = [
            'activate_hash' => null,
            'active' => $this->request->getVar('active') == '0' || '' ? '1' : '0',
        ];
        $userModel->update($this->request->getVar('id'), $data);

        return redirect()->to(base_url('admin'));
    }

    public function changePassword($id = null)
    {
        if ($id == null) {
            return redirect()->to(base_url('admin'));
        } else {
            $data = [
                'id' => $id,
                'title' => 'Update Password',
            ];
            return view('admin/set_password', $data);
        }
    }

    public function setPassword()
    {
        $id = $this->request->getVar('id');
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $data = [
                'id' => $id,
                'title' => 'Update Password',
                'validation' => $this->validator,
            ];

            return view('admin/set_password', $data);
        } else {
            $userModel = new UserModel();
            $data = [
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];
            $userModel->update($this->request->getVar('id'), $data);

            return redirect()->to(base_url('/admin/index'));
        }
    }

    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name, active');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'My Profile',
            'menu' => 'profile',
        ];
        return view('admin/profile', $data);
    }

    public function editProfil()
    {
        $data_user = $this->usersModel->getUsersById(user_id());
        // dd($data_user);
        $data = [
            'title' => 'My Profile',
            'result' => $data_user,
            'menu' => 'profile',
        ];
        return view('admin/edit-profil', $data);
    }

    public function edit($id_user)
    {
        $data_user = $this->usersModel->getUsersById($id_user);
        // dd($data_user);
        $data = [
            'title' => 'My Profile',
            'result' => $data_user
        ];
        return view('admin/edit-profil', $data);
    }

    public function updateProfil($id_user)
    {
        $auth = service('authentication');

        // Validasi Data
        if (!$this->validate([
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
                'label' => 'No Telepon',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka',
                ]
                // '|is_natural_no_zero'
            ],
            'stok' => [
                'rules' => 'required',
                'label' => 'Stok',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
                // '|is_natural_no_zero'
            ],
            'user_image' => [
                'rules' =>    'max_size[user_image,1024]|is_image[user_image]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            //Berisi fungsi redirect jika validasi tidak memenuhi
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/user/produk/create')->withInput();
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
        // $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        if ($this->usersModel->save([
            'id_user'     => $id_user,
            // 'id_user'     => $this->request->user_id,
            'email' => $this->request->getVar('email'),
            // 'slug' => $slug,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            // 'id_kategori_produk' => $this->request->getVar('id_kategori_produk'),
            'user_image' => $namaFileGambarUser
        ])) {
            // dd($_SESSION);
            // dd($this->request->getVar());
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
        }
        return redirect()->to('/produk');
    }


    public function dashboard()
    {
        $users = $this->usersModel->countAllUsers();
        $data['title'] = 'Dashboard';
        $data = [
            'title' => 'Dashboard',
            'subTitle' => 'Dashboard',
            // 'event' => $event->paginate(5, 'event'),
            // 'pager' => $this->eventModel->pager,
            // 'currentPage' => $currentPage
            'users' => $users
        ];
        return view('views/index', $data);
    }

    public function delete($id_user)
    {
        // cari gambar berdasarkan id
        $users = $this->usersModel->find($id_user);

        // cek jika file gambarnya default.jpg
        if ($users['user_image'] != 'default.jpg') {
            //hapus gambar
            unlink('img/users/' . $users['user_image']);
        }

        $this->usersModel->delete($id_user);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('/admin/users')->withInput();
    }
}
