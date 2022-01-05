<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Home extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        // $users = $this->usersModel->findAll();

        $data = [
            'title' => 'Halaman Depan',
            'users' => $this->usersModel->getUsers()
        ];

        return view('homepage', $data);
    }

    public function details($id)
    {
        $data = [
            'title' => 'Details Users',
            'users' => $this->usersModel->getUsers($id)
        ];

        // jita tidak ada datanya
        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User dengan id ' . $id . ' tidak ditemukan');
        }

        return view('details', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Users',
            'validation' => \Config\Services::validation(),
        ];

        return view('create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'username'  => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'  => '{field} harus diisi.',
                    'min_length' => '{field} terlalu singkat.'
                ]
            ],
            'email'     => [
                'rules'  => 'required|is_unique[users.email]',
                'errors' => [
                    'required'  => '{field} harus diisi.',
                    'is_unique' => '{field} sudah digunakan.'
                ]
            ],
            'password'  => [
                'rules'  => 'required|min_length[7]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} terlalu singkat.',
                    'max_length' => '{field} terlalu panjang.'
                ]
            ],
            'no_telp'   => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required'  => '{field} harus diisi.',
                    'numeric' => 'no.telp hanya boleh berisi angka 0 - 9.'
                ]
            ],
            'address'   => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => '{field} harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/home/create')->withInput()->with('validation', $validation);
        }

        $this->usersModel->save([
            'username'  => $this->request->getVar('username'),
            'email'     => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'no_telp'   => $this->request->getVar('no_telp'),
            'address'   => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/home');
    }

    public function delete($id)
    {
        $this->usersModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/home');
    }

    public function update($id)
    {
        $data = [
            'title' => 'Update Users',
            'validation' => \Config\Services::validation(),
            'users' => $this->usersModel->getUsers($id)
        ];

        return view('update', $data);
    }

    public function action_update($id)
    {
        // cek email
        // $emailLama = $this->usersModel->getUsers($this->request->getVar('email'));
        // if ($emailLama['email'] == $this->request->getVar('email')) {
        //     $rule_email = 'required';
        // } else {
        //     $rule_email = 'required|is_unique[users.email]';
        // }

        // Validasi Input
        if (!$this->validate([
            'username'  => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'  => '{field} harus diisi.',
                    'min_length' => '{field} terlalu singkat.'
                ]
            ],
            // 'email'     => [
            //     'rules'  => 'required|is_unique[users.email]',
            //     'errors' => [
            //         'required'  => '{field} harus diisi.',
            //         'is_unique' => '{field} sudah digunakan.'
            //     ]
            // ],
            'password'  => [
                'rules'  => 'required|min_length[7]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} terlalu singkat.',
                    'max_length' => '{field} terlalu panjang.'
                ]
            ],
            'no_telp'   => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required'  => '{field} harus diisi.',
                    'numeric' => 'no.telp hanya boleh berisi angka 0 - 9.'
                ]
            ],
            'address'   => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => '{field} harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/home/update/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->usersModel->save([
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            // 'email'     => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'no_telp'   => $this->request->getVar('no_telp'),
            'address'   => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');

        return redirect()->to('/home');
    }
}
